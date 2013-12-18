<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?wsdl';
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["documentacion"]) && $_POST["documentacion"]!="" && 
			isset($_POST["descripcion"]) && $_POST["descripcion"]!="" && isset($_POST["estado"]) && $_POST["estado"]!=""){
						
			 if(!isset($_POST["borrado"])){
			 	$borrado="1";
			 }else{
			 	$borrado="0";
			 }
			 
			 $politica= array('nombre' => $_POST["nombre"],
			  	'descripcion' => $_POST["descripcion"],
				'documentacion' => $_POST["documentacion"],	
				'implementacion' => $_POST["implementacion"],				
				'estado' => $_POST["estado"],
				'borrado' => $borrado);
				
				$registroPolitica= array('registroPolitica' => $politica);  			   
				$client->insertarPolitica($registroPolitica);				
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  }
	  
	include("../views/crearPolitica.php");	
?>