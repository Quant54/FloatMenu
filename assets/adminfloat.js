(function($) {
	$(function(){
     $('#af').click(function () {
        $('#af').faSelector();
    });
     $('#af3').click(function () {
        $('#af3').faSelector();
    });
     var $box = $('#colorPicker');
     $box.tinycolorpicker();
     var $box2 = $('#colorPicker2');
     $box2.tinycolorpicker();
     var $box3= $('#colorPicker3');
     $box3.tinycolorpicker();

     /**
      * Delete item from custom menu 
      */
     $( ".fmdelete" ).click(function () {
        var tr_id =$(this).attr("data-id");

        jQuery.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            dataType: 'text',
            data: {
                action: 'delete_item',
                id: tr_id,
                security: ajax_object.ajax_nonce,
            },
            success: function (response) {
                var data = response;
                $( "#row"+tr_id).fadeOut('slow',0);
            },
            error: function (error) {
            }
        });

    });
      /**
      * Add item from custom menu 
      */
     $( "#add-item" ).click(function() {
        var param_items = {
            "title": $('input[name=add_symbol]').val(),
            "icon": $('input[name=addicon]:checked').val(),
            "iconaf":$('#af3').attr("class"),
            "url":$('input[name=add_url]').val(),
        }

        jQuery.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            dataType: 'text',
            data: {
                action: 'add_item',
                savedata: param_items,
                security: ajax_object.ajax_nonce,
            },
            success: function (response) {

                var data = response;       
                if (data==1)  location.reload();
            },
            error: function (error) {
         
            }
        });

    });


		$( "#save-sittings" ).click(function() {

            $("#setting-error-settings_updated").hide();
            var mobile = 0;
            if ($('input[name=mobile]:checked').val()=="on") mobile = 1;
            var param = {
                "shape":$('input[name=shape]:checked').val(),
                "structure":$('input[name=structure]:checked').val(),
                "font-color":$('#colorinput1').val(),
                "bg-color":$('#colorinput2').val(),
                "border-color":$('#colorinput3').val(),
                "font-size":$('#font-size').val(),
                "icon-awesome": $('#af').attr("class"),
                "symbol": $('input[name=symbol]').val(),
                "menu-position":$('input[name=menu-position]:checked').val(),
                "icon":$('input[name=icon]:checked').val(),
                "moblie-show":mobile,
                "duration":$('#duration').val(),
                "margin":$('#margin').val(),
                "wpmenu-slug":$('#wpmenu-slug').val(),
                "iswpmenu":$('input[name=iswpmenu]:checked').val(),
            };



            jQuery.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                dataType: 'text',
                data: {
                    action: 'save_settings',
                    savedata: param,
                    security: ajax_object.ajax_nonce,
                },
                success: function (response) {

                    var data = response;
                    if (data==1) $("#setting-error-settings_updated").fadeTo("slow",1);
                },
                error: function (error) {
                    console.log("error");
                }
            });
        });


	});
})( jQuery );

