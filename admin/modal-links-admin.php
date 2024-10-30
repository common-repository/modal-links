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
 * @package   Modal_Links_Admin
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKS') === false) {
    exit;
}

define('MODALLINKSADMIN', 'Modal Links Admin');

require_once 'modal-links-fields.php';
require_once 'modal-links-sections.php';
require_once 'modal-links-settings.php';
require_once 'maintenance/modal-links-maintenance.php';
require_once 'validation/modal-links-validation.php';

if (class_exists('ModalLinksAdmin') === false) {
    /**
     * Admin Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Admin
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksAdmin
    {

        private $_modalLinksValidation;

        /**
         * Constructor
         */
        public function __construct()
        {
            $this->_modalLinksValidation = new ModalLinksValidation();
            add_action('admin_menu', array($this, 'adminPage'));

        }//end __construct()


        /**
         * Add submenu in settings
         *
         * @return nothing
         */
        public function adminPage()
        {
            add_options_page(
                __('Modal Links', 'modal_links'),
                __('Modal Links', 'modal_links'),
                'manage_options',
                'modal_links',
                array(
                 $this,
                 'adminPageCallback',
                )
            );

        }//end adminPage()


        /**
         * Admin page callback
         *
         * @return nothing
         */
        public function adminPageCallback()
        {
            echo '<div class="wrap">
                <h2>'.__('Modal Links Settings', 'modal_links').'</h2>
                <form name="modalLinksForm" method="POST" action="options.php">';
                        settings_fields('modal_links');
                        do_settings_sections('modal_links');
                        submit_button();
                echo '</form>';

                echo '<h3>'.__('Usage and Support', 'modal_links').'</h3>
                    <p>
                        <a target="_blank"
                        href="https://wordpress.org/plugins/modal-links/">'.
                        __('Modal Links in wordpress.org', 'modal_links').
                        '</a>
                    </p>';

                echo '<h3>'.__('Shortcode Validation', 'modal_links').'</h3>';

                echo $this->_modalLinksValidation->validation();
/*
                echo '<h3>'.__('Extensions', 'modal_links').'</h3>';

                $serverHost    = $_SERVER['HTTP_HOST'];
                $serverDocRoot = $_SERVER['DOCUMENT_ROOT'];

                $extensionsArr = array(
                                  array(
                                   'tag'         => 'modal-links-shortcode-gui',
                                   'name'        => 'Modal Links Shortcode GUI',
                                   'description' => 'adds a GUI way to insert the shortcode into the wp editor. No need to know or remember anything',
                                  ),
                                  array(
                                   'tag'         => 'modal-links-auto-open',
                                   'name'        => 'Modal Links Auto Open',
                                   'description' => 'opens a post/page in modal windowautomatically. Selectable option for every post/page and front page',
                                  ),
                                  array(
                                   'tag'         => 'modal-links-menu-item',
                                   'name'        => 'Modal Links Menu Item',
                                   'description' => 'adds modal links to navigation menus',
                                  ),
                                  array(
                                   'tag'         => 'modal-links-category-carousel',
                                   'name'        => 'Modal Links Category Carousel',
                                   'description' => 'adds the ability to create a modal carousel using the posts from a category',
                                  ),
                                 );

            foreach ($extensionsArr as $extension) {
                $pluginFileExists = modalLinksGetPluginAbsPath(
                    $extension['tag'].
                    '/'.
                    $extension['tag'].
                    '.php'
                );
                $pluginIsActive   = is_plugin_active(
                    $extension['tag'].
                    '/'.
                    $extension['tag'].
                    '.php'
                );
                if (file_exists($pluginFileExists) === true) {
                    if ($pluginIsActive === true) {
                        echo '<p>'.
                                __('Great!', 'modal_links').
                                ' <strong>'
                                    .__($extension['name'], 'modal_links').
                                '</strong> '.
                                __(
                                    'plugin seems that is installed and activated',
                                    'modal_links'
                                ).
                                '.<br />'.
                                __(
                                    'This plugin is an extension of Modal Links plugin
                                    and '.$extension['description'],
                                    'modal_links'
                                ).
                            '.</p>';
                    } else {
                        echo '<p>
                                <strong>'.
                                    __($extension['name'], 'modal_links').
                                '</strong> '.
                                __(
                                    'plugin seems that is installed but not activated',
                                    'modal_links'
                                ).
                                '.<br />'.
                                __(
                                    'This plugin is an extension of Modal Links plugin
                                    and '.$extension['description'],
                                    'modal_links'
                                ).
                                '.<br />'.
                                __('Activate it', 'modal_links').
                                ' <a href="'.get_bloginfo('wpurl').
                                    '/wp-admin/plugins.php">'.
                                    __('now', 'modal_links').
                                '</a>.
                              </p>';
                    }//end if
                } else {
                    echo '<p>
                            <strong>'.
                                __($extension['name'], 'modal_links').
                            '</strong> '.
                            __('plugin seems that is not installed', 'modal_links').
                            '.<br />'.
                            __(
                                'This plugin is an extension of Modal Links plugin
                                and '.$extension['description'],
                                'modal_links'
                            ).
                            '.<br />'.
                            __('You can get it', 'modal_links').
                            ' <a target="_blank"
                            href="https://wordpress.org/plugins/modal-links/">'.
                            __('here', 'modal_links').
                            '</a>.
                        </p>';
                }//end if
            }//end foreach*/

            echo '</div>';

        }//end adminPageCallback()


    }//end class
}//end if

new ModalLinksAdmin();
