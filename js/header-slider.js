/***************************************************
  4. SLIDERS
  ***************************************************/
;(function($){
  $(document).ready(function(){
    "use strict";

    if ( $('body').hasClass('has-slider')) {

        $('.slider').camera({
          thumbnails: false,
          navigationHover: false,
          pagination: false,
          playPause: false,
          autoAdvance: true,
          fx: 'random',
          loader: 'bar'
        });
    }
  });
})(jQuery);