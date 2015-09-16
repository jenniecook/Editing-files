<!-- Social  -->

<?php global $musicflow_admin; ?>
  <ul class="social">
  <?php $all_icons =  array('500px','behance','dribbble','facebook','flickr','foursquare','google+','grooveshark','lastfm','linkedin','picasa','pinterest','skype','soundcloud','spotify','tumblr','twitter','vimeo','xing','yelp','youtube'); ?>
  <?php foreach($all_icons as $icon): ?>
    <?php if ($musicflow_admin['general-settings-social-icons-'.$icon]): ?>
      <li class="skin-background-color1 skin-background-hover3" >
        <a href="<?php echo esc_url($musicflow_admin["general-settings-social-icons-{$icon}-url"]); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/icons/<?php echo esc_attr($icon); ?>.svg" alt="social">
        </a>
      </li>
    <?php endif; ?>
  <?php endforeach; ?>
</ul>

  <!-- /Social  -->