<?php
    /**
     * AGREGA NUESTRIO css
     */


     if (!function_exists('crud_stores_enqueue_css')) {
        function crud_stores_enqueue_css() {
            wp_register_style(
                'crud-store',
                plugins_url('public/assets/css/style.css', __FILE__ ),
                null,
                '1.0',
                'all'
            );
            wp_enqueue_style('crud-store');
    
            wp_register_style(
                'bootstrap',
                'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css',
                array('crud-store'),
                '5.2.3',
                'all'
            );
            wp_enqueue_style('bootstrap');
        }
    }
    add_action('wp_enqueue_scripts', 'crud_stores_enqueue_css');
    

    /**
     * AGREGA NUESTRIO JS
     */

     if(!function_exists('crud_stores_enqueue_scriptss')){
        function crud_stores_enqueue_scriptss(){
            wp_register_script(
                'crud-stores-javascript',
                plugins_url('public/assets/js/main.js', __FILE__ ),
                array('jquery'),
                null,
                '1.0',
                true
            );
            wp_enqueue_script('crud-stores-javascript');
            
            wp_localize_script( 'crud-stores-javascript', 'ajax_var', array(
                'url' => admin_url( 'admin-ajax.php' ),
               
            )); 
        }
    }
    add_action( 'wp_enqueue_scripts', 'crud_stores_enqueue_scriptss');
    
?>