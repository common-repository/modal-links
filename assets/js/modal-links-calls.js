var modalLinksPostUrlToPostIdCall = function(adminAjaxUrl, url)
{
    return jQuery.ajax({
        type     : 'POST',
        url      : adminAjaxUrl,
        async    : false,
        data     : {
                 action: 'modalLinksPostUrlToPostId',
                 modalLinks_postUrl: url
        },
        dataType : 'json'
    });
}

var modalLinksGetPostCall = function(adminAjaxUrl, data, callback)
{
    var response;

    if (data.modalLoadingGif !== '') {
        jQuery('#modalLinksDialog')
        .html('<img width="" height="" style="margin: 0 auto; display: block" alt="" src="'+data.modalLoadingGif+'" />')
        .dialog('open');
    }

    jQuery.when(jQuery.ajax({

        type     : 'POST',
        url      : adminAjaxUrl,
        async    : true,
        data     : data,
        dataType : 'json'

    }).done(function(data) {

        response = data;

    })).done(function(){

        callback(response);

    });

}