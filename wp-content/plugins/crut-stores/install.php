<?php
/*
 * Plugin Name: Directorio de tiendas
 */

register_activation_hook(__FILE__, 'create_table_store');

function create_table_store(){
  global $wpdb;
  $table_name = $wpdb->prefix . "store";
  $sql = "CREATE TABLE $table_name (
    id                          INT(11) NOT NULL AUTO_INCREMENT,
    name                        VARCHAR(255) NOT NULL,
    address                     TEXT NOT NULL,
    lantitud                    DOUBLE NOT NULL,
    longitud                    DOUBLE NOT NULL,
    PRIMARY KEY  (id)
  );";
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
}
?>
