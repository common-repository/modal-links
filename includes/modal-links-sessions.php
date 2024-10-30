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
 * @package   Modal_Links_Sessions
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSINCLUDES') === false) {
    exit;
}

if (class_exists('ModalLinksSessions') === false) {
    /**
     * Callbacks Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Sessions
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksSessions
    {
        /**
         * Constructor
         */
        public function __construct()
        {
            add_action('init', array($this, 'registerSession'));

        }//end __construct()


        public function registerSession()
        {
            if (session_id() == false) {
                session_start();
            }

        }//end registerSession()


        public function createSessions()
        {
            global $shortcode_tags;

            foreach ($shortcode_tags as $key => $value) {
                if (is_object($value) === true) {
                    unset($shortcode_tags[$key]);
                } else if (is_array($value) === true) {
                    foreach ($value as $key1 => $value1) {
                        if (is_object($value1) === true) {
                            unset($shortcode_tags[$key][$key1]);
                        }
                    }
                }
            }

            $_SESSION['globalShortcodeTags'] = $shortcode_tags;
            $_SESSION['globalPosts'] = $GLOBALS['post'];

        }//end createSessions()


        /**
         * Retunrs global shortcode tags session
         *
         * @return global shortcode tags session
         */
        public function readGlobalShortcodeTagsSession()
        {
            return $_SESSION['globalShortcodeTags'];

        }//end readGlobalShortcodeTagsSession()


        /**
         * Retunrs global posts session
         *
         * @return global posts session
         */
        public function readGlobalPostsSession()
        {
            return $_SESSION['globalPosts'];

        }//end readGlobalPostsSession()

    }
}

new ModalLinksSessions();
