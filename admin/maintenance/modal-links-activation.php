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
 * @package   Modal_Links_Activation
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSMAINTENANCE') === false) {
    exit;
}


if (class_exists('ModalLinksActivation') === false) {
    /**
     * Main Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Activation
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksActivation
    {
        private $_modalLinksFields;


        /**
         * Constructor
         */
        public function __construct()
        {
            $this->_modalLinksFields = new ModalLinksFields();
            register_activation_hook(__FILE__, array(__CLASS__, 'activate'));

        }//end __construct()


        /**
         * On activation
         *
         * @return nothing
         */
        public static function activate()
        {
            // If Modals category not exists create it.
            $modalCategoryExists = term_exists('Modals', 'category');
            if (($modalCategoryExists == 0) || ($modalCategoryExists == null)) {
                wp_create_category('Modals');
            }

            $fields = $this->_modalLinksFields->returnFields();

            foreach ($fields as $field) {
                // For Single site.
                if (is_multisite() === false) {
                    add_option($field['code'], $field['default']);

                } else {
                    // For Multisite.
                    global $wpdb;
                    $blogIds        = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
                    $originalBlogId = get_current_blog_id();
                    foreach ($blogIds as $blogId) {
                        switch_to_blog($blogId);
                        add_option($field['code'], $field['default']);

                    }//end foreach

                    switch_to_blog($originalBlogId);

                    add_site_option($field['code'], $field['default']);

                }//end if
            }

        }//end activate()

    }
}

new ModalLinksActivation();
