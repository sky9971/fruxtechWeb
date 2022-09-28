
"use strict";
var dsvy_admin_menu_class = function(){
	jQuery('#adminmenu > li[id$="-wp-admin-customize"]').addClass('dsvy-admin-customize-menu');
}

jQuery(document).ready(function($){

	dsvy_admin_menu_class();
	jQuery( '#acf-dsvy-photo-gallery-group' ).hide();
	jQuery( '.dsvy-merlin-message-small a' ).on('click', function(e){
		e.preventDefault();
		var parent = jQuery(this).closest('.dsvy-merlin-message-box');
		jQuery('.dsvy-merlin-message-conform', parent).fadeIn();
		jQuery('.dsvy-merlin-message-inner', parent).animate({opacity: 0}, 400);
		jQuery('.dsvy-merlin-message-box button.notice-dismiss', parent).fadeOut(400);
	});
	jQuery( '.dsvy-disable-merlin-message-cancel' ).on('click', function(e){
		e.preventDefault();
		var parent = jQuery(this).closest('.dsvy-merlin-message-box');
		jQuery('.dsvy-merlin-message-conform', parent).fadeOut();
		jQuery('.dsvy-merlin-message-inner', parent).animate({opacity: 1}, 400);
		jQuery('.dsvy-merlin-message-box button.notice-dismiss', parent).fadeIn(400);
	});
	jQuery( '.dsvy-disable-merlin-message' ).on('click', function(e){
		e.preventDefault();
		jQuery(this).closest('.notice.is-dismissible').slideUp();
		jQuery.post(
			ajaxurl, 
			{ 'action': 'dsvy_remove_merlin_message' },
			function(response) {
				// Do nothing
			}
		);
	});

	// Ratings box
	jQuery( '.dsvy-merlin-ratings-box .dsvy-question-btn' ).on('click', function(e){
		e.preventDefault();
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-main').slideUp(400);
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-questions').slideDown(400);
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-back-link').fadeIn(400);
	});
	jQuery( '.dsvy-merlin-ratings-box .dsvy-happy-btn' ).on('click', function(e){
		e.preventDefault();
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-main').slideUp(400);
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-ratings').slideDown(400);
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-back-link').fadeIn(400);
	});
	jQuery( '.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-back-link' ).on('click', function(e){
		e.preventDefault();
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-main').slideDown(400);
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-ratings').slideUp(400);
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-questions').slideUp(400);
		jQuery('.dsvy-merlin-ratings-box .dsvy-merlin-ratings-box-back-link').fadeOut(400);
	});
	jQuery( '.dsvy-disable-ratings-message-cancel' ).on('click', function(e){
		var parent = jQuery(this).closest('.dsvy-merlin-message-box');
		jQuery('.dsvy-merlin-message-conform', parent).fadeOut();
		jQuery('.dsvy-merlin-message-inner', parent).animate({opacity: 1}, 400);
		jQuery('.dsvy-merlin-message-box button.notice-dismiss', parent).fadeIn(400);
	});
	jQuery( '.dsvy-merlin-ratings-box .dsvy-disable-ratings-message' ).on('click', function(e){
		e.preventDefault();
		jQuery(this).closest('.notice.is-dismissible').slideUp();
		jQuery.post(
			ajaxurl, 
			{ 'action': 'dsvy_remove_ratings_message' },
			function(response) {
				// Do nothing
			}
		);
	});
});
jQuery(window).load(function($){

	// Post Format functions
	designervily_post_format_calls();

});	

var designervily_post_format_calls = function() {

	jQuery('#acf-form-data').insertAfter('#titlediv');
	jQuery('#acf_after_title-sortables').insertAfter('#acf-form-data');

	console.log('Called');

	jQuery('input[type=radio][name=post_format]').change(function() {

		if( this.value == 'image' ){  // Post Format - Image
			jQuery('#postimagediv').after('<div id="dsvy-postimagediv-place-holder"></div>').insertAfter('#titlediv');
		} else {
			jQuery('#dsvy-postimagediv-place-holder').replaceWith( jQuery('#postimagediv') );
		}

		if( this.value == 'status' ){  // Post Format - Status
			jQuery('#content:visible').focus();
			jQuery('#titlewrap').hide();
		} else {
			jQuery('#titlewrap').show();
		}

	});

};