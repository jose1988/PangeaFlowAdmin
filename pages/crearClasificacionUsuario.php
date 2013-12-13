<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServicios/GestionDeClasificacion_usuario?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	//Fecha del sistema
	$fecha = date("Y-m-d");
if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!=""){		
			 if(!isset($_POST["borrado"])){
			 $borrado="1";
			 }else{
			 $borrado="0";
			 }
			 
			  $cUsuario= 
			  array('nombre' => $_POST["nombre"],
			  	'descripcion' => $_POST["descripcion"],
				'fechaCreacion' => $fecha,	
				'fechaModificacion' => $fecha,				
				'borrado' => $borrado);
				$registroClaUsuario= array('registroClaUsuario' => $cUsuario);	
			   
  			   
				$client->insertarClasificacionUsuario($registroClaUsuario);				
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  } 	
	
	include("../views/crearClasificacionUsuario.php");
?>
