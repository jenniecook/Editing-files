<?php

// Load the TGM init if it exists
if (file_exists( get_template_directory().'/admin/tgm/tgm-init.php')) {
  load_template( get_template_directory().'/admin/tgm/tgm-init.php' );
}
// Load the embedded Redux Framework
if (file_exists(get_template_directory().'/admin/redux-framework/framework.php')) {
  load_template( get_template_directory().'/admin/redux-framework/framework.php' );
}
// Load the theme/plugin options
if (file_exists( get_template_directory().'/admin/options-init.php')) {
  load_template( get_template_directory().'/admin/options-init.php' );
}
