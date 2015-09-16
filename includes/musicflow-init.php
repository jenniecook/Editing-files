<?php
if ( file_exists( MUSICFLOW_DIR . 'extend/composer/extend-composer.php' ) ) {
  if ( defined( 'WPB_VC_VERSION' ) ) {
    load_template( MUSICFLOW_DIR . 'extend/composer/extend-composer.php' );
 }
}
if ( !class_exists( 'Redux_Framework_sample_config' ) && file_exists( get_template_directory() . '/admin/admin-init.php' ) ) {
  load_template( MUSICFLOW_DIR . 'admin/admin-init.php' );
}
if ( file_exists( MUSICFLOW_DIR . 'includes/meta/functions.php' ) ) {
  load_template( MUSICFLOW_DIR . 'includes/meta/functions.php' );
}
if ( !class_exists( 'MusicFlowScripts' ) && file_exists( MUSICFLOW_DIR . 'includes/musicflow-scripts.php' ) ) {
  load_template( MUSICFLOW_DIR . 'includes/musicflow-scripts.php' );
  $MusicFlowScripts = new MusicFlowScripts();
}
if ( !class_exists( 'MusicFlowCustomNav' ) && file_exists( MUSICFLOW_DIR . 'includes/musicflow-custom-nav.php' ) ) {
  load_template( MUSICFLOW_DIR . 'includes/musicflow-custom-nav.php' );
}
if ( !class_exists( 'MusicFlowHelpers' ) && file_exists( MUSICFLOW_DIR . 'includes/musicflow-helpers.php' ) ) {
  load_template( MUSICFLOW_DIR . 'includes/musicflow-helpers.php' );
  MusicFlowHelpers::Instance();
}
if ( !class_exists( 'MusicFlowCustomData' ) && file_exists( MUSICFLOW_DIR . 'includes/musicflow-custom-data.php' ) ) {
  load_template( MUSICFLOW_DIR . 'includes/musicflow-custom-data.php' );
  MusicFlowCustomData::Instance();
}
if ( !class_exists( 'MusicFlowAdditions' ) && file_exists( MUSICFLOW_DIR . 'includes/musicflow-additions.php' ) ) {
  load_template( MUSICFLOW_DIR . 'includes/musicflow-additions.php' );
  MusicFlowAdditions::Instance();
}
if ( file_exists( MUSICFLOW_DIR . 'includes/musicflow-widgets.php' ) ) {
  load_template( MUSICFLOW_DIR . 'includes/musicflow-widgets.php' );
}
if ( file_exists( MUSICFLOW_DIR . 'includes/musicflow-sidebars.php' ) ) {
  load_template( MUSICFLOW_DIR . 'includes/musicflow-sidebars.php' );
}
?>