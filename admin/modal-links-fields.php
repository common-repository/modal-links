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
 * @package   Modal_Links_Fields
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSADMIN') === false) {
    exit;
}

if (class_exists('ModalLinksFields') === false) {
    /**
     * Settings Class
     *
     * @category  Modal_Links_Class
     * @package   Modal_Links_Class_Fields
     * @author    George Lazarou <info@georgelazarou.info>
     * @copyright 2013-2014 The PHP Group
     * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
     * @link      https://wordpress.org/plugins/modal-links
     */
    class ModalLinksFields
    {



        /**
         * Constructor
         */
        public function __construct()
        {


        }//end __construct()


        public function returnFields()
        {
            $sizeFields =
                    array(
                     'modalLinksModalWidth' => array(
                     'code' => 'modalLinksModalWidth',
                     'title' => 'Width',
                     'section' => 'modalSizeSection',
                     'default' => '0',
                     'validation' => 'intval',
                     'tooltip' => 'leave it empty or \'0\' for \'auto\'',
                     'type' => 'input',
                     ),
                     'modalLinksModalMinWidth' => array(
                     'code' => 'modalLinksModalMinWidth',
                     'title' => 'Min Width',
                     'section' => 'modalSizeSection',
                     'default' => '150',
                     'validation' => 'intval',
                     'tooltip' => 'leave it empty or \'0\' for \'auto\'',
                     'type' => 'input',
                     ),
                     'modalLinksModalMaxWidth' => array(
                     'code' => 'modalLinksModalMaxWidth',
                     'title' => 'Max Width',
                     'section' => 'modalSizeSection',
                     'default' => '0',
                     'validation' => 'intval',
                     'tooltip' => 'leave it empty or \'0\' for \'auto\'',
                     'type' => 'input',
                     ),
                     'modalLinksModalWidthType' => array(
                     'code' => 'modalLinksModalWidthType',
                     'title' => 'Width Type',
                     'section' => 'modalSizeSection',
                     'default' => 'px',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('px', '%'),
                     ),
                     'modalLinksModalResponsiveWidth' => array(
                     'code' => 'modalLinksModalResponsiveWidth',
                     'title' => 'Responsive Width',
                     'section' => 'modalBehaviorSection',
                     'default' => 'true',
                     'validation' => '',
                     'tooltip' => 'will work only for fluid width type',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalHeight' => array(
                     'code' => 'modalLinksModalHeight',
                     'title' => 'Height',
                     'section' => 'modalSizeSection',
                     'default' => '0',
                     'validation' => 'intval',
                     'tooltip' => 'leave it empty or \'0\' for \'auto\'',
                     'type' => 'input',
                     ),
                     'modalLinksModalMinHeight' => array(
                     'code' => 'modalLinksModalMinHeight',
                     'title' => 'Min Height',
                     'section' => 'modalSizeSection',
                     'default' => '150',
                     'validation' => 'intval',
                     'tooltip' => 'leave it empty or \'0\' for \'auto\'',
                     'type' => 'input',
                     ),
                     'modalLinksModalMaxHeight' => array(
                     'code' => 'modalLinksModalMaxHeight',
                     'title' => 'Max Height',
                     'section' => 'modalSizeSection',
                     'default' => '0',
                     'validation' => 'intval',
                     'tooltip' => 'leave it empty or \'0\' for \'auto\'',
                     'type' => 'input',
                     ),
                     'modalLinksModalHeightType' => array(
                     'code' => 'modalLinksModalHeightType',
                     'title' => 'Height Type',
                     'section' => 'modalSizeSection',
                     'default' => 'px',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('px', '%'),
                     ),
                     'modalLinksModalResponsiveHeight' => array(
                     'code' => 'modalLinksModalResponsiveHeight',
                     'title' => 'Responsive Height',
                     'section' => 'modalBehaviorSection',
                     'default' => 'true',
                     'validation' => '',
                     'tooltip' => 'will work only for fluid height type',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalDraggable' => array(
                     'code' => 'modalLinksModalDraggable',
                     'title' => 'Draggable',
                     'section' => 'modalBehaviorSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalResizable' => array(
                     'code' => 'modalLinksModalResizable',
                     'title' => 'Resizable',
                     'section' => 'modalBehaviorSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalTitle' => array(
                     'code' => 'modalLinksModalTitle',
                     'title' => 'Show Title',
                     'section' => 'modalFeaturesSection',
                     'default' => 'default',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('default', 'true', 'false'),
                     ),
                     'modalLinksModalDate' => array(
                     'code' => 'modalLinksModalDate',
                     'title' => 'Show Date',
                     'section' => 'modalFeaturesSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalAuthor' => array(
                     'code' => 'modalLinksModalAuthor',
                     'title' => 'Show Author',
                     'section' => 'modalFeaturesSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalShow' => array(
                     'code' => 'modalLinksModalShow',
                     'title' => 'Animate on Show',
                     'section' => 'modalBehaviorSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalHide' => array(
                     'code' => 'modalLinksModalHide',
                     'title' => 'Animate on Hide',
                     'section' => 'modalBehaviorSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalType' => array(
                     'code' => 'modalLinksModalType',
                     'title' => 'Is Modal',
                     'section' => 'modalBehaviorSection',
                     'default' => 'true',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalCloseIcon' => array(
                     'code' => 'modalLinksModalCloseIcon',
                     'title' => 'Close Icon',
                     'section' => 'modalFeaturesSection',
                     'default' => 'true',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalCloseEsc' => array(
                     'code' => 'modalLinksModalCloseEsc',
                     'title' => 'Close on Escape',
                     'section' => 'modalBehaviorSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksModalLoadingGif' => array(
                     'code' => 'modalLinksModalLoadingGif',
                     'title' => 'Loading Image',
                     'section' => 'modalFeaturesSection',
                     'default' => 'gray32',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array(
                                   ''          => 'off',
                                   'gray32'    => 'gray 32X32',
                                   'gray48'    => 'gray 48X48',
                                   'gray64'    => 'gray 64X64',
                                   'gray128'   => 'gray 128X128',
                                   'gray256'   => 'gray 256X256',
                                   'gray350'   => 'gray 350X350',
                                   'gray512'   => 'gray 512X512',
                                   'blue32'    => 'blue 32X32',
                                   'blue48'    => 'blue 48X48',
                                   'blue64'    => 'blue 64X64',
                                   'blue128'   => 'blue 128X128',
                                   'blue256'   => 'blue 256X256',
                                   'blue350'   => 'blue 350X350',
                                   'blue512'   => 'blue 512X512',
                                   'green32'   => 'green 32X32',
                                   'green48'   => 'green 48X48',
                                   'green64'   => 'green 64X64',
                                   'green128'  => 'green 128X128',
                                   'green256'  => 'green 256X256',
                                   'green350'  => 'green 350X350',
                                   'green512'  => 'green 512X512',
                                   'orange32'  => 'orange 32X32',
                                   'orange48'  => 'orange 48X48',
                                   'orange64'  => 'orange 64X64',
                                   'orange128' => 'orange 128X128',
                                   'orange256' => 'orange 256X256',
                                   'orange350' => 'orange 350X350',
                                   'orange512' => 'orange 512X512',
                                   'red32'     => 'red 32X32',
                                   'red48'     => 'red 48X48',
                                   'red64'     => 'red 64X64',
                                   'red128'    => 'red 128X128',
                                   'red256'    => 'red 256X256',
                                   'red350'    => 'red 350X350',
                                   'red512'    => 'red 512X512',
                                  ),
                     ),
                     'modalLinksModalClass' => array(
                     'code' => 'modalLinksModalClass',
                     'title' => 'CSS Class',
                     'section' => 'modalFeaturesSection',
                     'default' => '0',
                     'validation' => 'intval',
                     'tooltip' => 'this specified class name(s) will be added to the modal for additional theming',
                     'type' => 'input',
                     ),
                     'modalLinksModalPosition' => array(
                     'code' => 'modalLinksModalPosition',
                     'title' => 'Position',
                     'section' => 'modalBehaviorSection',
                     'default' => 'center_center',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array(
                                   'left_top'      => 'left top',
                                   'center_top'    => 'center top',
                                   'right_top'     => 'right top',
                                   'left_center'   => 'left center',
                                   'center_center' => 'center center',
                                   'right_center'  => 'right center',
                                   'left_bottom'   => 'left botton',
                                   'center_bottom' => 'center botton',
                                   'right_bottom'  => 'right botton',
                                  ),
                     ),
                     'modalLinksModalResponsivePosition' => array(
                     'code' => 'modalLinksModalResponsivePosition',
                     'title' => 'Responsive Position',
                     'section' => 'modalBehaviorSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksMetaWidget' => array(
                     'code' => 'modalLinksMetaWidget',
                     'title' => 'Meta Widget Links',
                     'section' => 'widgetsLinksSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                     'modalLinksReadMoreLinks' => array(
                     'code' => 'modalLinksReadMoreLinks',
                     'title' => 'Read More Links',
                     'section' => 'wordpressFeaturesSection',
                     'default' => 'false',
                     'validation' => '',
                     'tooltip' => '',
                     'type' => 'select',
                     'options' => array('true', 'false'),
                     ),
                    );

            $fields = $this->returnFormFields($sizeFields);
            //var_dump($fields);

            return $fields;

        }


        public function returnFormFields($fields)
        {
            $pushArr = array();
            $html    = '';
            foreach ($fields as $key => $value) {
                $type    = $value['type'];
                $code    = $value['code'];
                $tooltip = $value['tooltip'];
                if ($type === 'input') {
                    $html = $this->returnInput($code, get_option($code), $tooltip);
                } else if ($type === 'select') {
                    $options = $value['options'];
                    $html    = $this->returnSelect($code, $options, get_option($code), $tooltip);
                }

                $function = function() use($html) {
                        echo $html;
                    };

                $fields[$key]['function'] = $function;

            }

            return $fields;

        }


        /**
         * Returns the input options
         *
         * @param string $name    comment
         * @param string $id      comment
         * @param string $value   comment
         * @param string $tooltip comment
         *
         * @return nothing
         */
        public function returnInput($code, $value, $tooltip)
        {
            return '<input name="'.
            $code.
            '" id="'.
            $code.
            '" type="text" value="'.
            $value.
            '" title="'.
            __(
                $tooltip,
                'modal_links'
            ).
            '" />';
        }//end returnInput()


        public function returnSelect($code, $options, $value, $tooltip)
        {
            $return = '<select name="'.
            $code.
            '" id="'.
            $code.
            '" title="'.
            __($tooltip, 'modal_links').
            '">';

            foreach ($options as $key => $option) {
                if (is_numeric($key) === false) {
                    $optionVal = $key;
                } else {
                    $optionVal = $option;
                }
                if ($optionVal == $value) {
                    $return .= '<option value="'.
                    $optionVal.
                    '" selected="selected">'.
                    $option.
                    '</option>';
                } else {
                    $return .= '<option value="'.
                    $optionVal.
                    '">'.
                    $option.
                    '</option>';
                }
            }

            $return .= '</select>';

            return $return;

        }

    }
}

new ModalLinksFields();
