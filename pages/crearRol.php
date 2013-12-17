<?php	  
include("../lib/funciones.php");

  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowClasifRol = $client->listarClasificacionRol($estadoBorrado);
  $cantClasifRol=count($rowClasifRol->return);
 
if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" && isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["clasificacion"]) && $_POST["clasificacion"]!="" ){		
			    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				$Nombre= array('nombreRol' => $_REQUEST['nombre']);
				$rowRol = $client->consultarRolXNombre($Nombre);
			if(!isset($rowRol->return)){
			 if(!isset($_POST["borrado"])){
			 $borrado="0";
			 }else{
			 $borrado="1";
			 }
			 if(!isset($_POST["documentacion"])){
			 $documentacion="";
			 }else{
			 $documentacion=$_POST["documentacion"];
			 }
			 $clasificacionRol= array('id' => $_POST["clasificacion"],'borrado'=>'0');
			  $Rol= 
			  array('nombre' => $_POST["nombre"],
			  	'descripcion' => $_POST["descripcion"],
				'documentacion' => $documentacion,				
				'estado' => $_POST["estado"],
				'borrado' => $borrado,
				'idClasificacionRol'=>$clasificacionRol);
				$registroRol= array('registroRol' => $Rol);	
			    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
  			   	$client = new SOAPClient($wsdl_url);
 			    $client->decode_utf8 = false; 
				$client->insertarRol($registroRol);
			}else{
			javaalert("El nombre ya existe, por favor verifique");
			}			
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  } 	
  include("../views/crearRol.php");
  
?>
