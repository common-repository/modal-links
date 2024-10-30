jQuery(function(){

    jQuery('a.more-link').each(function(){

        var thisHref = jQuery(this).attr('href');
        var dataId = '';

        jQuery.when(modalLinksPostUrlToPostIdCall(readMoreLinksParams.adminAjax, thisHref))
        .done(function(data){
            if (data) {
                dataId = data.id;
            }
        });

        jQuery(this)
        .removeAttr('class')
        .prop({'target': '_modal',
               'href': '#',
               'id': dataId});

    });

    jQuery('a.read-more').each(function(){

        var thisHref = jQuery(this).attr('href');
        var dataId = '';

        jQuery.when(modalLinksPostUrlToPostIdCall(readMoreLinksParams.adminAjax, thisHref))
        .done(function(data){
            if (data) {
                dataId = data.id;
            }
        });

        jQuery(this)
        .removeAttr('class')
        .prop({'target': '_modal',
               'href': '#',
               'id': dataId});

    });
});