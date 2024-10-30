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
 * @package   Modal_Links_Validation
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSADMIN') === false) {
    exit;
}


if (class_exists('ModalLinksValidation') === false) {
    /**
     * Main Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Validation
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksValidation
    {


        /**
         * Constructor
         */
        public function __construct()
        {

        }//end __construct()


        public function validation()
        {
            $errors = $this->validate();
            $return = '<p>';
            if ($errors === '') {
                $return .= __(
                    'Great! All shortcodes are valid.',
                    'modal_links'
                );
            } else {
                $return .= $errors;
            }
            $return .= '</p>';

            return $return;

        }


        public function validate()
        {
            $posts  = get_posts();
            $errors = '';
            foreach ($posts as $post) {
                $theId      = $post->ID;
                $theTitle   = $post->post_title;
                $theContent = $post->post_content;
                if (has_shortcode($theContent, 'modalLinks') === true) {
                    $shortcodeCount = substr_count($theContent, '[modalLinks');
                    $pos            = 0;
                    for ($i = 1; $i <= $shortcodeCount; $i++) {
                        $posStart     = strpos($theContent, '[modalLinks', $pos);
                        $pos          = ($posStart + 1);
                        $posEnd       = (strpos($theContent, ']', $posStart) + 1);
                        $posDiff      = ($posEnd - $posStart);
                        $shortcodes[] = substr($theContent, $posStart, $posDiff);
                    }

                    foreach ($shortcodes as $shortcode) {
                        $idPos        = strpos($shortcode, 'id=');
                        $permalinkPos = strpos($shortcode, 'permalink=');
                        if ($idPos !== false) {
                            $idValPosStart = ($idPos + 4);
                            $idValPosEnd   = strpos($shortcode, '"', $idValPosStart);
                            $idVal         = substr(
                                $shortcode,
                                $idValPosStart,
                                $idValPosEnd
                            );
                            $result        = modalLinksValidateId($idVal);
                            if ($result === false) {
                                $errors .= 'Post/Page with id '.
                                $theId.
                                ' and title '.
                                $theTitle.
                                ' contains the invalid shortcode '.
                                $shortcode.
                                '<br />';
                            }
                        } else if ($permalinkPos !== false) {
                            $permalinkValPosStart = ($permalinkPos + 11);
                            $permalinkValPosEnd   = strpos(
                                $shortcode,
                                '"',
                                $permalinkValPosStart
                            );
                            $permalinkVal         = substr(
                                $shortcode,
                                $permalinkValPosStart,
                                $permalinkValPosEnd
                            );
                            $result = modalLinksValidatePermalink($permalinkVal);
                            if ($result === false) {
                                $errors .= 'Post/Page with id '.
                                $theId.
                                ' and title '.
                                $theTitle.
                                ' contains the invalid shortcode '.
                                $shortcode.
                                '<br />';
                            }
                        }//end if
                        unset($shortcodes);
                    }//end foreach
                }//end if
            }//end foreach

            return $errors;

        }


    }

}

new ModalLinksValidation();
