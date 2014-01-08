<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
   	iraURL('../pages/organizacion.php');
  }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $listaOrganizacion = $client->listarOrganizacionByBorrado($estadoBorrado);  
  $cantOrga=count($listaOrganizacion->return);
  
  $idOrganizacion= array('idOrganizacion' =>$_GET['id'] );
  $rowOrganizacion = $client->buscarOrganizacion($idOrganizacion);
  
  if(!isset($rowOrganizacion->return)){
  		javaalert('No existe el registro de organizacion');
		iraURL('../pages/organizacion.php');	
  }elseif($rowOrganizacion->return->borrado==1){
		javaalert('No existe el registro de organizacion');
		iraURL('../pages/organizacion.php');	
  }
  
	if(isset($_POST["modificar"])){
	
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["ciudad"]) && $_POST["ciudad"]!="" && 
			isset($_POST["estado"]) && $_POST["estado"]!=""){
							
			if($_POST["nombre"]!=$rowOrganizacion->return->nombre){
				try {
					$Nombre= array('nombreOrganizacion' => $_POST['nombre']);
					$rowOrganizacionXNombre = $client->consultarOrganizacionXNombre($Nombre);
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión ');
					iraURL('../views/index.php');
				}
			}
				
			if(!isset($rowGrupoXNombre->return)){
				//Borrado 0 es FALSE y 1 TRUE
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
					
					if(!isset($_POST["tipo"])){
			 			$tipo="";
			 		}else{
			 			$tipo=$_POST["tipo"];
					}
					
					if(!isset($_POST["direccion"])){
			 			$direccion="";
			 		}else{
			 			$direccion=$_POST["direccion"];
					}
					
					if(!isset($_POST["telefono"])){
			 			$telefono="";
			 		}else{
			 			$telefono=$_POST["telefono"];
					}
					
					if(!isset($_POST["fax"])){
			 			$fax="";
			 		}else{
			 			$fax=$_POST["fax"];
					}
					
					if(!isset($_POST["correo"]) || $_POST["correo"]==""){
			 			$correo="";
			 		}else{
						if(preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$_POST["correo"])){						
			 				$correo=$_POST["correo"];
						}
						else{
							$correo="";
							javaalert("El formato del correo es incorrecto, por favor verifique");
						}
					}
					
					if(!isset($_POST["organizacion"]) || $_POST["organizacion"]==""){
			 			$organizacionPadre= "";
			 		}else{
			 			$organizacionPadre= array('id' => $_POST["organizacion"],'borrado'=>'0');
					}
					
			 	$organizacion= array(
					'id'=>$_GET['id'],
					'nombre' => $_POST["nombre"],
			  		'descripcion' => $descripcion,
					'tipo' => $tipo,
					'direccion' => $descripcion,
					'telefono' => $telefono,
					'fax' => $fax,
					'mail' => $correo,
					'ciudad' => $_POST["ciudad"],
					'estado' => $_POST["estado"],
					'borrado' => $borrado,
					'idOrganizacionPadre' => $organizacionPadre);
					
				try{
					$registroOrganizacion= array('registroOrganizacion' => $organizacion);
					$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
					$client = new SOAPClient($wsdl_url);
    				$client->decode_utf8 = false;
					$client->editarOrganizacion($registroOrganizacion);
					
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
				}
				
				javaalert("Organizacion modificada");
				iraURL('../pages/organizacion.php');				
			}else{
				javaalert("El nombre ya existe, por favor verifique");
			}		
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
	} 	
  	include("../views/editarOrganizacion.php");
  
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
}
?>