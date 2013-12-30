<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
   	iraURL('../pages/grupo.php');
  }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowOrganizacion = $client->listarOrganizacionByBorrado($estadoBorrado);
  $cantOrga=count($rowOrganizacion->return);
  
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idGrupo= array('idGrupo' =>$_GET['id'] );
  $rowGrupo = $client->buscarGrupo($idGrupo);
  
	if(isset($_POST["modificar"])){
	
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" && 
			isset($_POST["tipo"]) && $_POST["tipo"]!="" && isset($_POST["organizacion"]) && $_POST["organizacion"]!=""){				
			
			$fecha=$rowGrupo->return->fechaCreacion;
							
			if($_POST["nombre"]!=$rowGrupo->return->nombre){
				try {
					$Nombre= array('nombreGrupo' => $_POST['nombre']);
					$rowGrupoXNombre = $client->consultarGrupoXNombre($Nombre);
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión ');
					iraURL('../views/index.php');
				}
			}
				
			if(!isset($rowGrupoXNombre->return)){
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
				
				if(!isset($_POST["estado"])){
			 		$estado="";
			 	}else{
			 		$estado=$_POST["estado"];
				}
				
			 	$organizacion= array('id' => $_POST["organizacion"],'borrado'=>'0');
			 	$grupo= array(
					'id'=>$_GET['id'],
					'nombre' => $_POST["nombre"],
			  		'descripcion' => $_POST["descripcion"],
					'documentacion' => $_POST["documentacion"],
					'fechaCreacion' => $fecha,
					'tipo' => $_POST["tipo"],
					'estado' => $_POST["estado"],
					'borrado' => $borrado,
					'idOrganizacion' => $organizacion);
					
				try{
					$registroGrupo= array('registroGrupo' => $grupo);
					$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';
  					$client = new SOAPClient($wsdl_url);
 					$client->decode_utf8 = false;
					$client->editarGrupo($registroGrupo);
					
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
				}
				 iraURL('../pages/grupo.php');				
			}else{
				javaalert("El nombre ya existe, por favor verifique");
			}		
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
	} 	
  	include("../views/editarGrupo.php");
  
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
}
?>
