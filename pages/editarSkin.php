<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
	 if(!isset($_GET['id'])){
    iraURL('../pages/clasificacionRol.php');
    }
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';
	$client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
	$idSkin= array('idSkin' => $_GET['id']);
	$rowSkin = $client->buscarSkin($idSkin);
	if(!isset($rowSkin->return)){
				javaalert('No existe el registro de skin');
	            iraURL('../pages/skin.php');	
		}elseif($rowSkin->return->borrado==1){
				javaalert('No existe el registro de skin');
	            iraURL('../pages/skin.php');	
		}
	if(isset($_POST["modificar"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!=""){				
			if($_POST["nombre"]!=$rowSkin->return->nombre){
				try{
					$nombre= array('nombreSkin' => $_REQUEST['nombre']);
					$rowSkinXNombre = $client->consultarSkinXNombre($nombre);	
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
				}
			}
			if(!isset($rowSkinXNombre->return)){
			 	if(isset($_POST["borrado"])){
			 		$borrado="0";
			 	}else{
			 		$borrado="1";
			 	}
			 
			 	$skin= array(
				'id'=>$rowSkin->return->id,
				'nombre' => $_POST["nombre"],
					'borrado' => $borrado);
				
				try{
					$registroSkin= array('registroSkin' => $skin);
					$client->editarSkin($registroSkin);
					javaalert("El registro de skin ha sido modificado");
					iraURL('../pages/skin.php');
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
				}					
			}
			else{
				javaalert("El nombre ya existe, por favor verifique");
			}
		}
		else{
			javaalert("Debe agregar el nombre, por favor verifique");
		}
	}	
	include("../views/editarSkin.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
}
?>