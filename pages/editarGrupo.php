<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idG = array('idGrupo' => $id);	
	$resultadoBuscarGrupo = $client->buscarGrupo($idG);
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
	$client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
	
	$contarOrga = $client->contarOrganizacion();
	$canOrga = $contarOrga->return;
	$resultadoListaOrganizacion = $client->listarOrganizacion();
	
	//Fecha del sistema
	$fecha = $resultadoBuscarGrupo->return->fechaCreacion;
	
	if(isset($_POST["editar"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" &&
			isset($_POST["documentacion"]) && $_POST["documentacion"]!="" && $fecha!="" && isset($_POST["tipo"]) && $_POST["tipo"]!="" && 
			isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["organizacion"]) && $_POST["organizacion"]!=""){				
				
			$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';
  			$client = new SOAPClient($wsdl_url);
 			$client->decode_utf8 = false;
			$rowGrupo=$client->listarGrupos();
			
			for($i=0; $i<count($rowGrupo->return);$i++)
			{
				 if($rowGrupo->return[$i]->nombre==$_POST["nombre"]){
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
			 
				$organizacion= array('id' => $_POST["organizacion"],'borrado'=>'0');
			 	$grupo= array('nombre' => $_POST["nombre"],
			  		'descripcion' => $_POST["descripcion"],
					'documentacion' => $_POST["documentacion"],
					'fechaCreacion' => $fecha,
					'tipo' => $_POST["tipo"],
					'estado' => $_POST["estado"],
					'borrado' => $borrado,
					'idOrganizacion' => $organizacion);
				
				$registroGrupo= array('registroGrupo' => $grupo);
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';
  				$client = new SOAPClient($wsdl_url);
 				$client->decode_utf8 = false;
				$client->insertarGrupo($registroGrupo);
			
				javaalert("Grupo creado");
				if(isset($_POST["editar"])){
					iraURL('../pages/grupo.php');
				}
				else{
					iraURL('../pages/crearGrupo.php');
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
	include("../views/editarGrupo.php");
?>