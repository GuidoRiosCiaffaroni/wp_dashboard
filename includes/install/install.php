<?php
function pdb_install_flatline()
{
    
/* Variables Globales Sistema */
global $wpdb;                   // Datos del sistema


global $tabla_crud;             // Nombre de la tabla de sistema
global $user_id;                // ID del usuario
global $status_user;            // Perfil del usuario 
global $dir_file;               // Nombre de archivo a subir
global $global_data;            // Almacenamiento de datos Globales
global $file_name;  
global $wp_session;             // Inicio sesion variables
global $global_data;

/* Variables Globales Base de Datos */
global $wpbc_db_version;        // Version del base de datos - utilizado para las actualizaciones
global $sist_name_flatline;     // Nombre de la tabla de General del sistema 

     
    $table_name_file = $wpdb->prefix . $sist_name_flatline; 
    $table_name_departament = $wpdb->prefix . $sist_name_departament;


    $sql_file = "CREATE TABLE " . $table_name_file . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        flatline VARCHAR (100) NOT NULL,
        create_at datetime NOT NULL DEFAULT NOW(),
        PRIMARY KEY (id)
    );";
 
    dbDelta($sql_file); 
  
}




?>