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
 * @package   Modal_Links_Includes
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKS') === false) {
    exit;
}

define('MODALLINKSINCLUDES', 'Modal Links Maintenance');

require_once 'modal-links-sessions.php';
require_once 'modal-links-callbacks.php';
require_once 'modal-links-functions.php';
require_once 'modal-links-js.php';
require_once 'modal-links-scripts.php';
require_once 'modal-links-shortcode.php';
require_once 'modal-links-modals-category.php';
