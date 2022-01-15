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

/*Funciones requeridas para administrar y gestionar */

require_once(ABSPATH . "wp-admin" . '/includes/image.php'   );  // Funciones requeridas para gestionar Imagenes
require_once(ABSPATH . "wp-admin" . '/includes/file.php'    );  // Funciones requeridas para gestionar archivos
require_once(ABSPATH . "wp-admin" . '/includes/media.php'   );  // Funciones requeridas para gestionar otros archivos
require_once(ABSPATH . 'wp-admin/includes/upgrade.php'      );  // Funciones requeridas para gestionar la base de datos


    /*Variables globales*/
    global $wpdb;						// datos del sistema
    global $wpbc_db_version_flatline;	// Version del base de datos - utilizado para las actualizaciones
    global $table_name_flatline;		// Nombre de la base de datos
    global $data_sql_objet_flatline;	// Objeto de Base de Datos
    global $sql_query_flatline;			// Almacena la consulta  
 

/*Importa funciones de instalacion*/
$wpbc_db_version_flatline = '1.1.0'; 

/*Nombre base de datos*/
$table_name_flatline = 'flatline';

/******************************************************************************************/
// Archivo : index.php
// Funcion : Kfp_DahsBoard_resume() 'funcion para el ingreso de datos'
// Objetos : $wpdb->insert

/******************************************************************************************/

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_DahsBoard_Resume', 'Kfp_DahsBoard_resume');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */
function Kfp_DahsBoard_resume() 
{

$FirstTimeRegister = '1642091599';
$LastTimeRegister = time();
$DiftTimeRegister =  $LastTimeRegister - $FirstTimeRegister;

$date = new DateTime();
$date->format('Y-m-d H:i:s');

$FirstDateServer = '2022-01-13 16:45:38';
$LastDateServer = $date->format('Y-m-d H:i:s');
$DiftDateServer = $LastDateServer - $FirstDateServer; 


echo '
                        <div class="content">
                            <div class="btn-controls">

                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4">
                                    	<i class=" icon-time"></i>
                                    	<b>'.$LastTimeRegister.'</b>
                                    	<p class="text-muted">Utimo Registro General</p>
                                    </a>
                     
                                    <a href="#" class="btn-box big span4">
                                    	<i class=" icon-time"></i>
                                    	<b>'.$FirstTimeRegister.'</b>
                                    	<p class="text-muted">Primer Registro General</p>
                                    </a>

                                    <a href="#" class="btn-box big span4">
                                    	<i class="icon-minus"></i>
                                    	<b>'.$DiftTimeRegister.'</b>
                                        <p class="text-muted">Diferencia General</p>
                                    </a>
                                </div>


                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4">
                                    	<i class=" icon-time"></i>
                                    	<b>'.$LastDateServer.'</b>
                                    	<p class="text-muted">Ultimo Registro Servidor</p>
                                    </a>

                                    <a href="#" class="btn-box big span4">
                                    	<i class=" icon-time"></i>
                                    	<b>'.$FirstDateServer.'</b>
                                    	<p class="text-muted">Primer Registro Servidor</p>
                                    </a>

                                    <a href="#" class="btn-box big span4">
                                    	<i class="icon-minus"></i>
                                    	<b>'.$DiftDateServer.'</b>
                                        <p class="text-muted">Diferencia General Servidor</p>
                                    </a>
                                </div>

                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4">
                                    	<i class=" icon-time"></i>
                                    	<b>'.$LastDateServer.'</b>
                                    	<p class="text-muted">Ultimo Registro Local</p>
                                    </a>

                                    <a href="#" class="btn-box big span4">
                                    	<i class=" icon-time"></i>
                                    	<b>'.$FirstDateServer.'</b>
                                    	<p class="text-muted">Primer Registro Local</p>
                                    </a>

                                    <a href="#" class="btn-box big span4">
                                    	<i class="icon-minus"></i>
                                    	<b>'.$DiftDateServer.'</b>
                                        <p class="text-muted">Diferencia General Local</p>
                                    </a>
                                </div>

                            </div>
                        </div>

';


} 




/**** Inicio procedimiento para ingreso de datos ****/
function Kfp_Insert_Flatline() 
{

    /*Variables globales*/
    global $wpdb;                       // datos del sistema
    global $wpbc_db_version_flatline;   // Version del base de datos - utilizado para las actualizaciones
    global $table_name_flatline;        // Nombre de la base de datos
    global $data_sql_flatline;          // Objeto de Base de Datos
    global $sql_query;                  // Almacena la consulta  


    /*Importa funciones de instalacion*/
    $wpbc_db_version_flatline = '1.1.0'; 

    /*Nombre base de datos*/
    $table_name_flatline = 'flatline';

    $data_sql_flatline = $wpdb->prefix . $table_name_flatline;                        // objeto base de datos

    /*Incio almacena informacion de formulario BLADE*/
    $ServerDateFlatline         = sanitize_text_field($_GET['ServerDateFlatline']);            // Fecha del Servidor

    
    /*Fin almacena informacion de formulario BLADE*/

    $global_data = array(
                'ServerDateFlatline'          => $ServerDateFlatline,
            );

    $wpdb->insert($data_sql_flatline,$global_data);



}

add_shortcode('ShortCode_Insert_Flatline', 'Kfp_Insert_Flatline');  // Crea shortcode en la pagina de inicio 



/******************************************************************************************/
// archivos     : index.php
// Funcion      : flatliners_create() 
// Objetos      : $wpdb->insert
// Descripcion  : 'Funcion para la creacion de la base de datos'
/******************************************************************************************/

/**** Inicio procedimiento para crear la base de datos ****/
function flatliners_create()
{

    /*Variables globales*/
    global $wpdb;                       // datos del sistema
    global $wpbc_db_version_flatline;   // Version del base de datos - utilizado para las actualizaciones
    global $table_name_flatline;        // Nombre de la base de datos
    global $data_sql_objet_flatline;    // Objeto de Base de Datos
    global $sql_query_flatline;         // Almacena la consulta      

    $data_sql_objet_flatline = $wpdb->prefix . $table_name_flatline;

    $sql_query_flatline = "CREATE TABLE " . $data_sql_objet_flatline . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        ServerDateFlatline datetime NOT NULL,
        create_at datetime NOT NULL DEFAULT NOW(),
        PRIMARY KEY (id)
    );"; 

    dbDelta($sql_query_flatline); 
}

flatliners_create();

/**** Fin procedimiento para crear la base de datos ****/
























?>