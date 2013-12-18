<?php	  
include("../lib/funciones.php");

  require_once('../lib/nusoap.php'); 
 
if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" ){		
			    try {
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				$Nombre= array('Nombre' => $_POST['nombre']);
				$rowClasifUsuario = $client->consultarClasifRolXNombre($Nombre);
				}catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
					}	
			if(!isset($rowClasifUsuario->return)){
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
			  array('nombre' => $_POST["nombre"],
			  	'descripcion' => $descripcion,
				'fechaCreacion'=>'16-12-13',
				'borrado' => $borrado);
			
				  try {
				$registroClaRol= array('registroClaRol' => $registroClasifRol);	
			    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
  			   	$client = new SOAPClient($wsdl_url);
 			    $client->decode_utf8 = false; 
				$client->insertarClasificacionRol($registroClaRol);
					} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
					}
				if(isset($_POST["crear_uno"])){
						iraURL('../pages/clasificacionRol.php');		
						}else{
						iraURL('../pages/crearClasificacionRol.php');	
							}	
			}else{
			javaalert("El nombre ya existe, por favor verifique");
			}			
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  } 	
  include("../views/crearClasificacionRol.php");
  
?>
