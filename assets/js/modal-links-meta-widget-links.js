jQuery(function(){

    jQuery('aside').each(function(){
        if (jQuery(this).hasClass('widget')
            && jQuery(this).hasClass('widget_meta')
        ) {
            jQuery(this).find('a').each(function() {
                var link        = jQuery(this).prop('href');
                var linkArr     = link.split('/');
                var linkArrLast = jQuery(linkArr).get(-1);

                if (linkArrLast === 'wp-login.php') {
                    jQuery(this).attr({
                    'target': '_modal',
                    'href': '#',
                    'data-login': 'true'
                    });
                } else if (linkArrLast === 'wp-login.php?action=register') {
                    jQuery(this).attr({
                    'target': '_modal',
                    'href': '#',
                    'data-login': 'true',
                    'data-action': 'register'
                    });
                } else if (linkArrLast.indexOf('wp-login.php?action=logout') > -1) {
                    jQuery(this).attr({
                    'target': '_modal',
                    'href': '#',
                    'data-login': 'true',
                    'data-action': 'logout'
                    });
                }
            });
        }
    });

});