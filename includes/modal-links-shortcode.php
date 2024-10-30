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
 * @package   Modal_Links_Shortcode
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSINCLUDES') === false) {
    exit;
}

if (class_exists('ModalLinksShortcode') === false) {
    /**
     * Shortcode Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Shortcode
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksShortcode
    {
        /**
         * Constructor
         */
        public function __construct()
        {
            add_shortcode('modalLinks', array(__CLASS__, 'shortcode'));

        }//end __construct()


        /**
         * Shortcode
         *
         * @param array  $atts    nothing to comment here
         * @param string $content nothing to comment here
         *
         * @return html link
         */
        public static function shortcode($atts, $content = null)
        {
            extract(
                shortcode_atts(
                    array(
                     'id'        => '',
                     'category'  => '',
                     'category'  => '',
                     'permalink' => '',
                     'title'     => '',
                     'login'     => '',
                     'action'    => '',
                    ),
                    $atts
                )
            );


            // If content is whitespaces, replace them.
            if ($content) {
                $content = preg_replace('/\s\s+/', '', $content);
            }

            if ($content == ' ') {
                $content = '';
            }

            $shortcode = '<a';

            if ($id == true) {
                $shortcode .= ' target="_modal" id="'.$id.'" href="#"';
                if ($title == 'true' || $title == 'false') {
                    $shortcode .= ' data-title="'.$title.'"';
                }

                if ($content == true) {
                    $shortcode .= ">$content</a>";
                } else {
                    $shortcode .= ">$id</a>";
                }
            } else if ($permalink == true) {
                $shortcode .= ' target="_modal" href="'.$permalink.'"';
                if ($title == 'true' || $title == 'false') {
                    $shortcode .= ' data-title="'.$title.'"';
                }

                if ($content == true) {
                    $shortcode .= ">$content</a>";
                } else {
                    $shortcode .= ">$permalink</a>";
                }
            } else if ($login == 'true') {
                $shortcode .= ' target="_modal" href="#" data-login="true"';
                if ($action == 'register') {
                    $shortcode .= ' data-action="'.$action.'"';
                    if ($title == 'true' || $title == 'false') {
                        $shortcode .= ' data-title="'.$title.'"';
                    }

                    if ($content == true) {
                        $shortcode .= ">$content</a>";
                    } else {
                        $shortcode .= '>'.__('Register', 'modal_links').'</a>';
                    }
                } else {
                    if (is_user_logged_in() === true) {
                        $shortcode .= ' data-action="logout"';
                        if ($title == 'true' || $title == 'false') {
                            $shortcode .= ' data-title="'.$title.'"';
                        }

                        if ($content == true) {
                            $shortcode .= ">$content</a>";
                        } else {
                            $shortcode .= '>'.__('Logout', 'modal_links').'</a>';
                        }
                    } else {
                        if ($title == 'true' || $title == 'false') {
                            $shortcode .= ' data-title="'.$title.'"';
                        }

                        if ($content == true) {
                            $shortcode .= ">$content</a>";
                        } else {
                            $shortcode .= '>'.__('Login', 'modal_links').'</a>';
                        }
                    }//end if
                }//end if
            } else if ($category == true) {
                $shortcode .= ' target="_modal" data-category="'.$category.'" href="#"';
                if ($title == 'true' || $title == 'false') {
                    $shortcode .= ' data-title="'.$title.'"';
                }

                if ($content == true) {
                    $shortcode .= ">$content</a>";
                } else {
                    $shortcode .= ">$category</a>";
                }
            } else {
                    $shortcode .= ' href="#">'.
                    __('Modal Links Shortcode Error!', 'modal_links').
                    '</a>';
            }//end if

            return $shortcode;

        }//end shortcode()


    }//end class
}//end if

new ModalLinksShortcode();
