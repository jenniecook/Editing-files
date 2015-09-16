<?php
/**
* Custom Data
* @author Paul Rudnicki - ThemesFactory <themesfactoryinfo@gmail.com>
*/
final class MusicFlowCustomData
{

   static function Instance()
  {
      static $inst = null;
      if ($inst === null) {
          $inst = new MusicFlowCustomData();
      }
      return $inst;
  }

  private function __construct(){

    add_action( 'show_user_profile', array( $this, 'additional_user_fields' ));
    add_action( 'show_user_profile', array( $this, 'addUploader' ));
    add_action( 'edit_user_profile', array( $this, 'additional_user_fields' ));
    add_action( 'edit_user_profile', array( $this, 'addUploader' ));
    add_action( 'personal_options_update', array( $this, 'save_additional_user_meta' ));
    add_action( 'edit_user_profile_update', array( $this, 'save_additional_user_meta' ));

    add_action( 'category_add_form', array( $this, 'renderTermData' ));
    add_action( 'category_edit_form', array( $this, 'renderTermData' ));
    add_action( 'edited_category', array( $this, 'saveTermData' ));
    add_action( 'category_edit_form', array( $this, 'addTermImage' ));

    add_action( 'post_tag_add_form', array( $this, 'renderTermData' ));
    add_action( 'post_tag_edit_form', array( $this, 'renderTermData' ));
    add_action( 'edited_post_tag', array( $this, 'saveTermData' ));
    add_action( 'post_tag_edit_form', array( $this, 'addTermImage' ));

    add_action( 'musicflow-albums-genres_add_form', array( $this, 'renderTermData' ));
    add_action( 'musicflow-albums-genres_edit_form', array( $this, 'renderTermData' ));
    add_action( 'edited_musicflow-albums-genres', array( $this, 'saveTermData' ));
    add_action( 'musicflow-albums-genres_edit_form', array( $this, 'addTermImage' ));

    add_action( 'musicflow-albums-tags_add_form', array( $this, 'renderTermData' ));
    add_action( 'musicflow-albums-tags_edit_form', array( $this, 'renderTermData' ));
    add_action( 'edited_musicflow-albums-tags', array( $this, 'saveTermData' ));
    add_action( 'musicflow-albums-tags_edit_form', array( $this, 'addTermImage' ));

    add_action( 'musicflow-videos-category_add_form', array( $this, 'renderTermData' ));
    add_action( 'musicflow-videos-category_edit_form', array( $this, 'renderTermData' ));
    add_action( 'edited_musicflow-videos-category', array( $this, 'saveTermData' ));
    add_action( 'musicflow-videos-category_edit_form', array( $this, 'addTermImage' ));

    add_action( 'musicflow-videos-tags_add_form', array( $this, 'renderTermData' ));
    add_action( 'musicflow-videos-tags_edit_form', array( $this, 'renderTermData' ));
    add_action( 'edited_musicflow-videos-tags', array( $this, 'saveTermData' ));
    add_action( 'musicflow-videos-tags_edit_form', array( $this, 'addTermImage' ));

    add_action( 'musicflow-galleries-category_add_form', array( $this, 'renderTermData' ));
    add_action( 'musicflow-galleries-category_edit_form', array( $this, 'renderTermData' ));
    add_action( 'edited_musicflow-galleries-category', array( $this, 'saveTermData' ));
    add_action( 'musicflow-galleries-category_edit_form', array( $this, 'addTermImage' ));

    add_action( 'musicflow-galleries-tags_add_form', array( $this, 'renderTermData' ));
    add_action( 'musicflow-galleries-tags_edit_form', array( $this, 'renderTermData' ));
    add_action( 'edited_musicflow-galleries-tags', array( $this, 'saveTermData' ));
    add_action( 'musicflow-galleries-tags_edit_form', array( $this, 'addTermImage' ));

    add_action( 'musicflow-events-places_add_form', array( $this, 'renderEventTermData' ));
    add_action( 'musicflow-events-places_edit_form', array( $this, 'renderEventTermData' ));
    add_action( 'musicflow-events-places_edit_form', array( $this, 'addEventTermImage' ));
    add_action( 'edited_musicflow-events-places', array( $this, 'saveEventTermData' ));

    add_action( 'musicflow-events-tags_add_form', array( $this, 'renderTermData' ));
    add_action( 'musicflow-events-tags_edit_form', array( $this, 'renderTermData' ));
    add_action( 'musicflow-events-tags_edit_form', array( $this, 'addTermImage' ));
    add_action( 'edited_musicflow-events-tags', array( $this, 'saveTermData' ));
  }


  function renderTermData( $term ) { ?>
   <?php
    if (strpos($_SERVER["REQUEST_URI"], '&tag_ID=')) {
      $term_header_img = get_option( $term->taxonomy ."_header_img_" . $term->term_id);
      $term_list_version = get_option( $term->taxonomy ."_list_version_". $term->term_id);
      ?>
      <table class="form-table">
        <tr>
          <th><label for="term_bg_image"><?php _e( 'Header Background Image', "musicflow_theme" ); ?></label></th>
          <td>
              <!-- Outputs the image after save -->
              <img id="user-meta-bg-img-src"src="<?php echo esc_url( $term_header_img ); ?>" style="width:150px;"><br />
              <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
              <input type="text" name="term_bg_image" id="term_bg_image" value="<?php echo esc_url_raw( $term_header_img  ); ?>" class="regular-text" />
              <!-- Outputs the save button -->
              <input type='button' class="additional-term-bg-image button-primary" value="<?php _e( 'Upload Image', "musicflow_theme" ); ?>" id="uploadimage"/><br />
              <span class="description"><?php _e( 'Upload an additional header background image for archive page.', "musicflow_theme" ); ?></span>
          </td>
        </tr>
        <tr>
          <th><label for="term_list_version"><?php _e( 'List item version', "musicflow_theme" ); ?></label></th>
          <td>
            <label title="one">
              <input type="radio" name="term_list_version" value="one" <?php echo (( empty($term_list_version) || $term_list_version == 'one' )) ? 'checked="checked"' : ''; ?>> <?php _e( 'Paragraph under image.', "musicflow_theme" ); ?>
            </label><br>
            <label title="two">
              <input type="radio" name="term_list_version" value="two" <?php echo (( isset($term_list_version) && $term_list_version == 'two' )) ? 'checked="checked"' : ''; ?>> <?php _e( 'Paragraph on the right side or hide.', "musicflow_theme" ); ?>
            </label><br>
            <br>
            <span class="description"><?php _e( 'Choose the list version layout to display.', "musicflow_theme" ); ?></span>
          </td>
        </tr>

      </table><!-- end form-table -->
    <?php }
    }

    function saveTermData( $term_id ) {

      $taxonomy = self::getTaxonomySlug($term_id);

        // only saves if the current user can edit user profiles
        if ( !current_user_can( 'edit_user', $user_id ) )
            return false;
         update_option( $taxonomy . "_header_img_" . $term_id,
        stripslashes(wp_filter_post_kses(addslashes($_POST['term_bg_image']))));
        update_option(  $taxonomy . "_list_version_" . $term_id ,
        stripslashes(wp_filter_post_kses(addslashes($_POST['term_list_version']))));

    }

     function addTermImage()
    {
      ?>
      <script>
      jQuery(document).ready(function($){
        // Uploading files

          var file_frame_header;

          $('.additional-term-bg-image').on('click', function( event ){

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( file_frame_header ) {
              file_frame_header.open();
              return;
            }

            // Create the media frame.
            file_frame_header = wp.media.frames.file_frame_header = wp.media({
              title: $( this ).data( 'uploader_title' ),
              button: {
                text: $( this ).data( 'uploader_button_text' ),
              },
              multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame_header.on( 'select', function() {
              // We set multiple to false so only get one image from the uploader
              attachment = file_frame_header.state().get('selection').first().toJSON();
              $('input#term_bg_image').val(attachment.url);
              $('img#user-meta-bg-img-src').attr('src', attachment.url);
              // Do something with attachment.id and/or attachment.url here
            });

            // Finally, open the modal
            file_frame_header.open();
          });

        });
      </script>
<?php
    }


    private function getTaxonomySlug($term_id)
    {
      global $wpdb;
      return $taxonomy = $wpdb->get_var( $wpdb->prepare(
        "SELECT taxonomy
          FROM $wpdb->term_taxonomy
          WHERE term_id = %d",
        $term_id
      ) );
    }


    function renderEventTermData( $term ) { ?>

      <?php
        if (strpos($_SERVER["REQUEST_URI"], '&tag_ID=')) {
        $term->term_id;
        $term_img = get_option( "musicflow_events_places_img_$term->term_id");
        $term_header_img = get_option( "musicflow-events-places_header_img_$term->term_id");
        $term_list_version = get_option( "musicflow_events_places_list_version_$term->term_id");
        $term_header_version = get_option( "musicflow_events_places_header_version_$term->term_id");
        $term_text_header = get_option( "musicflow_events_places_text_header_$term->term_id");
      ?>
      <table class="form-table">

        <tr>
          <th><label for="term_header_version"><?php _e( 'Header version', "musicflow_theme" ); ?></label></th>
          <td>
            <label title="one">
              <input type="radio" name="term_header_version" value="one" <?php echo (( empty($term_header_version) || $term_header_version == 'one' )) ? 'checked="checked"' : ''; ?>> <?php _e( 'Big  (Visible name, description etc).', "musicflow_theme" ); ?>
            </label><br>
            <label title="two">
              <input type="radio" name="term_header_version" value="two" <?php echo (( isset($term_header_version) && $term_header_version == 'two' )) ? 'checked="checked"' : ''; ?>> <?php _e( 'Small  (Hide name, description, etc).', "musicflow_theme" ); ?>
            </label><br>
            <br>
            <span class="description"><?php _e( 'Choose the header version layout to display.', "musicflow_theme" ); ?></span>
          </td>
        </tr>

        <tr>
          <th><label for="term_text_header"><?php _e( 'Text header', "musicflow_theme" ); ?></label></th>
          <td>
            <label title="term_text_header">
              <input type="text" name="term_text_header" value="<?php echo (isset($term_text_header) && !empty($term_text_header)) ? $term_text_header : ''; ?>">
            </label><br>
            <br>
            <span class="description"><?php _e( 'Text before category name.', "musicflow_theme" ); ?></span>
          </td>
        </tr>

        <tr>
          <th><label for="term_image"><?php _e( 'Image', "musicflow_theme" ); ?></label></th>
          <td>
              <!-- Outputs the image after save -->
              <img id="user-meta-img-src"src="<?php echo esc_url($term_img); ?>" style="width:150px;"><br />
              <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
              <input type="text" name="term_image" id="term_image" value="<?php echo esc_url_raw( $term_img ); ?>" class="regular-text" />
              <!-- Outputs the save button -->
              <input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', "musicflow_theme" ); ?>" id="uploadimage"/><br />
              <span class="description"><?php _e( 'Upload an additional image for place.', "musicflow_theme" ); ?></span>
          </td>
        </tr>

        <tr>
          <th><label for="term_bg_image"><?php _e( 'Header Background Image', "musicflow_theme" ); ?></label></th>
          <td>
              <!-- Outputs the image after save -->
              <img id="user-meta-bg-img-src"src="<?php echo esc_url( $term_header_img ); ?>" style="width:150px;"><br />
              <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
              <input type="text" name="term_bg_image" id="term_bg_image" value="<?php echo esc_url_raw( $term_header_img  ); ?>" class="regular-text" />
              <!-- Outputs the save button -->
              <input type='button' class="additional-term-bg-image button-primary" value="<?php _e( 'Upload Image', "musicflow_theme" ); ?>" id="uploadimage"/><br />
              <span class="description"><?php _e( 'Upload an additional header background image for archive page.', "musicflow_theme" ); ?></span>
          </td>
        </tr>

        <tr>
          <th><label for="term_list_version"><?php _e( 'List version', "musicflow_theme" ); ?></label></th>
          <td>
            <label title="one">
              <input type="radio" name="term_list_version" value="one" <?php echo (( empty($term_list_version) || $term_list_version == 'one' )) ? 'checked="checked"' : ''; ?>> <?php _e( 'Content under image.', "musicflow_theme" ); ?>
            </label><br>
            <label title="two">
              <input type="radio" name="term_list_version" value="two" <?php echo (( isset($term_list_version) && $term_list_version == 'two' )) ? 'checked="checked"' : ''; ?>> <?php _e( 'Paragraph on the right side.', "musicflow_theme" ); ?>
            </label><br>
            <br>
            <span class="description"><?php _e( 'Choose the list version layout to display.', "musicflow_theme" ); ?></span>
          </td>
        </tr>

      </table><!-- end form-table -->
    <?php }
    }

    function saveEventTermData( $term_id ) {

        // only saves if the current user can edit user profiles
        if ( !current_user_can( 'edit_user', $user_id ) )
            return false;
        update_option( "musicflow_events_places_img_$term_id",
          stripslashes(wp_filter_post_kses(addslashes($_POST['term_image']))));
        update_option( "musicflow-events-places_header_img_$term_id",
          stripslashes(wp_filter_post_kses(addslashes($_POST['term_bg_image']))));
        update_option( "musicflow_events_places_list_version_$term_id",
          stripslashes(wp_filter_post_kses(addslashes($_POST['term_list_version']))));
       update_option(  $taxonomy . "musicflow_events_places_header_version_" . $term_id ,
        stripslashes(wp_filter_post_kses(addslashes($_POST['term_header_version']))));
       update_option(  $taxonomy . "musicflow_events_places_text_header_" . $term_id ,
        stripslashes(wp_filter_post_kses(addslashes($_POST['term_text_header']))));

    }

     function addEventTermImage()
    {
      ?>
      <script>
      jQuery(document).ready(function($){
        // Uploading files
        var file_frame;

          $('.additional-user-image').on('click', function( event ){

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( file_frame ) {
              file_frame.open();
              return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
              title: $( this ).data( 'uploader_title' ),
              button: {
                text: $( this ).data( 'uploader_button_text' ),
              },
              multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {
              // We set multiple to false so only get one image from the uploader
              attachment = file_frame.state().get('selection').first().toJSON();
              $('input#term_image').val(attachment.url);
              $('img#user-meta-img-src').attr('src', attachment.url);
              // Do something with attachment.id and/or attachment.url here
            });

            // Finally, open the modal
            file_frame.open();
          });


      var file_frame_header;

          $('.additional-term-bg-image').on('click', function( event ){

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( file_frame_header ) {
              file_frame_header.open();
              return;
            }

            // Create the media frame.
            file_frame_header = wp.media.frames.file_frame_header = wp.media({
              title: $( this ).data( 'uploader_title' ),
              button: {
                text: $( this ).data( 'uploader_button_text' ),
              },
              multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame_header.on( 'select', function() {
              // We set multiple to false so only get one image from the uploader
              attachment = file_frame_header.state().get('selection').first().toJSON();
              $('input#term_bg_image').val(attachment.url);
              $('img#user-meta-bg-img-src').attr('src', attachment.url);
              // Do something with attachment.id and/or attachment.url here
            });

            // Finally, open the modal
            file_frame_header.open();
          });

        });
      </script>
<?php
    }


   function additional_user_fields( $user ) { ?>

        <table class="form-table">

          <tr>
            <th><label for="user_profession"><?php _e( 'User Profession', "musicflow_theme" ); ?></label></th>
            <td>
                <input type="text" name="user_profession" id="user_profession" value="<?php echo esc_attr( get_the_author_meta( 'user_profession', $user->ID ) ); ?>" class="regular-text" />
             </td>
          </tr>

          <tr>
            <th><label for="user_avatar"><?php _e( 'User Avatar', "musicflow_theme" ); ?></label></th>
            <td>
                <!-- Outputs the image after save -->
                <img id="user-meta-img-src"src="<?php echo esc_url( get_the_author_meta( 'user_avatar', $user->ID ) ); ?>" style="width:150px;"><br />
                <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
                <input type="text" name="user_avatar" id="user_avatar" value="<?php echo esc_url_raw( get_the_author_meta( 'user_avatar', $user->ID ) ); ?>" class="regular-text" />
                <!-- Outputs the save button -->
                <input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', "musicflow_theme" ); ?>" id="uploadimage"/><br />
                <span class="description"><?php _e( 'Upload an additional image for your user profile.', "musicflow_theme" ); ?></span>
            </td>
          </tr>

          <tr>
            <th><label for="user_bg_image"><?php _e( 'Header Background Image', "musicflow_theme" ); ?></label></th>
            <td>
                <!-- Outputs the image after save -->
                <img id="user-meta-bg-img-src"src="<?php echo esc_url( get_the_author_meta( 'user_bg_image', $user->ID ) ); ?>" style="width:150px;"><br />
                <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
                <input type="text" name="user_bg_image" id="user_bg_image" value="<?php echo esc_url_raw( get_the_author_meta( 'user_bg_image', $user->ID ) ); ?>" class="regular-text" />
                <!-- Outputs the save button -->
                <input type='button' class="additional-user-bg-image button-primary" value="<?php _e( 'Upload Image', "musicflow_theme" ); ?>" id="uploadimage"/><br />
                <span class="description"><?php _e( 'Upload an additional header background image for your user profile archive page.', "musicflow_theme" ); ?></span>
            </td>
          </tr>

        </table><!-- end form-table -->
    <?php } // additional_user_fields

    function save_additional_user_meta( $user_id ) {

        // only saves if the current user can edit user profiles
        if ( !current_user_can( 'edit_user', $user_id ) )
            return false;
        update_user_meta( $user_id, 'user_avatar', stripslashes(wp_filter_post_kses(addslashes($_POST['user_avatar'] ))));

        update_user_meta( $user_id, 'user_bg_image', stripslashes(wp_filter_post_kses(addslashes($_POST['user_bg_image'] ))));

        update_user_meta( $user_id, 'user_profession', stripslashes(wp_filter_post_kses(addslashes($_POST['user_profession'] ))));
    }

     function addUploader()
    {
      ?>
      <script>
      jQuery(document).ready(function($){
        // Uploading files
        var file_frame;

          $('.additional-user-image').on('click', function( event ){

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( file_frame ) {
              file_frame.open();
              return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
              title: $( this ).data( 'uploader_title' ),
              button: {
                text: $( this ).data( 'uploader_button_text' ),
              },
              multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {
              // We set multiple to false so only get one image from the uploader
              attachment = file_frame.state().get('selection').first().toJSON();
              $('input#user_avatar').val(attachment.url);
              $('img#user-meta-img-src').attr('src', attachment.url);
              // Do something with attachment.id and/or attachment.url here
            });

            // Finally, open the modal
            file_frame.open();
          });

        var file_frame_2;
        $('.additional-user-bg-image').on('click', function( event ){

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( file_frame_2 ) {
              file_frame_2.open();
              return;
            }

            // Create the media frame.
            file_frame_2 = wp.media.frames.file_frame_2 = wp.media({
              title: $( this ).data( 'uploader_title' ),
              button: {
                text: $( this ).data( 'uploader_button_text' ),
              },
              multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame_2.on( 'select', function() {
              // We set multiple to false so only get one image from the uploader
              attachment = file_frame_2.state().get('selection').first().toJSON();
              $('input#user_bg_image').val(attachment.url);
              $('img#user-meta-bg-img-src').attr('src', attachment.url);
              // Do something with attachment.id and/or attachment.url here
            });

            // Finally, open the modal
            file_frame_2.open();
          });

        });
      </script>
<?php
    }

}
?>