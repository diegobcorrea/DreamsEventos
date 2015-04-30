
(function($){

	$(document).ready( function() {
		$('#sendContact').click(function(e){
			e.preventDefault();

	    	$.ajax({
				type: 'POST',         
				url: apfajax.ajaxurl,
				data: {
				    action	: 'send_contactemail',
				    name 	: $('input#name').val(),
				    email	: $('input#email').val(),
				    subject	: $('input#subject').val(),
				    phone	: $('input#phone').val(),
				    mobile	: $('input#mobile').val(),
				    message	: $('textarea#message').val()
				},
				success: function(data, textStatus, XMLHttpRequest) {
					console.log(data);

					$("form.contact")[0].reset();
				},
				error: function(MLHttpRequest, textStatus, errorThrown) {
				    alert(errorThrown);
				}
			});
		});
	});

})(jQuery);
