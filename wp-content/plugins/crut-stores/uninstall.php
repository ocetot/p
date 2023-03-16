<?php

function drop_table_store(){

    global $wpdb;

    $table_name = $wpdb -> prefix."store";

    $sql = "DROP TABLE $table_name";
    
    $wpdb->query($sql);



 }
