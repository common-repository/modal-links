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
 * @package   Modal_Links_Modals_Category
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSINCLUDES') === false) {
    exit;
}

if (class_exists('ModalLinksModalCategory') === false) {
    /**
     * Callbacks Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Modals_Category
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksModalCategory
    {
        /**
         * Constructor
         */
        public function __construct()
        {
            add_filter('widget_categories_args', array($this, 'categoriesWidgetFilter'), 10, 1);
            add_action('pre_get_posts', array($this, 'excludeCategory'));

        }//end __construct()


        /**
         * Hides Modal category from categories widget
         *
         * @param array $catArgs there is nothing to comment
         *
         * @return $catArgs
         */
        public function categoriesWidgetFilter($catArgs)
        {
            $modalCategoryId = get_cat_ID('Modals');
            $excludeArr      = array($modalCategoryId);

            if (isset($catArgs['exclude']) === true
                && empty($catArgs['exclude']) === false
            ) {
                $excludeArr = array_unique(
                    array_merge(
                        explode(',', $catArgs['exclude']),
                        $excludeArr
                    )
                );
            }

            $catArgs['exclude'] = implode(',', $excludeArr);
            return $catArgs;

        }//end categoriesWidgetFilter()


        /**
         * Hides posts of Modal category from everywhere
         *
         * @param object $wp_query comment
         *
         * @return nothing
         */
        public function excludeCategory($wp_query)
        {
            $modalCategoryId = get_cat_ID('Modals');
            $excluded        = array($modalCategoryId);

            if ((is_admin() === false)) {
                $wp_query->set('category__not_in', $excluded);
            }

        }//end excludeCategory()

    }//end class

}//end if

new ModalLinksModalCategory();
