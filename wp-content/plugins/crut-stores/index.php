<?php
/*
 * Plugin Name: Directorio de tiendas
 */

 require "install.php";
 require "uninstall.php";
 require "enqueue.php";


 register_activation_hook(__FILE__,'create_table_store');
 register_deactivation_hook(__FILE__,'drop_table_store');

function createStore()
{
   $msg = array(
    "mensaje" => "he llegado aqui"

   );

   wp_send_json($msg);
}
 
add_action('wp_ajax_create-store','createStore');

 function funcion_mishorcode(){
    require plugin_dir_path(__FILE__)."./public/assets/views/store/crud.php";
    return $view_crut_store;
 
}


add_shortcode('mi_shortcode','funcion_mishorcode');