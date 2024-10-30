<?php

/**
 * Plugin Name: Modal Links
 * Plugin URI: https://wordpress.org/plugins/modal-links
 * Description: This is NOT just another modal plugin. Its much more. With this plugin you add modal functionalities to your wordpress.
 * Version: 1.8.4
 * Author: George Lazarou
 * Author URI: http://georgelazarou.info
 * License: PHP License 2.01
 * License URI: http://www.php.net/license/2_01.txt
 *
 * PHP version 5.5.8
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/2_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Modal_Links
 * @package   Modal_Links
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

/*
    Copyright 2014  George Lazarou  (email : info@georgelazarou.info)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


define('MODALLINKS', 'Modal Links');

// Load the admin function.
require_once 'admin/modal-links-admin.php';

// Load the classes.
require_once 'includes/modal-links-includes.php';

if (class_exists('ModalLinks') === false) {
    /**
     * Main Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Main
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinks
    {


        /**
         * Constructor
         */
        public function __construct()
        {
            add_action('init', array($this, 'loadTextdomain'));
            add_filter('plugin_action_links', array($this, 'settingsLink'), 10, 2);
            add_action('wp_footer', array($this, 'modalMarkup'));

        }//end __construct()


        /**
         * Load the textdomain
         *
         * @return nothing
         */
        public static function loadTextdomain()
        {
            load_plugin_textdomain(
                'modal_links',
                false,
                basename(dirname(__FILE__)).'/languages'
            );

        }//end loadTextdomain()


        /**
         * Add settings link
         *
         * @param array  $links there is nothing to comment
         * @param string $file  there is nothing to comment
         *
         * @return $links
         */
        public function settingsLink($links, $file)
        {
            $this_plugin = plugin_basename(dirname(__FILE__) . '/modal-links.php');

            if ($file == $this_plugin) {
                $settingsLink = '<a href="'.
                get_bloginfo('wpurl').
                '/wp-admin/admin.php?page=modal_links">'.
                __('Settings', 'modal_links').
                '</a>';
                array_unshift($links, $settingsLink);
            }

            return $links;

        }//end settingsLink()


        /**
         * Add modal dialog markup
         *
         * @return nothing
         */
        public function modalMarkup()
        {
            echo '<div id="modalLinksDialog"></div>';

        }//end modalMarkup()


    }//end class
}//end if


new ModalLinks();

do_action('modalLinks');
