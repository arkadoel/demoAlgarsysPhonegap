<?php
$response = array();
$response["success"] = 0;

$idusuario = $_POST['id'];

$response["success"] = 1;

include('conexion.php');
$resultado = getNotificaciones($idusuario);

if($resultado != "0")
{
	$response["message"] =  $resultado;
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