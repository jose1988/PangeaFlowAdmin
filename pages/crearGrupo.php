<?php
	require_once("../lib/nusoap.php");
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
	$client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
	
	$contarOrga = $client->contarOrganizacion();
	$canOrga = $contarOrga->return;
	$resultadoListaOrganizacion = $client->listarOrganizacion();
	
	//Fecha del sistema
	$fecha = date("Y-m-d");
	
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["documentacion"]) && $_POST["documentacion"]!="" && 
		isset($_POST["descripcion"]) && $_POST["descripcion"]!="" && isset($_POST["estado"]) && $_POST["estado"]!="" && 
		isset($_POST["organizacion"]) && $_POST["organizacion"]!="" && isset($_POST["tipo"]) && $_POST["tipo"]!="" ){
				
			 //Borrado 0 es FALSE y 1 TRUE
			 if(!isset($_POST["borrado"])){
			 	$borrado="0";
			 }else{
			 	$borrado="1";
			 }
			 
			 $organizacion= array('id' => $_POST["organizacion"],'borrado'=>'0');
			 $grupo= array('nombre' => $_POST["nombre"],
			  	'descripcion' => $_POST["descripcion"],
				'documentacion' => $_POST["documentacion"],
				'fechaCreacion' => $fecha,
				'tipo' => $_POST["tipo"],
				'estado' => $_POST["estado"],
				'borrado' => $borrado,
				'idOrganizacion'=>$organizacion);
				
			$registroGrupo= array('registroGrupo' => $grupo);
			$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';
  			$client = new SOAPClient($wsdl_url);
 			$client->decode_utf8 = false;
			$client->insertarGrupo($registroGrupo);
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  }
	
	include("../views/crearGrupo.php");
?>