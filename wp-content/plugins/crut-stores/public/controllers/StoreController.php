<?php
function createStore()
{

    if(wp_verify_nonce($_REQUEST['_wpnonce'],'create-store') == 1 || wp_verify_nonce($_REQUEST['_wpnonce'],'create-store') == 2 ){
        
    }
   
    $store_info = array(
    "name" => $_REQUEST['store_name'],
    "address" => $_REQUEST['store_address'],
    "lantitud" => $_REQUEST['store_lantitud'],
    "longitud" => $_REQUEST['store_longitud'],
   // "created_at" => current_time('y-m-d h:i:s'),


   );

  $obj_store = new Store;
  $response = $obj_store->save($store_info);


   wp_send_json($response); 
}
add_action('wp_ajax_create-store','createStore');
?>