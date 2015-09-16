function ScrollTo(id){
  jQuery('html,body').animate({scrollTop: jQuery(id).offset().top},3000);
}

(function(jQuery) {
  jQuery(window).scroll(function() {
    if (jQuery('div.bottom').length > 0) {
      var fromTop = jQuery(this).scrollTop();
      var startPostion = jQuery('div.bottom').offset().top-600;
      if (fromTop >= startPostion) {
        jQuery('.go-top').wait(250).animate({opacity: 1 , bottom: 50, }, 1000);
      }
    };
  });
})(jQuery);