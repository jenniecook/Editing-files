<?php
    // Do not delete these lines
    if( !empty( $_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'] ) )
            die ( __( 'Please do not load this page directly. Thanks!', "musicflow_theme"  ) );

    if( post_password_required() ) { ?>
        <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', "musicflow_theme"  ); ?></p>
    <?php
        return true;
    }
?>


<div class="clearfix"></div>

<?php if ( comments_open() ) : ?>

  <?php if ( is_user_logged_in() ) {

      $comments_args = array(
        'id_form'              => 'musicflow-prefix-' . 'contact-form',
        'id_submit'            => 'submit',
        'label_submit'         => __('Send comment', "musicflow_theme" ),
        'title_reply'          => '',
        'title_reply_to'       => '',
        'cancel_reply_link'    => __( 'Cancel reply', "musicflow_theme"  ),
        'comment_field'        => '<div class="one-one"><textarea class="skin-border-color4 skin-font-color13" name="comment" id="contact_text" onblur=\'if(this.value == "") { this.value="Message"}\' onfocus="if (this.value == \'Message\') {this.value=\'\'}">Message</textarea></div>',
        'comment_notes_before' => '',
          'comment_notes_after'  => '',
      );

   } else {

      $commenter = wp_get_current_commenter();
      $req = get_option( 'require_name_email' );
      $aria_req = ( $req ? " aria-required='true'" : '' );

       $comments_args = array(
            'id_form'              => 'musicflow-prefix-' . 'contact-form',
            'id_submit'            => 'submit-hide',
            'label_submit'         => __('Send comment', "musicflow_theme" ),
            'title_reply'          => '',
            'title_reply_to'       => '',
            'cancel_reply_link'    => __( 'Cancel reply', "musicflow_theme"  ),
            'comment_field'        => '<div class="two-third last"><textarea class="skin-border-color4 skin-font-color13" name="comment" id="contact_text" onblur=\'if(this.value == "") { this.value="Message"}\' onfocus="if (this.value == \'Message\') {this.value=\'\'}">Message</textarea></div>',
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'fields'               => apply_filters(
                'comment_form_default_fields',
                array(
                  'author' => '<div class="one-third">
                                <input class="skin-border-color4 skin-font-color13" type="text" name="author" id="contact_name" value="Name" onblur="if(this.value == \'\') { this.value=\'Name\'}" onfocus="if (this.value == \'Name\') {this.value=\'\'}"' . $aria_req . '>',
                  'email'  => '<input class="skin-border-color4 skin-font-color13" type="text" name="email" id="contact_email" value="Email" onblur="if(this.value == \'\') { this.value=\'Email\'}" onfocus="if (this.value == \'Email\') {this.value=\'\'}"' . $aria_req . '>
                              <input name="submit" type="submit" id="submit" class="submit button-normal skin-background-color1 skin-font-color3 skin-background-hover3" value="Send comment"></div>',
                )
          ),
      );
    }
  ?>

<!-- /comment form -->

  <div class="main-content">

    <h2 class="skin-font-color5"><?php _e( 'Comments', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'area', "musicflow_theme" ); ?></span></h2>

    <?php comment_form( $comments_args ); ?>

  </div>

  <!-- /comment form-->

  <div class="clearfix"></div>

<?php endif; ?>

<!-- comments -->

<div class="main-content">

  <?php if ( comments_open() ) : ?>

    <?php //comment_form(); ?>

    <?php if ( ! have_comments() ) : ?>

      <h2 class="skin-font-color5"><?php _e('No', "musicflow_theme" ); ?> <span class="bold"><?php _e('comments', "musicflow_theme" ); ?></span></h3>

    <?php else: ?>

      <h2 class="skin-font-color5"><?php _e('Current', "musicflow_theme" ); ?> <span class="bold"><?php _e('disqusion', "musicflow_theme" ); ?></span></h3>

        <ul class="comments-ul">

          <?php wp_list_comments( 'type=comment&callback=MusicFlowAdditions::showComments' ); ?>

        </ul>

        <div class="clearfix"></div>

        <!-- /pagination -->


        <div class="main-content">
        <?php
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                MusicFlowAdditions::paginateComments();
            endif;
        ?>
        </div>

    <?php endif; ?>

  <?php else : // comments are closed ?>

    <?php if (!is_singular( array('musicflow-albums', 'musicflow-videos', 'musicflow-galleries', 'musicflow-events') )): ?>

      <?php if (!is_page()): ?>

        <h2 class="skin-font-color5"><?php _e('Comments', "musicflow_theme" ); ?> <span class="bold"><?php _e('closed', "musicflow_theme" ); ?></span></h3>

      <?php endif; ?>

    <?php endif ?>

  <?php endif; ?>

</div>