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
 * @package   Modal_Links_Deactivation
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSMAINTENANCE') === false) {
    exit;
}


if (class_exists('ModalLinksDeactivation') === false) {
    /**
     * Main Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Deactivation
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksDeactivation
    {


        /**
         * Constructor
         */
        public function __construct()
        {
            register_activation_hook(__FILE__, array(__CLASS__, 'deactivate'));

        }//end __construct()


        /**
         * On deactivation
         *
         * @return nothing
         */
        public static function deactivate()
        {

        }//end deactivate()

    }
}

new ModalLinksDeactivation();
