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
 * @package   Modal_Links_Settings
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSADMIN') === false) {
    exit;
}

//require_once 'modal-links-fields.php';

if (class_exists('ModalLinksSettings') === false) {
    /**
     * Settings Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Settings
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksSettings
    {


        private $_modalLinksFields;
        private $_modalLinksOptions;


        /**
         * Constructor
         */
        public function __construct()
        {
            add_action('admin_init', array($this, 'settings'));

            $this->_modalLinksFields = new ModalLinksFields();

        }//end __construct()


        /**
         * Add the settings
         *
         * @return nothing
         */
        public function settings()
        {
            $fields = $this->_modalLinksFields->returnFields();

            foreach ($fields as $field) {
                add_settings_field(
                    $field['code'],
                    __($field['title'], 'modal_links'),
                    $field['function'],
                    'modal_links',
                    $field['section'],
                    array('label_for' => $field['code'])
                );
                register_setting('modal_links', $field['code'], $field['validation']);
            }

        }//end settings()


    }//end class
}//end if

new ModalLinksSettings();