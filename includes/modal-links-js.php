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
 * @package   Modal_Links_Js
 * @author    George Lazarou <info@georgelazarou.info>
 * @copyright 1999-2014 The PHP Group
 * @license   http://www.php.net/license/2_01.txt  PHP License 2.01
 * @link      https://wordpress.org/plugins/modal-links/
 */

if (defined('MODALLINKSINCLUDES') === false) {
    exit;
}


/**
 * Gets the modal link on click
 *
 * @return nothing
 */
function modalLinksGetPost()
{
    $modalLinksSessions = new ModalLinksSessions();
    $modalLinksSessions->createSessions();
    $adminAjaxUrl         = admin_url('admin-ajax.php');
    $modalLinksModalWidth = intval(get_option('modalLinksModalWidth'));
    $modalLinksModalWidthType        = get_option('modalLinksModalWidthType');
    $modalLinksModalResponsiveWidth  = get_option('modalLinksModalResponsiveWidth');
    $modalLinksModalHeight           = intval(get_option('modalLinksModalHeight'));
    $modalLinksModalHeightType       = get_option('modalLinksModalHeightType');
    $modalLinksModalMaxHeight        = intval(get_option('modalLinksModalMaxHeight'));
    $modalLinksModalMaxHeightType    = get_option('modalLinksModalMaxHeightType');
    $modalLinksModalResponsiveHeight = get_option('modalLinksModalResponsiveHeight');
    $modalLinksModalDraggable        = get_option('modalLinksModalDraggable');
    $modalLinksModalResizable        = get_option('modalLinksModalResizable');
    $modalLinksModalShow       = get_option('modalLinksModalShow');
    $modalLinksModalHide       = get_option('modalLinksModalHide');
    $modalLinksModalType       = get_option('modalLinksModalType');
    $modalLinksModalCloseIcon  = get_option('modalLinksModalCloseIcon');
    $modalLinksModalCloseEsc   = get_option('modalLinksModalCloseEsc');
    $modalLinksModalLoadingGif = get_option('modalLinksModalLoadingGif');
    $modalLinksModalClass      = get_option('modalLinksModalClass');
    $modalLinksModalPosition   = get_option('modalLinksModalPosition');
    $modalLinksModalResponsivePosition = get_option('modalLinksModalResponsivePosition');

    if ($modalLinksModalWidth == 0) {
        $modalLinksModalWidth = '\'auto\'';
    }

    if ($modalLinksModalHeight == 0) {
        $modalLinksModalHeight = '\'auto\'';
    }

    if ($modalLinksModalMaxHeight == 0) {
        $modalLinksModalMaxHeight = '\'auto\'';
    }

    if ($modalLinksModalCloseIcon === 'true') {
        $closeIconDisplay = 'block';
    } else if ($modalLinksModalCloseIcon === 'false') {
        $closeIconDisplay = 'none';
    } else {
        $closeIconDisplay = 'block';
    }

    if ($modalLinksModalLoadingGif !== '') {
        $modalLinksModalLoadingGif = plugins_url(
            'modal-links/assets/images/loading/ajaxLoader_'
            .$modalLinksModalLoadingGif
            .'.gif',
            ''
        );
    }

    $modalLinksModalCssClass = '';
    if ($modalLinksModalClass !== '') {
        $modalLinksModalCssClass = '.'.$modalLinksModalClass;
    }

    $modalLinksModalPositionArr = explode('_', $modalLinksModalPosition);
    $modalLinksModalPosition    = '{my: \''.
    $modalLinksModalPositionArr[0].
    ' '.
    $modalLinksModalPositionArr[1].
    '\', at: \''.
    $modalLinksModalPositionArr[0].
    ' '.
    $modalLinksModalPositionArr[1].
    '\', of: window}';

echo <<<CSS

<style type="text/css">

$modalLinksModalCssClass .ui-button.ui-dialog-titlebar-close {
    display: $closeIconDisplay
}

</style>

CSS;

echo <<<JAVASCRIPT

<script type="text/javascript">
jQuery(function(){

    if (jQuery.isNumeric($modalLinksModalWidth)
        && '$modalLinksModalWidthType' == '%'
    ) {
        var modalLinksModalWidthOpt = window.innerWidth * ($modalLinksModalWidth / 100);
    } else {
        var modalLinksModalWidthOpt = $modalLinksModalWidth;
    }

    if (jQuery.isNumeric($modalLinksModalHeight)
        && '$modalLinksModalHeightType' == '%'
    ) {
        var modalLinksModalHeightOpt = window.innerWidth * ($modalLinksModalHeight / 100);
    } else {
        var modalLinksModalHeightOpt = $modalLinksModalHeight;
    }

    if (jQuery.isNumeric($modalLinksModalMaxHeight)
        && '$modalLinksModalMaxHeightType' == '%'
    ) {
        var modalLinksModalMaxHeightOpt = window.innerWidth * ($modalLinksModalMaxHeight / 100);
    } else {
        var modalLinksModalMaxHeightOpt = $modalLinksModalMaxHeight;
    }

    jQuery(window).on('resize', function(){

        if (('$modalLinksModalResponsiveWidth' === 'true')
            && ('$modalLinksModalWidthType' === '%')
            && (jQuery.isNumeric($modalLinksModalWidth))
        ) {
            var modalLinksModalWidthRes = window.innerWidth * ($modalLinksModalWidth / 100);
            jQuery('#modalLinksDialog')
            .dialog('option', 'width', modalLinksModalWidthRes);
        }

        if (('$modalLinksModalResponsiveHeight' === 'true')
            && ('$modalLinksModalHeightType' === '%')
            && (jQuery.isNumeric($modalLinksModalHeight))
        ) {
            var modalLinksModalHeight = window.innerWidth * ($modalLinksModalHeight / 100);
            jQuery('#modalLinksDialog')
            .dialog('option', 'height', modalLinksModalHeightRes);
        }

        if (('$modalLinksModalResponsiveHeight' === 'true')
            && ('$modalLinksModalMaxHeightType' === '%')
            && (jQuery.isNumeric($modalLinksModalMaxHeight))
        ) {
            var modalLinksModalMaxHeight = window.innerWidth * ($modalLinksModalMaxHeight / 100);
            jQuery('#modalLinksDialog')
            .dialog('option', 'maxHeight', modalLinksModalMaxHeightRes);
        }

        if ('$modalLinksModalResponsivePosition' === 'true') {
            jQuery('#modalLinksDialog')
            .dialog('option', 'position', $modalLinksModalPosition);
        }

    });

    jQuery(document).on('click', 'a[target="_modal"]', function(e) {

        e.preventDefault();
        var thisID         = jQuery(this).attr('id');
        var thisHref       = jQuery(this).attr('href');
        var thisDataTitle  = jQuery(this).attr('data-title');
        var thisDataLogin  = jQuery(this).attr('data-login');
        var thisDataAction = jQuery(this).attr('data-action');

        var data = {
            modalLoadingGif: '$modalLinksModalLoadingGif',
            action: 'modalLinksGetPost'
        };

        if (thisID) {
            data.modalLinks_postID = thisID;
            if ((thisDataTitle === 'true') || (thisDataTitle === 'false'))
                data.modalLinks_postDataTitle = thisDataTitle;
        } else if (thisHref != '#') {
            data.modalLinks_postPermalink = thisHref;
            if((thisDataTitle === 'true') || (thisDataTitle === 'false'))
                data.modalLinks_postDataTitle = thisDataTitle;
        } else if (thisDataLogin === 'true') {
            data.modalLinks_postDataLogin = thisDataLogin;
            if ((thisDataAction === 'register') || (thisDataAction === 'logout'))
                data.modalLinks_postDataAction = thisDataAction;
            if ((thisDataTitle === 'true') || (thisDataTitle === 'false'))
                data.modalLinks_postDataTitle = thisDataTitle;
        } else {
            data = '';
        }

        if (data) {

            modalLinksGetPostCall('$adminAjaxUrl', data, function(data){

                if (data) {
                    var modalLoadingGif = data.modalLoadingGif;
                    var modalTitle      = data.modalTitle;
                    var modalDate       = data.modalDate;
                    var modalAuthor     = data.modalAuthor;
                    var modalContent    = data.modalContent;
                    var modalTitleExtended = '';

                    if (data.modalButtons && (data.modalButtons === 'false')) {
                        var buttonsDisplay = jQuery('#modalLinksDialog')
                        .parent('div')
                        .find('.ui-dialog-buttonpane')
                        .css('display');

                        if (buttonsDisplay !== 'none') {
                            jQuery('#modalLinksDialog')
                            .parent('div')
                            .find('.ui-dialog-buttonpane')
                            .css('display', 'none');
                        }
                    } else {
                        var buttonsDisplay = jQuery('#modalLinksDialog')
                        .parent('div')
                        .find('.ui-dialog-buttonpane')
                        .css('display');

                        if (buttonsDisplay === 'none') {
                            jQuery('#modalLinksDialog')
                            .parent('div')
                            .find('.ui-dialog-buttonpane')
                            .css('display', 'block');
                        }
                    }

                    if (modalAuthor !== '' || modalDate !== '') {
                        modalTitleExtended = '<span class="entry-meta" style="padding-left:10px">';
                        //console.log(modalTitleExtended);
                        if (modalDate !== '') {
                            modalTitleExtended += '<span class="entry-date">'+
                            '<time class="entry-date">'+modalDate+'</time>'+
                            '</span>';
                        }
                        //console.log(modalTitleExtended);
                        if (modalAuthor !== '') {
                            modalTitleExtended += '<span class="byline" style="display:inline-block">'+
                            '<span class="author vcard">'+modalAuthor+'</span>'+
                            '</span>';
                        }
                        //console.log(modalTitleExtended);
                        modalTitleExtended += '</span>';
                        //console.log(modalTitleExtended);
                    }

                    jQuery('#modalLinksDialog')
                    .html(modalContent)
                    .dialog('option', 'title', modalTitle)
                    .prev()
                    .find('.ui-dialog-title')
                    .append(modalTitleExtended);

                    if (modalLoadingGif === '') {
                        jQuery('#modalLinksDialog')
                        .dialog('open');
                    } else {
                        jQuery('#modalLinksDialog')
                        .dialog('option', 'position', $modalLinksModalPosition);
                    }
                }

            });
        }

    });

    jQuery('#modalLinks button[data-dismiss="modal"]').on('click', function(e){

        e.preventDefault();
        jQuery('#modalLinks').fadeOut();

    });

    jQuery('#modalLinksDialog').dialog({
        dialogClass   : '$modalLinksModalClass',
        modal         : $modalLinksModalType,
        autoOpen      : false,
        closeOnEscape : $modalLinksModalCloseEsc,
        draggable     : $modalLinksModalDraggable,
        resizable     : $modalLinksModalResizable,
        show          : $modalLinksModalShow,
        hide          : $modalLinksModalHide,
        open : function(event, ui) {

                jQuery(this).dialog('option',
                                    {'width': modalLinksModalWidthOpt,
                                     'height': modalLinksModalHeightOpt,
                                     'maxHeight': modalLinksModalMaxHeightOpt
                                    }
                                   );

        },
        close : function(event, ui) {

                    jQuery(this)
                    .html('')
                    .dialog('option', 'title', '')
                    .dialog('close');

        },
        buttons : {
            Ok    : function() {

                        jQuery(this)
                        .html('')
                        .dialog('option', 'title', '')
                        .dialog('close');

                    }
        }
    });

    jQuery('#modalLinksDialog')
    .addClass('entry-content')
    .prev()
    .find('.ui-dialog-title')
    .addClass('entry-title');

});
</script>

JAVASCRIPT;

}//end modalLinksGetPost()


add_action('wp_footer', 'modalLinksGetPost', 20);

do_action('modalLinksJs');
