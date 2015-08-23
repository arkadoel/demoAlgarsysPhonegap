<!DOCTYPE html>


<html>
	<head>
		
		<script type="text/javascript">
			    
	    function llamada(opciones){
			
			window.localNotification.add("GAME_NOTIFICATION", opciones, function () {
	                            
	                            successCb();
	                        }, failureCb);
	        navigator.notification.vibrate(1000);
	    }
		
		function consultarNotificaciones(){

			formData = {
		    	id: idusuario
			}
			
			//alert(idusuario);
			
			$.ajax({
			    url: "http://192.168.0.30:80/pSiliconVall/www/php/vernotificaciones.php",
			    type: "POST",
			    data: formData,
			    dataType: "json",
			    success: function(data) { 
			        //alert('SiliconVall: ' + data['message']['mensaje']);
			        var opciones = {
                        "message" : data['message']['mensaje'],
                        "title"	: "SiliconVall",
                        "seconds" : 1,
                        "smallIcon"	: 'icon.png' ,
                        "badge" : 0,
                    };
                    
                    llamada(opciones);
			    },
		        error: function() {
		            alert("Falla conexion");
		        }
			    
			    
			    
			});
		}
	</script>
	</head>
	<body>
		<br/><br/>
		Zona de padres
		
		
		<script type="text/javascript">
			var idusuario = window.sessionStorage.getItem('usuario');
			
			//alert(idusuario);
			
			setTimeout(function(){ 
				consultarNotificaciones(); 
			}, 15000);
		</script>
	        <br/><br/><br/>
	</body>
	
</html>