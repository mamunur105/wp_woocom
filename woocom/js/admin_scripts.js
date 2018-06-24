(function($) {
    "use strict";

    $("button.author_info_image").on("click",function(e){
        // preventDefault
        e.preventDefault();
        var button = $(this);
        var imageuploder = wp.media({
            'title':"Upload author Image ",
            'button':{
                'text':"set the image"
            },
            'multiple':false 
        });
        imageuploder.open();

        imageuploder.on("select",function(){
            var image = imageuploder.state().get("selection").first().toJSON();
            var image_link = image.url;
            button.next("input.image_link").val(image_link);
            button.parent(".image-show-area").find("img").attr('src',image_link);
            $('input.widget-control-save').removeAttr('disabled');
        });

    });

    $("button.clear_image").on("click",function(e){
        // preventDefault
        e.preventDefault();
        var button = $(this);
        
        imageuploder.on("select",function(){

            button.next("input.image_link").val('');
            button.parent(".image-show-area").find("img").attr('src','');
            $('input.widget-control-save').removeAttr('disabled');
        });

    });
    

})(jQuery)