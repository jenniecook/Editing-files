<h2 class="bold skin-font-color5 news-open-h2"><?php the_title(); ?></h2>
<span class="skin-font-color6 bold"><?php echo get_the_date(); ?> </span>
<span class="skin-font-color6 bold">/ </span>
<span class="skin-font-color6 bold"><?php comments_number(); ?> </span>
<?php echo MusicFlowHelpers::get_post_tags($post->ID, 'small'); ?>