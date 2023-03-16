<?php
/*
 * Plugin Name: Directorio de tiendas
 */

 require "install.php";
 require "uninstall.php";
 require "enqueue.php";
 require "public/controllers/StoreController.php";
 require "public/models/store.php";


 register_activation_hook(__FILE__,'create_table_store');
 register_deactivation_hook(__FILE__,'drop_table_store');


/* function createStore()
{
    // Verificar si el nonce es válido
    $nonce = isset( $_REQUEST['_wpnonce'] ) ? $_REQUEST['_wpnonce'] : '';
    if ( ! wp_verify_nonce( $nonce, 'create-store' ) ) {
        wp_send_json_error( 'Invalid nonce.' );
    }

    // Validar los datos recibidos
    $store_name = isset( $_REQUEST['store_name'] ) ? sanitize_text_field( $_REQUEST['store_name'] ) : '';
    $store_address = isset( $_REQUEST['store_address'] ) ? sanitize_text_field( $_REQUEST['store_address'] ) : '';
    $store_lantitud = isset( $_REQUEST['store_lantitud'] ) ? sanitize_text_field( $_REQUEST['store_lantitud'] ) : '';
    $store_longitud = isset( $_REQUEST['store_longitud'] ) ? sanitize_text_field( $_REQUEST['store_longitud'] ) : '';

    // Insertar los datos en la base de datos
    global $wpdb;
    $table_name = $wpdb->prefix . 'store';

    $result = $wpdb->insert(
        $table_name,
        array(
            'name' => $store_name,
            'address' => $store_address,
            'lantitud' => $store_lantitud,
            'longitud' => $store_longitud,
        )
    );

    // Enviar una respuesta JSON con el resultado
    if ( $result ) {
        wp_send_json_success( 'Store created successfully.' );
    } else {
        wp_send_json_error( 'Error creating store.' );
    }
} */

 


 function funcion_mishorcode(){
    require plugin_dir_path(__FILE__)."./public/assets/views/store/crud.php";
    return $view_crut_store;
 
}


add_shortcode('mi_shortcode','funcion_mishorcode');