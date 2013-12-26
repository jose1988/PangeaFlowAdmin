<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';
	$client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
	
	//Fecha del sistema
	$fecha = date("Y-m-d");
	
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!=""){				
				
			$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';
  			$client = new SOAPClient($wsdl_url);
 			$client->decode_utf8 = false;
			$nombre= array('nombreSkin' => $_REQUEST['nombre']);
			$rowSkin = $client->consultarSkinXNombre($nombre);
			
			if(!isset($rowSkin->return)){
					
				//Borrado 0 es FALSE y 1 TRUE
			 	if(!isset($_POST["borrado"])){
			 		$borrado="0";
			 	}else{
			 		$borrado="1";
			 	}
			 
			 	$skin= array('nombre' => $_POST["nombre"],
					'borrado' => $borrado);
				
				$registroSkin= array('registroSkin' => $skin);
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';
  				$client = new SOAPClient($wsdl_url);
 				$client->decode_utf8 = false;
				$client->insertarSkin($registroSkin);
			
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
?>