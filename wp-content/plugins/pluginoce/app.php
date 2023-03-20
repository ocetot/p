<?php
/*
Plugin Name: plugin de ocetot
Plugin URI: http://mi-sitio-web.com/mi-plugin
Description: Este es un plugin personalizado para WordPress
Version: 1.0
Author: Mi Nombre
Author URI: http://mi-sitio-web.com
License: GPL2
*/
require_once( plugin_dir_path( __FILE__ ) . 'enqueue.php' );
function agregar_estilos_y_scripts() {
    // Agrega el archivo de estilo CSS
    wp_enqueue_style( 'nombre-del-estilo', plugins_url( 'assets/style.css', __FILE__ ) );
  
    // Agrega el archivo de script JavaScript
    wp_enqueue_script( 'nombre-del-script', plugins_url( 'assets/app.js', __FILE__ ), array(), '1.0.0', true );
  }
  
  add_action( 'wp_enqueue_scripts', 'agregar_estilos_y_scripts' );
  

function crear_tabla_mi_plugin() {
    global $wpdb;
    $tabla = $wpdb->prefix . 'mi_plugin_tabla';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $tabla (
      id INT(11) NOT NULL AUTO_INCREMENT,
      nombre VARCHAR(50) NOT NULL,
      email VARCHAR(50) NOT NULL,
      mensaje TEXT NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
add_action( 'admin_init', 'crear_tabla_mi_plugin' );
function mi_plugin_personalizado_campo_nombre() {
    $nombre = esc_attr( get_option( 'mi_plugin_personalizado_nombre' ) );
    echo '<input type="text" name="mi_plugin_personalizado_nombre" value="' . $nombre . '" />';
}

function mi_plugin_personalizado_formulario() {
    ?>
<div class="container">
    <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="form-group">
        <input type="hidden" name="action" value="mi_plugin_personalizado_guardar_datos">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" />
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" />
        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" class="form-control"></textarea>
        <?php wp_nonce_field( 'mi_plugin_personalizado_guardar_datos', 'mi_plugin_personalizado_nonce' ); ?>
        <?php require_once ABSPATH . 'wp-admin/includes/template.php'; ?>
        <button type="submit" class="btn btn-primary"><?php esc_attr_e('Enviar', 'mi-plugin-personalizado'); ?></button>
    </form>
</div>

    <?php
}

add_shortcode( 'mi_plugin_personalizado_formulario', 'mi_plugin_personalizado_formulario' );

function mi_plugin_personalizado_guardar_datos() {
    if ( ! isset( $_POST['mi_plugin_personalizado_nonce'] ) || ! wp_verify_nonce( $_POST['mi_plugin_personalizado_nonce'], 'mi_plugin_personalizado_guardar_datos' ) ) {
        wp_die( 'Acceso no autorizado', 'Error' );
    }

    global $wpdb;
    $tabla = $wpdb->prefix . 'mi_plugin_tabla';

    $nombre = isset( $_POST['nombre'] ) ? sanitize_text_field( $_POST['nombre'] ) : '';
    $email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $mensaje = isset( $_POST['mensaje'] ) ? sanitize_textarea_field( $_POST['mensaje'] ) : '';

    if ( empty( $nombre ) || empty( $email ) || empty( $mensaje ) ) {
        wp_die( 'Debe completar todos los campos', 'Error' );
    }

    $wpdb->insert( $tabla, array(
        'nombre' => $nombre,
        'email' => $email,
        'mensaje' => $mensaje,
    ) );

    wp_redirect( add_query_arg( 'mensaje', 'ok', wp_get_referer() ) );
    exit;
}

add_action( 'admin_post_mi_plugin_personalizado_guardar_datos', 'mi_plugin_personalizado_guardar_datos' );


function mi_plugin_personalizado_mostrar_datos() {
    global $wpdb;
    $tabla = $wpdb->prefix . 'mi_plugin_tabla';
    $registros = $wpdb->get_results( "SELECT * FROM $tabla" );
    ?>
<div class="wrap">
      
      <?php if ( isset( $_GET['mensaje'] ) && $_GET['mensaje'] == 'ok' ) : ?>
          <div class="updated"></div>
      <?php endif; ?>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Mensaje</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ( $registros as $registro ) : ?>
                  <tr>
                      <td><?php echo $registro->id; ?></td>
                      <td><?php echo $registro->nombre; ?></td>
                      <td><?php echo $registro->email; ?></td>
                      <td><?php echo $registro->mensaje; ?></td>
                      <td>
                          <form method="post">
                              <input type="hidden" name="registro_id" value="<?php echo $registro->id; ?>">
                              <button type="submit" name="eliminar_registro" class="btn btn-danger">Eliminar</button>
                          </form>
                      </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  </div>
  
    <?php
}

function mi_plugin_personalizado_mostrar_shortcode() {
    ob_start();
    mi_plugin_personalizado_mostrar_datos();
    if ( isset( $_POST['eliminar_registro'] ) ) {
        global $wpdb;
        $tabla = $wpdb->prefix . 'mi_plugin_tabla';
        $registro_id = $_POST['registro_id'];
        $wpdb->delete( $tabla, array( 'id' => $registro_id ) );
        wp_redirect( esc_url( add_query_arg( 'mensaje', 'registro_eliminado' ) ) );
        exit;
    }
    return ob_get_clean();
}

add_shortcode( 'mi_plugin_personalizado_mostrar', 'mi_plugin_personalizado_mostrar_shortcode' );


