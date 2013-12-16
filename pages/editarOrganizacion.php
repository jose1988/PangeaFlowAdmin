<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idO = array('idOrganizacion' => $id);	
	$resultadoBuscarOrganizacion = $client->buscarOrganizacion($idO);
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
	$client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
	
	$contarOrga = $client->contarOrganizacion();
	$canOrga = $contarOrga->return;
	$resultadoListaOrganizacion = $client->listarOrganizacion();
	
	if(isset($_POST["editar"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" &&
			isset($_POST["tipo"]) && $_POST["tipo"]!="" && isset($_POST["direccion"]) && $_POST["direccion"]!="" && 
			isset($_POST["telefono"]) && $_POST["telefono"]!="" && isset($_POST["fax"]) && $_POST["fax"]!="" && 
			isset($_POST["correo"]) && $_POST["correo"]!="" && isset($_POST["ciudad"]) && $_POST["ciudad"]!="" && 
			isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["organizacion"]) && $_POST["organizacion"]!=""){
			
			$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
  			$client = new SOAPClient($wsdl_url);
 			$client->decode_utf8 = false;
			$rowOrganizacion=$client->listarOrganizacion();
			
			for($i=0; $i<count($rowOrganizacion->return);$i++)
			{
				 if($rowOrganizacion->return[$i]->nombre==$_POST["nombre"]){
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
			 
			 	$organizacionPadre= array('id' => $_POST["organizacion"],'borrado'=>'0');
			 	$organizacion= array('nombre' => $_POST["nombre"],
			  		'descripcion' => $_POST["descripcion"],
					'tipo' => $_POST["tipo"],
					'direccion' => $_POST["direccion"],
					'telefono' => $_POST["telefono"],
					'fax' => $_POST["fax"],
					'mail' => $_POST["correo"],
					'ciudad' => $_POST["ciudad"],
					'estado' => $_POST["estado"],
					'borrado' => $borrado,
					'idOrganizacionPadre' => $organizacionPadre);
				
				$registroOrganizacion= array('registroOrganizacion' => $organizacion);
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
				$client = new SOAPClient($wsdl_url);
    			$client->decode_utf8 = false;
				$client->insertarOrganizacion($registroOrganizacion);
			
				javaalert("Organización creada");			
				if(isset($_POST["crear_uno"])){
					iraURL('../pages/organizacion.php');
				}
				else{
					iraURL('../pages/crearOrganizacion.php');
				}
			}
			else{
				javaalert("El nombre ya existe, por favor verifique");
			}
			
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	}
	include("../views/editarOrganizacion.php");
?>