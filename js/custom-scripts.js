$(document).ready(function() {

    var lightboxStyles = document.createElement("style");
    lightboxStyles.innerText = "#content img {cursor:pointer!important;}";
    $("head")[0].appendChild(lightboxStyles);

    $('section.post img').click(function(e) {
    	e.preventDefault();

        var image_href = $(this).attr("src");

        if ($('#lightbox').length > 0) {
            $('#lightboxContent').html('<img src="' + image_href + '" />');
            $('#lightbox').show();
        }

        else {
            var lightbox =
            '<div id="lightbox" style="position:fixed;display:table;width:100%;height:100%;float:none;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.8);z-index:9999;">' +
                '<p class="text-primary" style="font-size:1.4em;text-transform:uppercase;font-weight:bold;margin:0 4px 24px;text-align:right;">Click to close</p>' +
                '<div id="lightboxContent" style="vertical-align;text-align:center;">' +
                    '<img src="' + image_href +'" />' +
                '</div>' +
            '</div>';
            $('body').append(lightbox);
        }
    });


    $('.dropdown').click(function(e){
        var notMobileMenu = $('.navbar-toggle').size() > 0 && $('.navbar-toggle').css('display') === 'none';
        if((e.originalEvent !== undefined) && (notMobileMenu)) {
            e.stopPropagation();
        }
    });

    $(".dropdown").hover(function(){
        $(this).find('.dropdown-toggle').trigger('click');
    });

    $(document).on('click', '#lightbox', function() {
    	$(this).hide();
    });

});
