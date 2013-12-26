<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
    iraURL('../pages/rol.php');
   }
   $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowClasifRol = $client->listarClasificacionRol($estadoBorrado);
  $cantClasifRol=count($rowClasifRol->return);
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idRol= array('idRol' =>$_GET['id'] );
  $rowRol = $client->consultarRol($idRol);
  
if(isset($_POST["modificar"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" && isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["clasificacion"]) && $_POST["clasificacion"]!="" ){		
			if($_POST["nombre"]!=$rowRol->return->nombre){
			  try {
				$Nombre= array('nombreRol' => $_POST['nombre']);
				$rowRolXNombre = $client->consultarRolXNombre($Nombre);
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión ');
					iraURL('../views/index.php');
				}
			}		
			if(!isset($rowRolXNombre->return)){
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
			  array(
			    'id'=>$_GET['id'],
			    'nombre' => $_POST["nombre"],
			  	'descripcion' => $_POST["descripcion"],
				'documentacion' => $documentacion,				
				'estado' => $_POST["estado"],
				'borrado' => $borrado,
				'idClasificacionRol'=>$clasificacionRol);
				  try {
				$registroRol= array('registroRol' => $Rol);	
				$client->editarRol($registroRol);
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
					}
				 iraURL('../pages/rol.php');				
			}else{
			javaalert("El nombre ya existe, por favor verifique");
			}		
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
	  } 	
  include("../views/editarRol.php");
  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
?>
