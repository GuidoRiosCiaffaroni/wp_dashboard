<?php
/**
* Plugin Name: WP DashBoard Resume
* Description: Ejemplo Basico 
* Version:     1.0
* Plugin URI: https://guidorios.cl/wp-basic-crud-plugin-wordpress/
* Author:      Guido Rios Ciaffaroni
* Author URI:  https://guidorios.cl/
* License:     GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wpbc
* Domain Path: /languages
*/

/******************************************************************************************/
// archivos     : index.php
// Funcion      :  
// Objetos      : 
// Descripcion  : Conjunto de variables para el uso del sistema
/******************************************************************************************/

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

/*Importa funciones de instalacion*/

require_once plugin_dir_path( __FILE__ ) . 'includes/install/install.php';      // Instalacion del Sistema Base de datos
require_once plugin_dir_path( __FILE__ ) . 'includes/layout/blade.php';         // Funciones para la generacion de Blade 


/*Funciones requeridas para administrar y gestionar */

require_once(ABSPATH . "wp-admin" . '/includes/image.php');                     // Funciones para gestionar Imagenes 
require_once(ABSPATH . "wp-admin" . '/includes/file.php');                      // Funciones para gestionar Archivos
require_once(ABSPATH . "wp-admin" . '/includes/media.php');                     // Funciones para gestionar Archivos multimadia
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');                        // Funciones requeridas para gestionar la base de datos


/*Variables globales*/
global $wpdb;                   // Datos del sistema
global $wpbc_db_version;        // Version del base de datos - utilizado para las actualizaciones
global $sist_name_file;         // Nombre de la tabla de General del sistema 
global $sist_name_departament;  // Nombre de la tabla de Depart 
global $tabla_crud;             // Nombre de la tabla de sistema
global $user_id;                // ID del usuario
global $status_user;            // Perfil del usuario 
global $user_dirname;
global $upload_dir;
global $dir_file;               // Nombre de archivo a subir
global $global_data;            // Almacenamiento de datos Globales
global $file_name;  
global $wp_session;             // Inicio sesion variables
global $global_data;

$wpbc_db_version = '1.1.0'; 

/*Nombre base de datos*/
$sist_name_file = 'flatline';



/* Instalacion de Base de datos */
pdb_install_flatline();
register_activation_hook(__FILE__, 'pdb_install_flatline');


/* Adquirir Datos */
flatline_insert();
register_activation_hook(__FILE__, 'pdb_install_flatline');




/******************************************************************************************/
// Archivo : index.php
// Funcion : Kfp_DahsBoard_resume() 'funcion para el ingreso de datos'
// Objetos : $wpdb->insert

/******************************************************************************************/

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('ShortCode_DahsBoard_Resume', 'DahsBoard_Resume');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */




?>