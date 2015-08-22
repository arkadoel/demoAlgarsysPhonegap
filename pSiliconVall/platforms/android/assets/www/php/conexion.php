<?php 

// datos para la coneccion a mysql 
define('DB_SERVER','localhost'); 
define('DB_NAME','dbacademia'); 
define('DB_USER','root'); 
define('DB_PASS',''); 

/**
 * Conectar con la base de datos
 */
function conectar()
{
	$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS); 
	mysql_select_db(DB_NAME,$con); 
	return $con;
}

/**
 * Cerrar la conexion con la DB
 */
function cerrarConexion($con=NULL)
{
	if($con != NULL)
	{
		mysql_close($con);
		cerrarSesion();
	}
}

function iniciarSesion()
{
	cerrarSesion();
	session_start();
}

function cerrarSesion()
{
	if(isset($_SESSION)) {
		session_destroy();
	}
}

/**
 * Funcion para comprobar si se puede iniciar sesion
 * return: TRUE || FALSE dependiendo de si puede o no
 */
function hacerLogin($email='', $mypass='')
{
	$con = conectar();		
	$sql = "SELECT * FROM `usuarios` WHERE `email` LIKE '%$email%' and password LIKE '%$mypass%'"; 
    $rec = mysql_query($sql); 
    $count = 0; 
  
    while($row = mysql_fetch_object($rec)) 
    { 
        $count++; 
        $result = $row; 
    } 
  
    if($count == 1) 
    {
    	iniciarSesion();
		$_SESSION['userid'] = $result->idusuario; 
        return TRUE; 
    } 
  
    else 
    {
    	cerrarConexion($con); 
        return FALSE; 
    } 
}

function getNotificaciones($idusuario=0)
{
	if($idusuario != 0){
		$con = conectar();		
		$sql = "SELECT * FROM `notificaciones` WHERE idusuario = $idusuario;"; 
	    $rec = mysql_query($sql); 
	    $count = 0; 
	  
	    while($row = mysql_fetch_object($rec)) 
	    { 
	        $count++; 
	        $result = $row; 
	    } 
		
		if($count >0){
			return $result;
		}
		else return "0";
  
	}
}

?> 