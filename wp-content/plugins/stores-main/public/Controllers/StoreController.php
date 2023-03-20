<?php
function createStore()
{
    if( wp_verify_nonce($_REQUEST['_wpnonce'],'create-store') == 1 ||  wp_verify_nonce($_REQUEST['_wpnonce'],'create-store') == 2 ){
      $store_info = array(
      "name"       =>   $_REQUEST['store_name'],
      "address"    =>   $_REQUEST['store_address'],
      "latitud"    =>   $_REQUEST['store_latitud'],
      "longitud"   =>   $_REQUEST['store_longitud'],
      "created_at" =>   current_time('Y-m-d H:i:s')
    ); 
    $obj_store = new Store;
    $response = $obj_store->save( $store_info );
 

    wp_send_json($response );
  
   }
}
add_action('wp_ajax_create-store', 'createStore');
//add_action('wp_ajax_nopriv_create-store', 'createStore');


function show_store(){
  $obj_store = new Store;
  $response = $obj_store->show( $_REQUEST['store_id'] );
  wp_send_json($response);
}
add_action('wp_ajax_show-store','show_store');

function update_store()
{

  if( wp_verify_nonce($_REQUEST['_wpnonce'],'update-store') == 1 || 
      wp_verify_nonce($_REQUEST['_wpnonce'],'update-store') == 2 &&
      $_REQUEST['store_id']
      ){


        

        $store_info = array(
          "name"       =>   $_REQUEST['store_name'],
          "address"    =>   $_REQUEST['store_address'],
          "latitud"    =>   $_REQUEST['store_latitud'],
          "longitud"   =>   $_REQUEST['store_longitud'],
          "updated_at" =>   current_time('Y-m-d H:i:s')
        ); 
         
        $obj_store = new Store;

        $response =  $obj_store->update( $store_info ,  $_REQUEST['store_id']);

        wp_send_json($response);
    }


}
add_action('wp_ajax_update-store','update_store');

function destroy_store(){

  if( wp_verify_nonce($_REQUEST['_wpnonce'],'destroy-store') == 1 || 
      wp_verify_nonce($_REQUEST['_wpnonce'],'destroy-store') == 2 )
      {
        $id =$_REQUEST['store_id'];
        $obj_store = new Store;
        $response = $obj_store->destroy($id);
        wp_send_json($response);

      }
 
  
}

add_action('wp_ajax_destroy-store','destroy_store');