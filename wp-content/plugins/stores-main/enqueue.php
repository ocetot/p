<?php

     /**
      * AGREGA NUESTRO CSS
      */

   if(!function_exists('crud_stores_enqueue_css')){
    
            function crud_stores_enqueue_css()
            {
                wp_register_style('crud-stores',
                plugins_url( 'public/assets/css/style.css', __FILE__ ),
                null,
                '1.0',
                'all');
                wp_register_style('bootstrap',
                "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css",
                 array('crud-stores'),
                '5.2.2',
                'all');
                wp_enqueue_style('crud-stores');
                wp_enqueue_style('bootstrap');

            }
   }       

    add_action('wp_enqueue_scripts','crud_stores_enqueue_css');

   /*
   *AGREGA NUESTRO JS
   */
  if(!function_exists('crud_stores_enqueue_scripts')){
        function crud_stores_enqueue_scripts(){


            wp_register_script(
                'bootstrap-js',
                "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js",
                array('jquery'),
                '5.2.2',
                true);   
            wp_enqueue_script('bootstrap-js');



            wp_register_script(
            'crud-stores-javascript',
            plugins_url( 'public/assets/js/main.js', __FILE__ ),
            array('jquery'),
            '1.0',
            true);   
            wp_enqueue_script('crud-stores-javascript');
            
            wp_localize_script( 'crud-stores-javascript', 'ajax_var', array(
                'url'    => admin_url( 'admin-ajax.php' ),
            ) );
          
        }
  }
  add_action('wp_enqueue_scripts','crud_stores_enqueue_scripts');

 