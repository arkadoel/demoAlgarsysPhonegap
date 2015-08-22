<!DOCTYPE html>


<html>
	<body>
		<?php
			$email = $_POST['usermail'];
			$mipass = $_POST['mypass'];
			include('../php/conexion.php');
			
			$resultado = hacerLogin($email, $mipass);
			
			if($resultado == TRUE)
			{
				echo 'iniciada sesion';
			}
			else 
			{
				echo 'fallo';
			}
			
		?>
		<br/><br/><br/>
	</body>
	
</html>