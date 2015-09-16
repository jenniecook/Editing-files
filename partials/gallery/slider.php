<?php
$slider_array = get_post_meta( $post->ID, 'musicflow-prefix-gallery-slider' ); ?>
<?php if (isset($slider_array[0]) && $slider_array[0]): ?>
  <div class="photo-slider">
    <?php foreach ($slider_array as $sliders): ?>
      <?php foreach ($sliders as $slider): ?>
        <div data-src="<?php echo esc_url( $slider['image'] ); ?>">
          <div class="top-wrapper-mask">
            <div class="center-wrapper fadeFromBottom">
              <h3 class="bold">
                <a href="<?php echo esc_url( $slider['image'] ); ?>" class="skin-font-color3 skin-color-hover1" data-rel="prettyPhoto[photo-slider]"><?php echo esc_html( $slider['title'] ); ?></a>
              </h3>
              <p class="skin-font-color3"><?php echo esc_html( $slider['description'] ); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php endforeach ?>
  </div>
<?php endif ?>