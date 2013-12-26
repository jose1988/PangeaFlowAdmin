<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';
	$client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
	
	//Fecha del sistema
	$fecha = date("Y-m-d");
	
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!=""){				
			
			try{
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';
  				$client = new SOAPClient($wsdl_url);
 				$client->decode_utf8 = false;
				$nombre= array('nombreSkin' => $_REQUEST['nombre']);
				$rowSkin = $client->consultarSkinXNombre($nombre);
			
			} catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../pages/index.php');
			}
			
			if(!isset($rowSkin->return)){
					
				//Borrado 0 es FALSE y 1 TRUE
			 	if(!isset($_POST["borrado"])){
			 		$borrado="0";
			 	}else{
			 		$borrado="1";
			 	}
			 
			 	$skin= array('nombre' => $_POST["nombre"],
					'borrado' => $borrado);
				
				try{
					$registroSkin= array('registroSkin' => $skin);
					$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';
  					$client = new SOAPClient($wsdl_url);
 					$client->decode_utf8 = false;
					$client->insertarSkin($registroSkin);
				
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
				}
			
				javaalert("Skin creado");
				if(isset($_POST["crear_uno"])){
					iraURL('../pages/skin.php');
				}
				else{
					iraURL('../pages/crearSkin.php');
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
	include("../views/crearSkin.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
}
?>