<?php while ( have_posts() ) : the_post(); ?>
<div class="news news-wide">
    <?php if ($mf_thumb = MusicFlowHelpers::get_thumbnail($post->ID, 'mf-categories-featured')) :
      echo wp_kses_post($mf_thumb);
    ?>
    <div class="img-hover font">
      <a href="<?php the_permalink(); ?>">
        <span class="skin-font-color3 font-size-120px icon">]</span>
      </a>
    </div>
  <?php endif; ?>
  <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
  <span class="skin-font-color6 bold"><?php echo get_the_date(); ?> </span>
  <span class="skin-font-color6 bold">/ </span>
  <span class="skin-font-color6 bold"><?php comments_number(); ?> </span>
  <?php echo MusicFlowHelpers::get_post_tags($post->ID); ?>
  <p><?php echo MusicFlowHelpers::cutText(get_the_excerpt()); ?></p>
</div>
<?php endwhile; ?>