(function($) {
	$(function(){
		var b = false;
		$("#fm-megabutton").click(function (){
			if (!b) {
				$("#megafont").hide();
				$("#megaclose").show();
				console.log($('input[name=duration]').val());
				$(".fm-items").fadeTo(  parseInt($('input[name=duration]').val()), 1 );
				b = true;
			} else 
			{
				$("#megafont").show();
				$("#megaclose").hide();
				$(".fm-items").fadeTo( parseInt($('input[name=duration]').val()), 0 );
				b = false;
			}
 
		});

	});
})( jQuery );

