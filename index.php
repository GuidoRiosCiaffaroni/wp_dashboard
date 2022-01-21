<?php
/**
* Plugin Name: WP DashBoard 
* Description: Ejemplo Basico 
* Version:     1.0.0
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


/******************************************************************************************/


/******************************************************************************************/
// archivos     : index.php
// Funcion      :  
// Objetos      : 
// Direccion  	: /
// Descripcion  : Variables globales para el uso del sistema
/******************************************************************************************/

/* Variables Globales Sistema */
global $wpdb;                   // Datos del sistema
global $user_id;                // ID del usuario
global $status_user;            // Perfil del usuario 
global $wp_session;             // Inicio sesion variables
global $global_data;

/* Variables Globales para manejo de archivos */
global $dir_file;               // Nombre de archivo a subir
global $global_data;            // Almacenamiento de datos Globales

/* Variables Globales Base de Datos */
global $tabla_crud;             // Nombre de la tabla de sistema
global $wpbc_db_version;        // Version del base de datos - utilizado para las actualizaciones
global $sist_name_flatline;     // Nombre de la tabla de General del sistema 

/******************************************************************************************/


/* Inicio de Variables Globales*/
$wpbc_db_version = '1.1.0'; 
$sist_name_flatline = 'flatline';




/******************************************************************************************/
// archivos     : index.php
// Funcion      :  
// Objetos      : 
// Direccion  	: /
// Descripcion  : Registro de hooks
/******************************************************************************************/
register_activation_hook(__FILE__, 'pdb_install_flatline');			// Instalacion de Base de datos 
register_activation_hook(__FILE__, 'insert_flatline');				// Adquirir Datos








?>