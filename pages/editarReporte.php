<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idR = array('idReporte' => $id);	
	$resultadoBuscarReporte = $client->buscarReporte($idR);
	
	if(isset($_POST["editar"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && 
			isset($_POST["descripcion"]) && $_POST["descripcion"]!="" &&
			isset($_POST["url"]) && $_POST["url"]!="" ){
				
			$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';
  			$client = new SOAPClient($wsdl_url);
 			$client->decode_utf8 = false;
			$rowReporte=$client->listarReporte();
			
			for($i=0; $i<count($rowReporte->return);$i++)
			{
				 if($rowReporte->return[$i]->nombre==$_POST["nombre"]){
				 	$existeNombre=true;
				 	break;
				 }
			}
			
			if($existeNombre!=true){
				
				//Borrado 0 es FALSE y 1 TRUE
			 	if(!isset($_POST["borrado"])){
			 		$borrado="0";
			 	}else{
			 		$borrado="1";
			 	}
			 
			 	$reporte= array('nombre' => $_POST["nombre"],
			  		'descripcion' => $_POST["descripcion"],
					'url' => $_POST["url"],
					'borrado' => $borrado);
				
				$registroReporte= array('registroReporte' => $reporte);
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';
				$client = new SOAPClient($wsdl_url);
    			$client->decode_utf8 = false;
				$client->insertarReporte($registroReporte);
			
				javaalert("Reporte creado");			
				if(isset($_POST["crear_uno"])){
					iraURL('../pages/reporte.php');
				}
				else{
					iraURL('../pages/crearReporte.php');
				}
			}
			else{
				javaalert("El nombre ya existe, por favor verifique");
			}
			
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	}
	include("../views/editarReporte.php");
?>