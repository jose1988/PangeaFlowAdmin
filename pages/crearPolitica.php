<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  	include("../lib/funciones.php");
  	require_once('../lib/nusoap.php');
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?wsdl';
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" &&
			isset($_POST["implementacion"]) && $_POST["implementacion"]!="" && isset($_POST["estado"]) && $_POST["estado"]!=""){
				
			try{	
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				$nombre= array('nombrePolitica' => $_REQUEST['nombre']);
				$rowPolitica = $client->consultarPoliticaXNombre($nombre);
			
			} catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../pages/index.php');
			}
			
			if(!isset($rowPolitica->return)){
						
				if(!isset($_POST["borrado"])){
			 		$borrado="1";
			 	}else{
			 		$borrado="0";
			 	}
			 	
				if(!isset($_POST["documentacion"])){
			 		$documentacion="";
			 	}else{
			 		$documentacion=$_POST["documentacion"];
				}
				
			 	$politica= array('nombre' => $_POST["nombre"],
			  		'descripcion' => $_POST["descripcion"],
					'documentacion' => $_POST["documentacion"],	
					'implementacion' => $_POST["implementacion"],				
					'estado' => $_POST["estado"],
					'borrado' => $borrado);
				
				try{
					$registroPolitica= array('registroPolitica' => $politica); 
					$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?WSDL';
					$client = new SOAPClient($wsdl_url);
					$client->decode_utf8 = false; 			   
					$client->insertarPolitica($registroPolitica);
				
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
				}
				
				javaalert("Politica creada");
				if(isset($_POST["crear_uno"])){
					iraURL('../pages/politica.php');
				}
				else{
					iraURL('../pages/crearPolitica.php');
				}
			}
			else{
				javaalert("El nombre ya existe, por favor verifique");
			}
		}
		else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  }
	  
	include("../views/crearPolitica.php");
		
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
}
?>