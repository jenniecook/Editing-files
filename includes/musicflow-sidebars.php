<?php
if(function_exists('register_sidebar')){
  register_sidebar(
    array(
      'name'          => __( 'Sidebar Main', "musicflow_theme" ),
      'id'            => 'sidebar-1',
      'description'   => __( 'Widgets in this area will be shown on all posts and default pages.', 'musicflow_theme' ),
      'before_widget' => '<div id="%1$s" class="sidebar-content %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="skin-font-color5">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Sidebar Second', "musicflow_theme" ),
      'id'            => 'sidebar-2',
      'description'   => __( 'Widgets in this area will be shown on all pages with template name: "Page with Sidebar 2.', 'musicflow_theme' ),
      'before_widget' => '<div id="%1$s" class="sidebar-content %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="skin-font-color5">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Sidebar Third', "musicflow_theme" ),
      'id'            => 'sidebar-3',
      'description'   => __( 'Widgets in this area will be shown on all pages with template name: "Page with Sidebar 3.', 'musicflow_theme' ),
      'before_widget' => '<div id="%1$s" class="sidebar-content %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="skin-font-color5">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Sidebar Fourth', "musicflow_theme" ),
      'id'            => 'sidebar-4',
      'description'   => __( 'Widgets in this area will be shown on all pages with template name: "Page with Sidebar 4.', 'musicflow_theme' ),
      'before_widget' => '<div id="%1$s" class="sidebar-content %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="skin-font-color5">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Sidebar Fifth', "musicflow_theme" ),
      'id'            => 'sidebar-5',
      'description'   => __( 'Widgets in this area will be shown on all pages with template name: "Page with Sidebar 5".', 'musicflow_theme' ),
      'before_widget' => '<div id="%1$s" class="sidebar-content %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="skin-font-color5">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Sidebar Sixth', "musicflow_theme" ),
      'id'            => 'sidebar-6',
      'description'   => __( 'Widgets in this area will be shown on all pages with template name: "Page with Sidebar 6.', 'musicflow_theme' ),
      'before_widget' => '<div id="%1$s" class="sidebar-content %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="skin-font-color5">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Sidebar Archives', "musicflow_theme" ),
      'id'            => 'sidebar-7',
      'description'   => __( 'Widgets in this area will be shown on all archives.', 'musicflow_theme' ),
      'before_widget' => '<div id="%1$s" class="sidebar-content %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="skin-font-color5">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Sidebar Shop', "musicflow_theme" ),
      'id'            => 'sidebar-8',
      'description'   => __( 'Widgets in this area will be shown on only woocommerce pages.', 'musicflow_theme' ),
      'before_widget' => '<div id="%1$s" class="sidebar-content %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="skin-font-color5">',
      'after_title'   => '</h2>',
    )
  );
}
?>