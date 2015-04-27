(function($){

	$(document).ready( function() {
    	$('.wrapper').carouFredSel({
    	 	items : {
                visible: 1,
            },
            scroll : {
                items: 1,
            },
			auto 			: true,
			circular		: true,
			next : {
		    	button: function() {
		            return $(this).parent().siblings(".next");
		        },
				key			: 'right',
			},
			prev : {
				button: function() {
			        return $(this).parent().siblings(".prev");
			    },
				key			: 'left',
			},
		});
	});

})(jQuery);
