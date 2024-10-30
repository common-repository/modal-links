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
 * @package   Modal_Links_Sections
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSADMIN') === false) {
    exit;
}

if (class_exists('ModalLinkSections') === false) {
    /**
     * Settings Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Sections
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksSections
    {

        /**
         * Constructor
         */
        public function __construct()
        {
            add_action('admin_init', array($this, 'addSections'));

        }


        /**
         * Adds sections in settings
         *
         * @return nothing
         */
        public function addSections()
        {
            $sections = array(
                         array(
                          __('Modal Size', 'modal_links'),
                          'modalSizeSection',
                         ),
                         array(
                          __('Modal Behavior', 'modal_links'),
                          'modalBehaviorSection',
                         ),
                         array(
                          __('Modal Features', 'modal_links'),
                          'modalFeaturesSection',
                         ),
                         array(
                          __('Widgets Links', 'modal_links'),
                          'widgetsLinksSection',
                         ),
                         array(
                          __('Wordpress Features', 'modal_links'),
                          'wordpressFeaturesSection',
                         ),
                        );

            foreach ($sections as $section) {
                add_settings_section(
                    $section[1],
                    $section[0],
                    array($this, $section[1].'Callback'),
                    'modal_links'
                );
            }

        }


        /**
         * Add the modal size settings section callback.
         *
         * @return nothing
         */
        public function modalSizeSectionCallback($arg)
        {
            echo '';

        }//end modalSizeSectionCallback()


        /**
         * Add the modal behavior settings section callback.
         *
         * @return nothing
         */
        public function modalBehaviorSectionCallback($arg)
        {
            echo '';

        }//end modalBehaviorSectionCallback()


        /**
         * Add the modal features settings section callback.
         *
         * @return nothing
         */
        public function modalFeaturesSectionCallback($arg)
        {
            echo '';

        }//end modalFeaturesSectionCallback()


        /**
         * Add the widgets links settings section callback.
         *
         * @return nothing
         */
        public function widgetsLinksSectionCallback($arg)
        {
            echo '';

        }//end widgetsLinksSectionCallback()


        /**
         * Add the wordpress features settings section callback.
         *
         * @return nothing
         */
        public function wordpressFeaturesSectionCallback($arg)
        {
            echo '';

        }//end wordpressFeaturesSectionCallback()


    }
}

new ModalLinksSections();
