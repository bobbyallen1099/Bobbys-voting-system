require('./bootstrap');
require('select2');
require('dropzone');

require('jquery-ui/ui/widgets/sortable.js');


$(function(){
    if($( "#sortable" ).length) {

        var csrf = $("meta[name='csrf-token']").attr("content");

        $( "#sortable" ).sortable({
            stop: function( event, ui ) {
                var product_id = $("#sortable").data('product-id');
                var $data = {};
                var $items = {}
                $("#sortable .image").each(function($index, $item) {
                    var $image_id = $($item).data('image-id');

                    $items[$image_id] = $index;
                });

                $data['_token'] = csrf;
                $data['items'] = $items;

                $.ajax({
                    url: '/admin/products/'+product_id+'/images/updateorder',
                    method: 'POST',
                    data: $data
                });
            }
        });
    }


    $('.select2').select2({
        tags: true
    });

    $('.toggle-menu').on('click', function(){
        $("#menu").toggleClass('closed');

        var closed;
        if( $("#menu").hasClass('closed') ) {
            closed = 1;
        } else {
            closed = 0;
        }


        var csrf = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: '/admin/menu',
            method: 'post',
            data: {
                'closed': closed,
                "_token": csrf
            }
        });

    });

    $(".toggle-like").on('click', function() {
        var id = $(this).data('feature-id');
        var csrf = $("meta[name='csrf-token']").attr("content");
        var likes_count = $(this).parent().find('.count-likes');

        $(this).toggleClass('btn-primary');
        $(this).toggleClass('btn-outline-primary');

        if ($(this).hasClass('btn-primary')) {
            var new_likes_value = parseInt(likes_count.text()) + 1;    
        } else {
            var new_likes_value = parseInt(likes_count.text()) - 1;
        }

        $(this).parent().find('.count-likes').text(new_likes_value);

        $.ajax({
            url: '/admin/features/'+id+'/vote',
            method: 'post',
            data: {
                "_token": csrf
            }
        });
    });
});