<?php
/**
 * Plugin Name: Directorio de Tiendas usando la clase WPDB
 */

 require plugin_dir_path(__FILE__) . "install.php" ;
 require plugin_dir_path(__FILE__) . "uninstall.php";
 require plugin_dir_path(__FILE__) . "enqueue.php";
 require plugin_dir_path(__FILE__) . "public/Controllers/StoreController.php";
 require plugin_dir_path(__FILE__) . "public/Models/Store.php";


register_activation_hook(__FILE__,'created_table_store');
register_deactivation_hook(__FILE__,'drop_table_store');

function function_shortcode(){
 
    require plugin_dir_path(__FILE__) ."/public/assets/views/store/crud.php";
    return $view_crud_store;
  
}
add_shortcode('mi_shortcode','function_shortcode');
