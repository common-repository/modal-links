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
 * @package   Modal_Links_Scripts
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSINCLUDES') === false) {
    exit;
}

if (class_exists('ModalLinksScripts') === false) {
    /**
     * Scripts Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Scripts
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksScripts
    {

        private $_jQuery;
        private $_jQueryUIDialogJS;
        private $_jQueryUITooltipJs;
        private $_jQueryUIDialogCSS;
        private $_jQueryUICSS;
        private $_jQueryScoped;
        private $_modalLinksCalls;
        private $_modalLinksTooltips;
        private $_modalLinksMetaWidgetLinks;
        private $_modalLinksReadMoreLinks;


        /**
         * Constructor
         */
        public function __construct()
        {
            $this->addScripts();

        }//end __construct()


        /**
         * Adds actions for scripts and styles
         *
         * @return nothing
         */
        public function addScripts()
        {
            add_action('wp_enqueue_scripts', array($this, 'controlFEScripts'));
            add_action('admin_enqueue_scripts', array($this, 'controlBEScripts'));

        }//end addScripts()


        /**
         * Checks if scripts and styles are enqueued
         *
         * @return nothing
         */
        public function isEnqueuedFEScripts()
        {
            $this->_jQuery = wp_script_is('jquery', $list = 'enqueued');
            $this->_jQueryUIDialogJS = wp_script_is('jquery-ui-dialog', $list = 'enqueued');
            $this->_jQueryUIDialogCSS = wp_style_is('wp-jquery-ui-dialog', $list = 'enqueued');
            $this->_jQueryScoped = wp_script_is('jquery-scoped', $list = 'enqueued');
            $this->_modalLinksCalls = wp_script_is('modal-links-calls', $list = 'enqueued');
            $this->_modalLinksMetaWidgetLinks = wp_script_is('modal-links-meta-widget-links', $list = 'enqueued');
            $this->_modalLinksReadMoreLinks = wp_script_is('modal-links-read-more-links', $list = 'enqueued');

        }//end isEnqueuedFEScripts()


        /**
         * Checks if admin scripts and styles are enqueued
         *
         * @return nothing
         */
        public function isEnqueuedBEScripts()
        {
            $this->_jQuery = wp_script_is('jquery', $list = 'enqueued');
            $this->_jQueryUITooltipJs = wp_script_is('jquery-ui-tooltip', $list = 'enqueued');
            $this->_jQueryUICSS =  wp_style_is('wp-jquery-ui', $list = 'enqueued');
            $this->_modalLinksTooltips =  wp_script_is('modal-links-tooltips', $list = 'enqueued');

        }//end isEnqueuedBEScripts()


        /**
         * Adds scripts and styles
         *
         * @return nothing
         */
        public function controlFEScripts()
        {
            $this->isEnqueuedFEScripts();
            if ($this->_jQuery === false) {
                wp_enqueue_script('jquery');
            }

            if ($this->_jQueryUIDialogJS === false) {
                wp_enqueue_script('jquery-ui-dialog');
            }

            if ($this->_jQueryUIDialogCSS === false) {
                wp_enqueue_style('wp-jquery-ui-dialog');
            }

            if ($this->_jQueryScoped === false) {
                wp_enqueue_script(
                    'jquery-scoped',
                    plugins_url('modal-links/assets/js/modal-links-jquery-scoped.js'),
                    array('jquery')
                );
            }

            if ($this->_modalLinksCalls === false) {
                wp_enqueue_script(
                    'modal-links-calls',
                    plugins_url('modal-links/assets/js/modal-links-calls.js'),
                    array('jquery')
                );
            }

            if (get_option('modalLinksMetaWidgetLinks') === 'true' && $this->_modalLinksMetaWidgetLinks === false) {
                wp_enqueue_script(
                    'modal-links-meta-widget-links',
                    plugins_url('modal-links/assets/js/modal-links-meta-widget-links.js'),
                    array('jquery')
                );
            }

            if (get_option('modalLinksReadMoreLinks') === 'true' && $this->_modalLinksReadMoreLinks === false) {
                wp_enqueue_script(
                    'modal-links-read-more-links',
                    plugins_url('modal-links/assets/js/modal-links-read-more-links.js'),
                    array('jquery')
                );
                wp_localize_script(
                    'modal-links-read-more-links',
                    'readMoreLinksParams',
                    array('adminAjax' => admin_url('admin-ajax.php'))
                );
            }

            do_action('modalLinksLoadScripts');

        }//end controlFEScripts()


        /**
         * Adds admin scripts and styles
         *
         * @return nothing
         */
        public function controlBEScripts()
        {
            $this->isEnqueuedBEScripts();
            if (array_key_exists('page', $_GET) === false) {
                return;
            } else {
                if ($_GET['page'] !== 'modal_links') {
                    return;
                }
            }

            if ($this->_jQuery === false) {
                wp_enqueue_script('jquery');
            }

            if ($this->_jQueryUITooltipJs === false) {
                wp_enqueue_script('jquery-ui-tooltip');
            }

            if ($this->_jQueryUICSS === false) {
                wp_enqueue_style(
                    'wp-jquery-ui',
                    plugins_url('modal-links/assets/css/smoothness/jquery-ui-1.10.4.custom.min.css')
                );
            }

            if ($this->_modalLinksTooltips === false) {
                wp_enqueue_script(
                    'modal-links-tooltips',
                    plugins_url('modal-links/assets/js/modal-links-tooltips.js'),
                    array('jquery')
                );
            }

            do_action('modalLinksLoadAdminScripts');

        }//end controlBEScripts()


    }//end class

}//end if

new ModalLinksScripts();

do_action('modalLinksScripts');
