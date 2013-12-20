<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
    iraURL('../pages/clasificacionRol.php');
   }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idClasiRol= array('idClasifRol' => $_GET['id']);
  $rowClasificacionRol = $client->consultarClasifRol($idClasiRol);
		if(!isset($rowClasificacionRol->return)){
				javaalert('No existe el registro de clasificación de rol');
	            iraURL('../pages/clasificacionRol.php');	
		}
 
if(isset($_POST["modificar"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" ){		
			  try {
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				}catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
					}	
			  if($_POST["nombre"]!=$rowClasificacionRol->return->nombre){
			  try {
				$Nombre= array('Nombre' => $_POST['nombre']);
				$rowClasifRol = $client->consultarClasifRolXNombre($Nombre);
				}catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
					}	
			  }  
				
			if(!isset($rowClasifRol->return)){
			 if(!isset($_POST["borrado"])){
			 $borrado="0";
			 }else{
			 $borrado="1";
			 }
			 if(!isset($_POST["descripcion"])){
			 $descripcion="";
			 }else{
			 $descripcion=$_POST["descripcion"];
			 }
			  $registroClasifRol= 
			  array(
			  'id'=>$rowClasificacionRol->return->id,
			  'nombre' => $_POST["nombre"],
			  	'descripcion' => $descripcion,
				'fechaCreacion'=>date("Y-m-d"),
				'fechaModificacion'=>date("Y-m-d"),
				'borrado' => $borrado);
			
				  try {
				$registroClaRol= array('registroClaRol' => $registroClasifRol);	
				$client->editarClasificacionRol($registroClaRol);
					} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
					}			
			iraURL('../pages/clasificacionRol.php');		
			}else{
			javaalert("El nombre ya existe, por favor verifique");
			}			
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
	  } 	
  include("../views/editarClasificacionRol.php");
  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
	}
?>
