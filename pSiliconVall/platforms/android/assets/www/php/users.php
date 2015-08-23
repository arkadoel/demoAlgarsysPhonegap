<?php
$response = array();

$email = $_POST['usermail'];
$mipass = $_POST['mypass'];
$response["success"] = 1;

include('conexion.php');
$resultado = hacerLogin($email, $mipass);

if($resultado == TRUE)
{
	if(isset($_SESSION)) {
		$response["message"] =  $_SESSION['userid'];

	}
	else{
		$response["message"] =  "Sesion no iniciada";

	}
	$response["success"] = 1;
}
else 
{
	$response["success"] = 0;
	$response["message"] =  "fallo";
}


//$response["message"] = $_POST['usermail'];
// echoing JSON response
echo json_encode($response);

?>