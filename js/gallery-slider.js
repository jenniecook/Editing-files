;(function($){
  $(document).ready(function(){
  "use strict";

   if ( $('div.musicflow-galleries .photo-slider').length > 0 ) {

      $('.photo-slider').camera({
        thumbnails: false,
        navigationHover: false,
        pagination: false,
        fx: 'scrollLeft',
        playPause: false,
        autoAdvance: true,
        loader: 'bar'
      });

    }

  });
})(jQuery);