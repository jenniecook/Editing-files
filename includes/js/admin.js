;(function($){
  $(document).ready(function(){

    "use strict";

    $('form#redux-form-wrapper #musicflow_admin-home-header li label input:checked').siblings()
    .css({
      'border-color' : '#0073AA',
      'border-width' : '8px'
    });

    var $current_header_version = $('.cmb_id_musicflow-prefix-page-header-version ul li input:checked');
    var current_value_header_version = $current_header_version.val();

    $('#page-'+ current_value_header_version + '-version-options').slideDown();

    $('.cmb_id_musicflow-prefix-page-header-version ul li input').click(function(){
      $('#page-header-slider-version-options').slideUp();
      $('#page-header-text-buttons-version-options').slideUp();
      $('#page-header-just-text-version-options').slideUp();
      $('#page-header-album-wall-version-options').slideUp();
      $('#page-'+ $(this).val() + '-version-options').slideDown();
    });

    // remove duplicate Copy to a new draft
    $('#major-publishing-actions #duplicate-action').each(function(){
      if ($(this).index() == 1) {
        $(this).hide();
      };
    });

  });
})(jQuery);