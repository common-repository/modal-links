<?php

/**
 * PHP version 5.5.8
 *
 * LICENSE: This source file is subject to version 2.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/2_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Modal_Links
 * @package   Modal_Links_Callbacks
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSINCLUDES') === false) {
    exit;
}

if (class_exists('ModalLinksCallbacks') === false) {
    /**
     * Callbacks Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Callbacks
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksCallbacks
    {

        private $_modalLinksSessions;

        /**
         * Constructor
         */
        public function __construct()
        {
            $this->_modalLinksSessions = new ModalLinksSessions();
            add_action(
                'wp_ajax_modalLinksGetPost',
                array(
                 $this,
                 'modalLinksGetPostCallback',
                )
            );
            add_action(
                'wp_ajax_nopriv_modalLinksGetPost',
                array(
                 $this,
                 'modalLinksGetPostCallback',
                )
            );
            add_action(
                'wp_ajax_modalLinksPostUrlToPostId',
                array(
                 $this,
                 'modalLinksPostUrlToPostIdCallback',
                )
            );
            add_action(
                'wp_ajax_nopriv_modalLinksPostUrlToPostId',
                array(
                 $this,
                 'modalLinksPostUrlToPostIdCallback',
                )
            );

        }//end __construct()


        /**
         * Get post callback
         *
         * @return modal title and content
         */
        public function modalLinksGetPostCallback()
        {
            global $shortcode_tags;
            $dataButton      = array();
            $shortcode_tags  = $this->_modalLinksSessions->readGlobalShortcodeTagsSession();
            $GLOBALS['post'] = $this->_modalLinksSessions->readGlobalPostsSession();

            // Contact Form 7 fix.
            $contactForm7FileExists = modalLinksGetPluginAbsPath('contact-form-7/wp-contact-form-7.php');
            $contactForm7IsActive   = is_plugin_active('contact-form-7/wp-contact-form-7.php');
            if ((file_exists($contactForm7FileExists) === true)
                && ($contactForm7IsActive === true)
            ) {
                $contactForm7Controller = dirname(__FILE__).
                DIRECTORY_SEPARATOR.
                '..'.
                DIRECTORY_SEPARATOR.
                '..'.
                DIRECTORY_SEPARATOR.
                'contact-form-7'.
                DIRECTORY_SEPARATOR.
                'includes'.
                DIRECTORY_SEPARATOR.
                'controller.php';
                include $contactForm7Controller;
            }

            $modalLinksModalTitle  = get_option('modalLinksModalTitle');
            $modalLinksModalDate   = get_option('modalLinksModalDate');
            $modalLinksModalAuthor = get_option('modalLinksModalAuthor');
            $postDataTitle         = '';
            $postDataDate          = '';
            $postDataAuthor        = '';

            if (isset($_POST['modalLinks_postID']) === true) {
                $postID = $_POST['modalLinks_postID'];
                if (isset($_POST['modalLinks_postDataTitle']) === true
                    && ($_POST['modalLinks_postDataTitle'] === 'true'
                    || $_POST['modalLinks_postDataTitle'] === 'false')
                ) {
                    $postDataTitle = $_POST['modalLinks_postDataTitle'];
                }
            } else if (isset($_POST['modalLinks_postPermalink']) === true) {
                $postID = url_to_postid($_POST['modalLinks_postPermalink']);

                if (isset($_POST['modalLinks_postDataTitle']) === true
                    && ($_POST['modalLinks_postDataTitle'] === 'true'
                    || $_POST['modalLinks_postDataTitle'] === 'false')
                ) {
                    $postDataTitle = $_POST['modalLinks_postDataTitle'];
                }
            } else if (isset($_POST['modalLinks_postDataLogin']) === true
                && $_POST['modalLinks_postDataLogin'] === 'true'
            ) {
                $postDataLogin = $_POST['modalLinks_postDataLogin'];

                if (isset($_POST['modalLinks_postDataAction']) === true
                    && ($_POST['modalLinks_postDataAction'] === 'register'
                    || $_POST['modalLinks_postDataAction'] === 'logout')
                ) {
                    $postDataAction = $_POST['modalLinks_postDataAction'];
                } else {
                    if (is_user_logged_in() === true) {
                        $postDataAction = 'logout';
                    }
                }

                if (isset($_POST['modalLinks_postDataTitle']) === true
                    && ($_POST['modalLinks_postDataTitle'] === 'true'
                    || $_POST['modalLinks_postDataTitle'] === 'false')
                ) {
                    $postDataTitle = $_POST['modalLinks_postDataTitle'];
                }
            }//end if

            if ($postID && is_numeric($postID) === true) {
                // Get post title and content.
                $postInfo     = modalLinksPostIdToPostInfo($postID);
                $modalTitle   = $postInfo['modalTitle'];
                $modalDate    = $postInfo['modalDate'];
                $modalAuthor  = $postInfo['modalAuthor'];
                $modalContent = $postInfo['modalContent'];

                // Check if post is in Modals category.
                $isModal = in_category('Modals', $postID);

                // Setup the modal title.
                if ($modalLinksModalTitle === 'default') {
                    if ($postDataTitle === 'false') {
                        $modalTitle = '';
                    } else if ($isModal && $postDataTitle !== 'true') {
                        $modalTitle = '';
                    }
                } else if ($modalLinksModalTitle === 'false') {
                    $modalTitle = '';
                }

                // Setup the modal author.
                if ($modalLinksModalDate === 'false') {
                    $modalDate = '';
                }

                // Setup the modal author.
                if ($modalLinksModalAuthor === 'false') {
                    $modalAuthor = '';
                }

                // Setup the modal content.
                add_filter('the_content', 'do_shortcode', 11);
                $modalContent = apply_filters('the_content', $modalContent);
            } else if ($postDataLogin) {
                $ch      = curl_init();
                $blogUrl = get_bloginfo('wpurl');
                $url     = $blogUrl.
                    ($blogUrl[$blogUrl.length - 1] === '/'?'':'/').'wp-login.php';

                if ($postDataAction === 'register') {
                    $url       .= '?action=register';
                    $modalTitle = __('Register', 'modal_links');
                    if ($postDataTitle === 'false') {
                        $modalTitle = '';
                    }
                } else if ($postDataAction === 'logout') {
                    $url       .= '?action=logout';
                    $modalTitle = __('Logout', 'modal_links');
                    if ($postDataTitle === 'false') {
                        $modalTitle = '';
                    }
                } else {
                    $modalTitle     = __('Login', 'modal_links');
                    if ($postDataTitle === 'false')
                        $modalTitle = '';
                }

                if (function_exists('curl_init') === true) {
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                    $modalContent = curl_exec($ch);
                    $dom          = new domDocument;
                    $dom->loadHTML($modalContent);
                    $xpath           = new DOMXPath($dom);
                    $nodelist        = $xpath->query("//body");
                    $nodelist        = $nodelist->item(0);
                    $modalContent    = $dom->saveHTML($nodelist);
                    $bodyOpenTagStop = strpos($modalContent, '>');
                    $bodyOpenTag     = substr($modalContent, 0, $bodyOpenTagStop);
                    $bodyTaghasClass = (strpos($bodyOpenTag, 'class="')) !== false?true:false;

                    if ($bodyTaghasClass) {
                        $bodyTagClassStart = strpos($bodyOpenTag, 'class="') + 7;
                        $bodyTagClass      = substr($bodyOpenTag, $bodyTagClassStart);
                        $bodyTagClassStop  = strpos($bodyTagClass, '"');
                        $bodyClass         = substr($bodyTagClass, 0, $bodyTagClassStop);
                    } else {
                        $bodyClass = '';
                    }

                    $bodyStartPos = strpos($modalContent, '>') + 1;
                    $bodyStopPos  = strpos($modalContent, '</body>');
                    $modalContent = substr($modalContent, $bodyStartPos, $bodyStopPos);

                    $buttonsCssUrl   = get_bloginfo('wpurl').
                        ($blogUrl[$blogUrl.length - 1] == '/'?'':'/').
                        'wp-includes/css/buttons.css';
                    $formsCssUrl     = get_bloginfo('wpurl').
                        ($blogUrl[$blogUrl.length - 1] == '/'?'':'/').
                        'wp-admin/css/forms.css';
                    $loginCssUrl     = get_bloginfo('wpurl').
                        ($blogUrl[$blogUrl.length - 1] == '/'?'':'/').
                        'wp-admin/css/login.css';
                    $modalContentCss = '<style scoped>'.'
                    @import url("'.$buttonsCssUrl.'");'.'
                    @import url("'.$formsCssUrl.'");'.'
                    @import url("'.$loginCssUrl.'");'.'
                    </style>';

                    if ($postDataAction === 'register') {
                        $modalContent = '<div class="'.
                            $bodyClass.
                            '">'.
                            $modalContent.
                            '</div>';
                        $modalContent = $modalContentCss.$modalContent;
                        $dataButton   = array('modalButtons' => 'false');
                    } else if ($postDataAction === 'logout') {
                        $logoutUrl    = wp_logout_url($url);
                        $aStartPos    = (strpos($modalContent, '<a') + 2);
                        $aContent     = substr($modalContent, $aStartPos);
                        $aStopPos     = strpos($aContent, '>');
                        $aContent     = substr($aContent, 0, $aStopPos);
                        $hrefStartPos = (strpos($aContent, 'href="') + 6);
                        $hrefContent  = substr($aContent, $hrefStartPos);
                        $hrefStopPos  = strpos($hrefContent, '"');
                        $hrefContent  = substr($hrefContent, 0, $hrefStopPos);
                        $logoutUrl    = html_entity_decode($logoutUrl);
                        $logoutUrl    = urldecode($logoutUrl);
                        $logoutUrl    = str_replace(
                            '&redirect_to='.$url,
                            '&redirect_to='.$blogUrl,
                            $logoutUrl
                        );
                        $modalContent = str_replace(
                            $hrefContent,
                            $logoutUrl,
                            $modalContent
                        );
                        $modalContent = $modalContentCss.$modalContent;
                        $dataButton   = array('modalButtons' => 'false');
                    } else {
                        $modalContent = '<div class="'.$bodyClass.'">'
                        .$modalContent
                        .'</div>';
                        $modalContent = $modalContentCss.$modalContent;
                        $dataButton   = array('modalButtons' => 'false');
                    }//end if

                    curl_close($ch);
                } else {
                    $modalTitle   = __('Modal Links Error', 'modal_links');
                    $modalContent = __('cUrl is not installed', 'modal_links');
                }//end if
            } else {
                $modalTitle   = __('Modal Links Error', 'modal_links');
                $modalContent = __('Something gone wrong here...', 'modal_links');
            }//end if

            $data = array(
                     'modalLoadingGif' => $_POST['modalLoadingGif'],
                     'modalTitle'      => $modalTitle,
                     'modalDate'       => $modalDate,
                     'modalAuthor'     => $modalAuthor,
                     'modalContent'    => $modalContent,
                    );

            if ($dataButton) {
                $data = array_merge($data, $dataButton);
            }

            echo json_encode($data);
            die();

        }//end modalLinksGetPostCallback()


        /**
         * Get id callback
         *
         * @return the id
         */
        public function modalLinksPostUrlToPostIdCallback()
        {
            if (isset($_POST['modalLinks_postUrl']) === false) {
                return;
            }

            $response = modalLinksPostUrlToPostId($_POST['modalLinks_postUrl']);

            if ($response) {
                $postId = $response;
                $data   = array('id' => $postId);
            }

            echo json_encode($data);
            die();

        }//end modalLinksPostUrlToPostIdCallback()

    }//end class
}//end if

new ModalLinksCallbacks();

do_action('modalLinksCallbacks');
