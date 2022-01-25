<?php
/******************************************************************************************/
// archivos     : blade.php
// Funcion      :  
// Objetos      : 
// Direccion    : /layout/blade.php
// Descripcion  : Insertar Informacion por Get 
/******************************************************************************************/

function insert_flatline()
{
    

/******************************************************************************************/
// archivos     : blade.php
// Funcion      : insert_flatline()
// Objetos      : 
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


/* Variables Globales Base de Datos */
global $tabla_crud;             // Nombre de la tabla de sistema
global $wpbc_db_version;        // Version del base de datos - utilizado para las actualizaciones
global $sist_name_flatline;     // Nombre de la tabla de General del sistema 
global $global_data;            // Almacenamiento de datos Globales

/******************************************************************************************/




$table_name_flatline = $wpdb->prefix . $sist_name_flatline;  // objeto base de datos
$flatline 		= sanitize_text_field($_GET['flatline']);   // Datos obtenidos desde frontend_update.php id


//echo " --> ". $flatline . "</br>" ;

// INSERT INTO `wp_flatline` (`id`, `flatline`, `create_at`) VALUES (NULL, '1', current_timestamp());

    $global_data = array(
                'flatline'           => $flatline,

            );

    $wpdb->insert($table_name_flatline,$global_data);



}

add_shortcode('ShortCode_insert_flatline', 'insert_flatline'); // crear ShortCode_insert_flatline 

/******************************************************************************************/

/******************************************************************************************/
// archivos     : blade.php
// Funcion      :  
// Objetos      : 
// Direccion    : /layout/blade.php
// Descripcion  : Muestra Informacion almacenadas 
/******************************************************************************************/

function DahsBoard_Resume() 
{


/******************************************************************************************/
// archivos     : blade.php
// Funcion      : DahsBoard_Resume() 
// Objetos      : 
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


/******************************************************************************************/
// archivos     : blade.php
// Funcion      : UnixTimeRegister() 
// Objetos      : 
// Descripcion  : Determina los tiempos en formato Unix
/******************************************************************************************/

function UnixTimeRegister() 
{


/******************************************************************************************/
// archivos     : blade.php
// Funcion      : UnixTimeRegister() 
// Objetos      : 
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





/******************************************************************************************/
// archivos     : blade.php
// Funcion      : UnixTimeRegister() 
// Objetos      : 
// Descripcion  : Querys para determinar los tiempos
/******************************************************************************************/

/******************************************************************************************/
// Conculta para determinar el ultimo de los registros 
/******************************************************************************************/

$tabla_crud = $wpdb->prefix . $sist_name_flatline; // objeto base de datos
$query = 'SELECT * FROM '.$tabla_crud.' ORDER by ID ASC' ; // Query determina el ultimo registro ingresado 
$registros = $wpdb->get_results($query);
    
foreach ($registros as $registros) 
{
    $LastTimeUnixRegister = $registros->flatline;
    $LastTimeMysqlRegister = $registros->create_at; 
}  

/******************************************************************************************/

    
/******************************************************************************************/  
// Consulta para determinar el primero de los registros 
/******************************************************************************************/

$tabla_crud = $wpdb->prefix . $sist_name_flatline; // objeto base de datos
$query = 'SELECT * FROM '.$tabla_crud.' ORDER by ID DESC' ; // Query determina el primer registro ingresado
$registros = $wpdb->get_results($query);
    
foreach ($registros as $registros) 
{
    $FirstTimeUnixRegister = $registros->flatline;
    $FirstTimeMysqlRegister  = $registros->create_at;  
}  

/******************************************************************************************/

/******************************************************************************************/
// Conculta para determinar el registro anterior al ultimo flatline
/******************************************************************************************/

$tabla_crud = $wpdb->prefix . $sist_name_flatline; // objeto base de datos
$query = 'SELECT * FROM '.$tabla_crud.' WHERE id = (SELECT MAX(id - 1) FROM '.$tabla_crud.')' ; 
$registros = $wpdb->get_results($query);
    
foreach ($registros as $registros) 
{
    $PreviousTimeUnixRegister = $registros->flatline; 
}  

/******************************************************************************************/


/******************************************************************************************/
// Conculta para determinar el registro anterior al ultimo create_at
/******************************************************************************************/

$tabla_crud = $wpdb->prefix . $sist_name_flatline; // objeto base de datos
$query = 'SELECT * FROM '.$tabla_crud.' WHERE id = (SELECT MAX(id - 1) FROM '.$tabla_crud.')' ; 
$registros = $wpdb->get_results($query);
    
foreach ($registros as $registros) 
{
    $PreviousTimeMysqlRegister = $registros->create_at; 
}  

/******************************************************************************************/



/******************************************************************************************/
// Consulta para determinar el registro anterior al ultimo create_at
/******************************************************************************************/

// 'SELECT * FROM '.$tabla_crud.' WHERE id = (SELECT MAX(id) FROM '.$tabla_crud.' WHERE id < 2)' ;

$tabla_crud = $wpdb->prefix . $sist_name_flatline; // objeto base de datos
$query = 'SELECT * FROM '.$tabla_crud.' WHERE id = (SELECT MAX(id - 1) FROM '.$tabla_crud.')' ; 
$registros = $wpdb->get_results($query);
    
foreach ($registros as $registros) 
{
    $PreviousTimeMysqlRegister = $registros->create_at; 
}  

/******************************************************************************************/

/******************************************************************************************/
// Diferencia entre el ultimo tiempo y el primero
/******************************************************************************************/

$DifTimeUnixRegister = $LastTimeUnixRegister - $FirstTimeUnixRegister;
$DifTimeMysqlRegister = strtotime($LastTimeMysqlRegister) - strtotime($FirstTimeMysqlRegister);


/******************************************************************************************/

/******************************************************************************************/
// Diferencia entre el ultimo tiempo y el anterior flatline
/******************************************************************************************/

$BetweenTimeUnixRegister = $LastTimeUnixRegister - $PreviousTimeUnixRegister;
$BetweenTimeMysqlRegister = strtotime($LastTimeMysqlRegister) - strtotime($PreviousTimeMysqlRegister);

/******************************************************************************************/


function secondsToTime($seconds) { $dtF = new DateTime("@0"); $dtT = new DateTime("@$seconds"); return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds'); }




    echo '-> FirstTimeUnixRegister          : '.$FirstTimeUnixRegister. '</br>' ;
    echo '-> PreviousTimeUnixRegister       : '.$PreviousTimeUnixRegister. '</br>' ;
    echo '-> LastTimeUnixRegister           : '.$LastTimeUnixRegister. '</br>' ;
    echo '-> DifTimeUnixRegister            : '.$DifTimeUnixRegister. '</br>' ;
    echo '-> BetweenTimeUnixRegister        : '.$BetweenTimeUnixRegister. '</br>' ;
    echo '------------------------------------------------------------------------ </br>';
    
    echo '-> FirstTimeMysqlRegister          : '.$FirstTimeMysqlRegister. '</br>' ;
    echo '-> PreviousTimeMysqlRegister       : '.$PreviousTimeMysqlRegister. '</br>' ;
    echo '-> LastTimeMysqlRegister             :' . $LastTimeMysqlRegister.'</br>' ;
     echo '-> DifTimeMysqlRegister             :' .secondsToTime($DifTimeMysqlRegister) .'</br>' ;   
    //echo '-> DifTimeMysqlRegister             :' . $DifTimeMysqlRegister.'</br>' ;
    //echo '-> BetweenTimeMysqlRegister            :' . $BetweenTimeMysqlRegister.'</br>' ;
    echo '-> BetweenTimeMysqlRegister            :' . secondsToTime($BetweenTimeMysqlRegister).'</br>' ;




//echo date("Y-m-d H:i:s", substr("1477020641000", 0, 10));
    // echo '-> Fecha unix a gmdate            :' . gmdate("Y-m-d\TH:i:s\Z", $PreviousTimeUnixRegister) .'</br>' ;
    
    echo '------------------------------------------------------------------------ </br>';
    

    echo '-> FirstTimeMysqlRegister          : '. strtotime($FirstTimeMysqlRegister) . '</br>' ;
    echo '-> PreviousTimeMysqlRegister       : '. strtotime($PreviousTimeMysqlRegister) . '</br>' ;
    echo '-> LastTimeMysqlRegister             :' . strtotime($LastTimeMysqlRegister) .'</br>' ;
    echo '-> DifTimeMysqlRegister             :' . strtotime($DifTimeMysqlRegister) .'</br>' ;
    echo '-> BetweenTimeMysqlRegister            :' . strtotime($BetweenTimeMysqlRegister) .'</br>' ;



}

UnixTimeRegister(); 

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
                                    	<b>'.$resultado.'</b>
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

add_shortcode('ShortCode_DahsBoard_Resume', 'DahsBoard_Resume'); // crear ShortCode_insert_flatline 

/******************************************************************************************/




?>