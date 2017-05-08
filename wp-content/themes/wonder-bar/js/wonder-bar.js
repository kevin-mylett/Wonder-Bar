(function toggleNavigation() {
    var toggle = document.querySelector('.toggleNav');
    toggle.addEventListener('click', toggleClass);

    function toggleClass() {
        var menu = document.querySelector('.menu');

        menu.classList.toggle('open');
    }

})();

jQuery( function( $ ) {

	// Quantity buttons
	//$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="add" />' ).prepend( '<input type="button" value="-" class="minus" />' );

	$( document ).on( 'click', '.plus, .minus', function() {

		// Get values
		var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		// Change the value
		if ( $( this ).is( '.plus' ) ) {

			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}

		} else {

			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}

		}

		// Trigger change event
		$qty.trigger( 'change' );

	});

});


$( document ).on('hidden.bs.modal', function () {
    window.location.reload(true);
});


$(document).ready(function(){

	$('.twitter-block').delegate('#twitter-widget-0','DOMSubtreeModified propertychange', function() {

            hideTweetMedia();

        });
        var hideTweetMedia = function() {

            $('.twitter-block').find('.twitter-timeline').contents().find('.timeline-Tweet-media').css('display', 'none');

            $('.twitter-block').css('height', '100%');

            $('.twitter-block').find('.twitter-timeline').contents().find('.Identity-screenName').css('color', '#f3a9d6');

            $('.twitter-block').find('.twitter-timeline').contents().find('.TweetAuthor-name').css('color', '#fff');

            $('.twitter-block').find('.twitter-timeline').contents().find('.timeline-Tweet-text').css('color', '#f3a9d6');

            $('.twitter-block').find('.twitter-timeline').contents().find('.timeline-Tweet-retweetCredit').css('color', '#f3a9d6');

            $('.twitter-block').find('.twitter-timeline').contents().find('.timeline-Tweet-action').hide();

            $('.twitter-block').find('.twitter-timeline').contents().find('.timeline-TweetList').bind('DOMSubtreeModified propertychange', function() {

                hideTweetMedia(this);

            });

        };
    });