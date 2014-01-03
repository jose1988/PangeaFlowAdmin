<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
    iraURL('../pages/clasificacionUsuario.php');
   }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idClasiUsuario= array('idClaUsu' => $_GET['id']);
  $rowClasificacionUsuario = $client->consultarClasificacionUsuario($idClasiUsuario);
		if(!isset($rowClasificacionUsuario->return)){
				javaalert('No existe el registro de clasificación de usuario');
	            iraURL('../pages/clasificacionUsuario.php');	
		}elseif($rowClasificacionUsuario->return->borrado==1){
				javaalert('No existe el registro de clasificación de usuario');
	            iraURL('../pages/clasificacionUsuario.php');	
		}
 
if(isset($_POST["modificar"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" ){
	
			  if($_POST["nombre"]!=$rowClasificacionUsuario->return->nombre){
			  try {
				$Nombre= array('Nombre' => $_POST['nombre']);
				$rowClasifUsuario = $client->consultarClasifUsuarioXNombre($Nombre);
				}catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
					}	
			  }  
				
			if(!isset($rowClasifUsuario->return)){
			 if(isset($_POST["borrado"])){
			 $borrado="0";
			 }else{
			 $borrado="1";
			 }
			 if(!isset($_POST["descripcion"])){
			 $descripcion="";
			 }else{
			 $descripcion=$_POST["descripcion"];
			 }
			  $registroClasifUsuario= 
			  array(
			  'id'=>$rowClasificacionUsuario->return->id,
			  'nombre' => $_POST["nombre"],
			  	'descripcion' => $descripcion,
				'fechaCreacion'=>date("Y-m-d"),
				'fechaModificacion'=>date("Y-m-d"),
				'borrado' => $borrado);
			
				  try {
				$registroClaUsuario= array('registroClaUsuario' => $registroClasifUsuario);	
				$client->editarClasificacionUsuario($registroClaUsuario);
					} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
					}			
			iraURL('../pages/clasificacionUsuario.php');		
			}else{
			javaalert("El nombre ya existe, por favor verifique");
			}			
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
	  } 	
  include("../views/editarClasificacionUsuario.php");
  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
?>
