<?php global $musicflow_admin; ?>
<style type="text/css">
<?php if( isset($musicflow_admin['typography-settings-body']) && ($musicflow_admin['typography-settings-body']['font-family'] !== Null) && $musicflow_admin['typography-settings-body']['font-family'] != ''){ ?>
body{ font-size:<?php echo esc_html($musicflow_admin['typography-settings-body']['font-size']); ?>;font-family: "<?php echo esc_html($musicflow_admin['typography-settings-body']['font-family']); ?>";font-weight: <?php echo esc_html($musicflow_admin['typography-settings-body']['font-style']); ?>;color:<?php echo esc_html($musicflow_admin['typography-settings-body']['color']); ?>;line-height:<?php echo esc_html($musicflow_admin['typography-settings-body']['line-height']); ?>;height:100% !important;}
<?php } else { ?>
body{ font:12px "OpenSansRegular", Arial, Helvetica,sans-serif;color:#3d3d3d;line-height:24px;height:100% !important;}
<?php  } ?>
<?php
  for ($i=1; $i <= 25; $i++) {
    if (isset($musicflow_admin['color-schemes-settings-skin-font-color'.$i]['color'])) { ?>
.skin-font-color<?php echo intval($i); ?> { color: <?php echo esc_html($musicflow_admin['color-schemes-settings-skin-font-color'.$i]['color']); ?> !important;}
<?php
    }
  }
?>
<?php
  for ($i=1; $i <= 25; $i++) {
    if (isset($musicflow_admin['color-schemes-settings-skin-background-color'.$i]['color'])) { ?>
.skin-background-color<?php echo intval($i); ?> { background-color: <?php echo esc_html($musicflow_admin['color-schemes-settings-skin-background-color'.$i]['color']); ?> !important;}
<?php
    }
  }
?>
<?php
  for ($i=1; $i <= 5; $i++) {
    if (isset($musicflow_admin['color-schemes-settings-skin-border-color'.$i]['color'])) { ?>
.skin-border-color<?php echo intval($i); ?> { border-color: <?php echo esc_html($musicflow_admin['color-schemes-settings-skin-border-color'.$i]['color']); ?>;}
<?php
    }
  }
?>
<?php
  for ($i=1; $i <= 4; $i++) {
    if (isset($musicflow_admin['color-schemes-settings-skin-color-hover'.$i]['color'])) { ?>
.skin-color-hover<?php echo intval($i); ?>:hover { color: <?php echo esc_html($musicflow_admin['color-schemes-settings-skin-color-hover'.$i]['color']); ?> !important;}
<?php
    }
  }
?>
<?php
  for ($i=1; $i <= 3; $i++) {
    if (isset($musicflow_admin['color-schemes-settings-skin-background-hover'.$i]['color'])) { ?>
.skin-background-hover<?php echo intval($i); ?>:hover { background-color: <?php echo esc_html($musicflow_admin['color-schemes-settings-skin-background-hover'.$i]['color']); ?> !important;}
<?php
    }
  }
?>
<?php
  if (isset($musicflow_admin['color-schemes-settings-skin-border-hover1']['color'])) { ?>
.skin-border-hover1:hover { border-color: <?php echo esc_html($musicflow_admin['color-schemes-settings-skin-border-hover1']['color']); ?>;}
<?php
  }
?>
<?php if (isset($musicflow_admin['color-schemes-settings-other-menu-current']['color'])) { ?>
.menu-current { color: <?php echo esc_html($musicflow_admin['color-schemes-settings-other-menu-current']['color']); ?>;}
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-other-img-hover']['rgba'])) { ?>
.top-wrapper-mask, .img-hover, .img-hover-photo, .img-hover-album, .img-hover-resident, .img-hover-sidebar, .img-hover-media-player, .img-hover-media-top, .album-mask, .resident-mask, .img-hover-shop { background-color: <?php echo esc_html($musicflow_admin['color-schemes-settings-other-img-hover']['rgba']); ?>; }
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-other-slider-skin-background-color1']['color'])) { ?>
.slider .skin-background-color1 { background-color:<?php echo esc_html($musicflow_admin['color-schemes-settings-other-slider-skin-background-color1']['color']); ?> !important; } /* main color */
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-other-slider-skin-background-color9']['color'])) { ?>
.slider .skin-background-color9 { background-color:<?php echo esc_html($musicflow_admin['color-schemes-settings-other-slider-skin-background-color9']['color']); ?> !important; }
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-other-slider-skin-background-color14']['color'])) { ?>
.slider .skin-background-color14 { background-color:<?php echo esc_html($musicflow_admin['color-schemes-settings-other-slider-skin-background-color14']['color']);  ?> !important; }
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-other-slider-skin-background-hover3']['color'])) { ?>
.slider  .skin-background-hover3:hover { background-color:<?php echo esc_html($musicflow_admin['color-schemes-settings-other-slider-skin-background-hover3']['color']) ?> !important; }
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-player-schemes-fap-wrapper-switcher-font']['color'])) { ?>
#fap-wrapper-switcher { color:<?php echo esc_html($musicflow_admin['color-schemes-settings-player-schemes-fap-wrapper-switcher-font']['color']); ?> !important; } /* main color */
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-player-schemes-fap-wrapper-switcher-background']['color'])) { ?>
#fap-wrapper-switcher { background-color:<?php echo esc_html($musicflow_admin['color-schemes-settings-player-schemes-fap-wrapper-switcher-background']['color']); ?> !important; } /* main color */
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-player-schemes-fap-wrapper-background']['rgba'])) { ?>
#fap-wrapper { background-color: <?php echo esc_html($musicflow_admin['color-schemes-settings-player-schemes-fap-wrapper-background']['rgba']); ?> !important; }
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-player-schemes-fap-play-pause']['color'])) { ?>
#fap-ui-nav #fap-play-pause, #fap-ui-nav #fap-previous, #fap-ui-nav #fap-next, #fap-ui-wrapper > a  { background-color:<?php echo esc_html($musicflow_admin['color-schemes-settings-player-schemes-fap-play-pause']['color']); ?> !important; } /* main color */
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-player-schemes-fap-play-pause-hover']['color'])) { ?>
#fap-ui-nav #fap-play-pause:hover, #fap-ui-nav #fap-previous:hover, #fap-ui-nav #fap-next:hover, #fap-ui-wrapper > a:hover { background-color:<?php echo esc_html($musicflow_admin['color-schemes-settings-player-schemes-fap-play-pause-hover']['color']); ?> !important; }
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-player-schemes-fap-volume-bar']['color'])) { ?>
#fap-time-bar, #fap-volume-bar { background: <?php echo esc_html($musicflow_admin['color-schemes-settings-player-schemes-fap-volume-bar']['color'])?> !important; }
<?php } ?>
<?php if (isset($musicflow_admin['color-schemes-settings-player-schemes-fap-loading-bar']['color'])) { ?>
#fap-loading-bar { background: <?php echo esc_html($musicflow_admin['color-schemes-settings-player-schemes-fap-loading-bar']['color']) ?> !important; }
<?php } ?>

.woocommerce p.stars a, .woocommerce a.added_to_cart { color:#000; font-weight:700; }
.wpcf7  input[type=text], .wpcf7  input[type=email], .wpcf7 textarea, .lost_reset_password input[type=text], .woocommerce input[type=text], .woocommerce input[type=password], .woocommerce input[type=email], .woocommerce .woocommerce-ordering select, .woocommerce .quantity .qty, .woocommerce #review_form #respond textarea, .woocommerce-cart .cart-collaterals .cart_totals table select { border-color:#d6d6d6; }
.wpcf7 input[type=submit]:hover { -webkit-transition: background-color 300ms linear; -moz-transition: background-color 300ms linear; -o-transition: background-color 300ms linear; -ms-transition: background-color 300ms linear; transition: background-color 300ms linear; }
.woocommerce a.button, .woocommerce div.product form.cart .button {
	-webkit-transition: background-color 300ms linear;
	-moz-transition: background-color 300ms linear;
	-o-transition: background-color 300ms linear;
	-ms-transition: background-color 300ms linear;
	transition: background-color 300ms linear;
}
}
</style>