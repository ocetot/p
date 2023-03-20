<?php
function myplugin_enqueue_scripts() {
  // Registro del archivo CSS de Bootstrap
  wp_register_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', array(), '5.2.3', 'all' );

  // Registro del archivo JS de Bootstrap
  wp_register_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.2.3', true );

  // Registro del archivo CSS de tu plugin
  wp_register_style( 'myplugin-style', plugin_dir_url( __FILE__ ) . 'style.css', array(), '1.0', 'all' );

  // Registro del archivo JS de tu plugin
  wp_register_script( 'myplugin-script', plugin_dir_url( __FILE__ ) . 'app.js', array('jquery'), '1.0', true );

  // Encolación del archivo CSS de Bootstrap
  wp_enqueue_style( 'bootstrap-style' );

  // Encolación del archivo CSS de tu plugin
  wp_enqueue_style( 'myplugin-style' );

  // Encolación del archivo JS de jQuery
  wp_enqueue_script( 'jquery' );

  // Encolación del archivo JS de Bootstrap
  wp_enqueue_script( 'bootstrap-script' );

  // Encolación del archivo JS de tu plugin
  wp_enqueue_script( 'myplugin-script' );
}
add_action( 'wp_enqueue_scripts', 'myplugin_enqueue_scripts' );
