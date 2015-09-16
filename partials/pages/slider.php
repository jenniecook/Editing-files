<?php
$sliders = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-slider', true );

if ($sliders): ?>

  <div class="slider-wrapp">
    <div class="slider">

      <?php foreach ($sliders as $slider) : ?>

        <?php if ($slider['image']): ?>
          <div data-src="<?php echo esc_attr( $slider['image'] ); ?>">
          <?php else: ?>
          <div>
        <?php endif ?>
          <div class="top-wrapper-mask">
            <div class="center-wrapper fadeFromBottom">
              <?php if ($slider['button-text']): ?>
                <?php
                  $button_url = isset($slider['button-url']) ? $slider['button-url'] : '';
                  $button_bg_color = isset($slider['button-bg-color']) ? $slider['button-bg-color'] : '';
                ?>
                <a href="<?php echo esc_url( $button_url); ?>" style="background-color: <?php echo esc_html($button_bg_color); ?>" class="button-small skin-font-color3 skin-background-hover3"><?php echo esc_html( $slider['button-text'] ); ?></a>
              <?php endif ?>
              <?php
                $title_url = isset($slider['title-url']) ? $slider['title-url'] : '';
                $title = isset( $slider['title'] ) ? $slider['title'] : '';
                $title_bold = isset( $slider['title-bold'] ) ? $slider['title-bold'] : '';
                $description = isset( $slider['description'] ) ? $slider['description'] : '';
              ?>
              <h1><a href="<?php echo esc_url( $title_url ); ?>" class="skin-font-color3 skin-color-hover1"><?php echo esc_html( $title ); ?> <span class="bold"><?php echo esc_html( $title_bold ); ?></span></a></h1>
              <p class="skin-font-color3 font-size-16px"><?php echo esc_html( $description ); ?></p>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

    </div>
  </div>

<?php endif ?>
<?php wp_reset_postdata(); ?>