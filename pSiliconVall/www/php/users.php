<?php
$response = array();

$email = $_POST['usermail'];
$mipass = $_POST['mypass'];

include('conexion.php');
$resultado = hacerLogin($email, $mipass);

if($resultado == TRUE)
{
	$response["message"] =  "iniciada sesion";
}
else 
{
	$response["message"] =  "fallo";
}

$response["success"] = 1;
//$response["message"] = $_POST['usermail'];
// echoing JSON response
echo json_encode($response);

?>