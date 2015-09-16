/*--------------------------------------------------
MUSICFLOW html/css template - custom.js

URL:gozawi.com
SUPPORT: wtxinc@gmail.com
CODE: MF001JS

---------------------------------------------------*/

/***************************************************
1. ON LOAD JQUERY
***************************************************/

(function(jQuery) {
	"use strict";

    jQuery('.search  input[type=text]').css('width', '100%').css('width', '-=40px');
	jQuery('.search  input[type=search]').css('width', '100%').css('width', '-=40px');
	jQuery('.comments-ul .comment-content').css('width', '100%').css('width', '-=86px');

	/***************************************************
	2. IMG HOVERS
	***************************************************/

		jQuery('.img-hover').hover(
		function () {
		    jQuery(this).stop( true, true ).animate({opacity: 1 }, 500);
			jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '49' }, 500);
			},
			function () {
			 jQuery(this).stop( true, true ).animate({opacity: 0 }, 500);
			 jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '0' }, 500);
			}
		);

		jQuery('.img-hover-photo').hover(
		function () {
		    jQuery(this).stop( true, true ).animate({opacity: 1 }, 500);
			jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '49' }, 500);
			},
			function () {
			 jQuery(this).stop( true, true ).animate({opacity: 0 }, 500);
			 jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '0' }, 500);
			}
		);

		jQuery('.img-hover-album').hover(
		function () {
		    jQuery(this).stop( true, true ).animate({opacity: 1 }, 500);
			jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '118' }, 500);
			},
			function () {
			 jQuery(this).stop( true, true ).animate({opacity: 0 }, 500);
			 jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '0' }, 500);
			}
		);

		jQuery('.img-hover-resident').hover(
		function () {
		    jQuery(this).stop( true, true ).animate({opacity: 1 }, 500);
			jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '118' }, 500);
			},
			function () {
			 jQuery(this).stop( true, true ).animate({opacity: 0 }, 500);
			 jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '0' }, 500);
			}
		);

		jQuery('.img-hover-sidebar').hover(
		function () {
		    jQuery(this).stop( true, true ).animate({opacity: 1 }, 500);
			jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '44' }, 500);
			},
			function () {
			 jQuery(this).stop( true, true ).animate({opacity: 0 }, 500);
			 jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '0' }, 500);
			}
		);

		jQuery('.img-hover-media-player').hover(
		function () {
		    jQuery(this).stop( true, true ).animate({opacity: 1 }, 500);
			jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '108' }, 500);
			},
			function () {
			 jQuery(this).stop( true, true ).animate({opacity: 0 }, 500);
			 jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '0' }, 500);
			}
		);

		jQuery('.img-hover-media-top').hover(
		function () {
		    jQuery(this).stop( true, true ).animate({opacity: 1 }, 500);
			jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '110' }, 500);
			jQuery(this).find('h6').stop( true, true ).animate({ 'bottom': '30' }, 500);
			},
			function () {
			 jQuery(this).stop( true, true ).animate({opacity: 0 }, 500);
			 jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '0' }, 500);
			 jQuery(this).find('h6').stop( true, true ).animate({ 'bottom': '0' }, 500);
			}
		);
		
		jQuery('.img-hover-shop').hover(
		function () {
		    jQuery(this).stop( true, true ).animate({opacity: 1 }, 500);
			jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '40%' }, 500);
			},
			function () {
			 jQuery(this).stop( true, true ).animate({opacity: 0 }, 500);
			 jQuery(this).find('span').stop( true, true ).animate({ 'marginTop': '0' }, 500);
			}
		);

	/***************************************************
	3. PRETTY PHOTO
	***************************************************/

		jQuery('a[data-rel]').each(function() {
				jQuery(this).attr('rel', jQuery(this).data('rel'));
		});

		jQuery("a[rel^='prettyPhoto']").prettyPhoto();


	/***************************************************
	5. REMOVE MASK BUTTON
	***************************************************/

    var state = true;
    jQuery( ".remove-mask" ).click(function() {
	    if ( state ) {
	     jQuery('.top-content .button-2').animate({ opacity:0 },1000);
				jQuery('.top-content h1').animate({ opacity:0 },1000);
				jQuery('.top-content p').animate({ opacity:0 },1000);

				jQuery('.top-wrapper-mask').wait(1200).animate({ 'background-color': 'rgba(0, 0, 0, 0)' },1000);
				jQuery('.top-content .button-1').wait(1200).animate({ left:898 , bottom:199 },1000);

				jQuery('.album-wall img').wait(1800).addClass('img-z-index');
				jQuery('.album-wall .img-hover-media-top').wait(1800).addClass('img-hover-media-top-z-index');
	    } else {
	      jQuery('.top-content .button-2').wait(1200).animate({ opacity:1 },1000);
				jQuery('.top-content h1').wait(1200).animate({ opacity:1 },1000);
				jQuery('.top-content p').wait(1200).animate({ opacity:1 },1000);

				jQuery('.top-wrapper-mask').animate({ 'background-color': 'rgba(0, 0, 0, 0.7)' },1000);
				jQuery('.top-content .button-1').animate({ left:291 , bottom:323 },1000);

				jQuery('.album-wall img').removeClass('img-z-index');
				jQuery('.album-wall .img-hover-media-top').removeClass('img-hover-media-top-z-index');
	    }
	    state = !state;
    });

	/***************************************************
	6. OPTIONAL ANIMATIONS
	***************************************************/

		if (jQuery(window).height() > 900 && jQuery('body').hasClass('animate')) {
			skrollr.init();
		};

		/***************************************************
		7. ALERT & TOGGLE
		***************************************************/

		jQuery('.alert').click(function(event) {
			event.preventDefault();
		  jQuery(this).hide('slow', function() {
				return false;
		  });
		});

		jQuery('.toggle .button-normal').click(function(event) {
			event.preventDefault();
		  jQuery(this).parent().find('.toggle-content').toggle('slow', function() {
				return false;
		  });
		});


		/***************************************************
		8. MOBILE MENU
		***************************************************/

		jQuery('.mobile-button').click(function() {
		  jQuery('.mobile-menu').toggle('slow', function() {
			return false;
		  });
		});

		jQuery('.mobile-menu li a').click(function() {
		  jQuery('.mobile-menu').toggle('slow', function() {
			return false;
		  });
		});


	/***************************************************
	10. FOR WP
	***************************************************/

		jQuery(".sidebar-responsive a:not([class*='skin-font-color5'])").addClass("skin-font-color5 bold skin-color-hover1");
		jQuery(".button-small").removeClass("skin-font-color5 bold skin-color-hover1");
		jQuery('.logged-in-as a').addClass("skin-font-color5").addClass("skin-color-hover1 bold");
		jQuery('.widget_search').addClass("skin-background-color7 search-box");
		jQuery('.widget_search form').addClass("search");
		jQuery('.widget_search form input[type=search]').addClass("skin-background-color2 skin-font-color7 font");
		jQuery('.widget_search form input[type=submit]').addClass("icon font-size-72px skin-font-color2 skin-color-hover4").attr('value', 'r');
		jQuery('.widget_calendar table caption').addClass("bold font-size-16px");
		jQuery('.widget_calendar table thead tr').addClass("skin-background-color1 skin-font-color3");

		jQuery('.widget_archive ul li').addClass("skin-border-color4 semibold").removeClass('bold');
		jQuery('.widget_categories ul li').addClass("skin-border-color4");
		jQuery('.widget_pages ul li').addClass("skin-border-color4");
		jQuery('.widget_recent_comments ul li').addClass("skin-border-color4");
		jQuery('.widget_nav_menu ul li').addClass("skin-border-color4");
		jQuery('.widget_recent_entries ul li').addClass("skin-border-color4");
		jQuery('.widget_meta ul li').addClass("skin-border-color4");

		jQuery('.widget_archive select').addClass("skin-border-color4");
		jQuery('.widget_categories select').addClass("skin-border-color4");
		jQuery('.widget_text select').addClass("skin-border-color4");

		jQuery('.widget_archive ul li a').addClass("semibold").removeClass('bold');
		jQuery('.widget_categories ul li a').addClass("semibold").removeClass('bold');
		jQuery('.widget_pages ul li a').addClass("semibold").removeClass('bold');
		jQuery('.widget_recent_comments ul li a').addClass("semibold").removeClass('bold');
		jQuery('.widget_nav_menu ul li a').addClass("semibold").removeClass('bold');
		jQuery('.widget_recent_entries ul li a').addClass("semibold").removeClass('bold');
		jQuery('.widget_meta ul li a').addClass("semibold").removeClass('bold');

		jQuery('.single-post .post a').addClass("skin-font-color5").addClass("skin-color-hover1 semibold");
		jQuery('.single-post .post table thead').addClass("skin-background-color1 skin-font-color3");
		jQuery('.single-post .post table tbody tr ').addClass("skin-border-color4");
		jQuery('.single-post blockquote').addClass("semiitalic");
		jQuery('.single-post pre').addClass("skin-background-color7");

		jQuery('.post-password-form input[type="submit"]').addClass("skin-font-color3 skin-background-color1 skin-background-hover3");
		jQuery('.post-password-form input[type="password"]').addClass("skin-border-color4");

		jQuery('.comments-ul a').addClass("skin-font-color5").addClass("skin-color-hover1 semibold");
		jQuery('.comments-ul table thead').addClass("skin-background-color1 skin-font-color3");
		jQuery('.comments-ul table tbody tr ').addClass("skin-border-color4");
		jQuery('.comments-ul blockquote').addClass("semiitalic");
		jQuery('.comments-ul pre').addClass("skin-background-color7");

		jQuery('.page .normal-page .one-one a').addClass("skin-font-color5").addClass("skin-color-hover1 semibold");
		jQuery('.page .normal-page .one-one table thead').addClass("skin-background-color1 skin-font-color3");
		jQuery('.page .normal-page .one-one table tbody tr ').addClass("skin-border-color4");
		jQuery('.page .normal-page .one-one blockquote').addClass("semiitalic");
		jQuery('.page .normal-page .one-one pre').addClass("skin-background-color7");

		jQuery('.vc_row .button-normal').removeClass("skin-font-color5 skin-color-hover1");
		jQuery('.vc_row h4 a').removeClass("semibold");
		
		jQuery('.blog .main-content .news p a').addClass("skin-font-color5").addClass("skin-color-hover1 semibold");
		jQuery('.blog .main-content .news blockquote a').addClass("skin-font-color5").addClass("skin-color-hover1 semibold");
		
		jQuery('.wpcf7 input[type=submit]').addClass('skin-font-color3 skin-background-hover3 skin-background-color1');
		jQuery('.myaccount_user a').addClass('skin-font-color5 skin-color-hover1 bold');
		
		jQuery('.woocommerce ul.products li.product .posted_in a').addClass('skin-font-color6 skin-color-hover2 bold');
		jQuery('.woocommerce ul.products li.product .star-rating').addClass('skin-font-color6');
		
		jQuery('.woocommerce .page-numbers li').addClass('skin-border-color4');
		jQuery('.woocommerce .page-numbers.current').addClass('skin-background-color1 skin-font-color3');
		
		jQuery('.woocommerce .product .star-rating').addClass('skin-font-color6');
		
		jQuery('.woocommerce div.product .posted_in a').addClass('skin-font-color5 skin-color-hover1 bold');
		
		jQuery('.woocommerce #respond input#submit').addClass('skin-background-color1 skin-font-color3 skin-background-hover3');
		
		jQuery('.woocommerce .button-normal').removeClass('skin-font-color5 skin-color-hover1');
		
		jQuery('.woocommerce-info').addClass('skin-background-color1 skin-font-color3');
		jQuery('.woocommerce-message').addClass('skin-background-color9 skin-font-color3');
		jQuery('.woocommerce-error').addClass('skin-background-color1 skin-font-color3');
		
		jQuery('.woocommerce-info .button').addClass('skin-font-color3');
		jQuery('.woocommerce-message .button').addClass('skin-font-color3');
		jQuery('.woocommerce-error .button').addClass('skin-font-color3');
		
		jQuery( ".woocommerce-cart .shop_table thead .product-thumbnail" ).append( "Thumbnail" );
		
		jQuery('.woocommerce .shop_table.cart  input[type=submit]').addClass('button-small skin-background-color1 skin-font-color3 skin-background-hover3');
		jQuery('.cart_totals .checkout-button').addClass('button-normal skin-background-color1 skin-font-color3 skin-background-hover3');
		jQuery('.cart_totals .checkout-button').removeClass('skin-font-color5 skin-color-hover1');
		jQuery('.woocommerce .showcoupon').removeClass('skin-font-color5 skin-color-hover1').addClass('skin-font-color3');
		jQuery('.woocommerce-info a').removeClass('skin-font-color5 skin-color-hover1').addClass('skin-font-color3');
		jQuery('.woocommerce-message a').removeClass('skin-font-color5 skin-color-hover1').addClass('skin-font-color3');
		jQuery('.woocommerce-error a').removeClass('skin-font-color5 skin-color-hover1').addClass('skin-font-color3');

})(jQuery);

jQuery(window).resize(function() {
	"use strict";

	jQuery('.comments-ul .comment-content').css('width', '100%').css('width', '-=86px');
	jQuery('.search  input[type=text]').css('width', '100%').css('width', '-=40px');
	jQuery('.search  input[type=search]').css('width', '100%').css('width', '-=40px');

});


/***************************************************
9. MUSIC PLAYER
***************************************************/

jQuery(document).ready(function(){
	"use strict";
	if ( jQuery('.music-player').hasClass('has-player')){
		jQuery('.footer').css('height', '82px');
		jQuery('.top-wrapper').addClass('mobile-has-player');
	}

	soundManager.url =  MUSICFLOW_SCRIPT.template_url+'/swf/';
	soundManager.flashVersion = 9;
	soundManager.useHTML5Audio = true;
	soundManager.debugMode = false;

	jQuery('.music-player').fullwidthAudioPlayer({autoPlay: false, sortable: true });

});