<?php
$response = array();

$idusuario = $_POST['id'];

include('conexion.php');
$resultado = getNotificaciones($idusuario);

if($resultado != "0")
{
	$response["message"] =  $resultado;
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