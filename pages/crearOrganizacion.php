<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  	include("../lib/funciones.php");
  	require_once('../lib/nusoap.php'); 
  	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
	$client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
	
	$contarOrga = $client->contarOrganizacion();
	$canOrga = $contarOrga->return;
	$resultadoListaOrganizacion = $client->listarOrganizacion();
	
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["ciudad"]) && $_POST["ciudad"]!="" && 
			isset($_POST["estado"]) && $_POST["estado"]!=""){
			
			try{
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
  				$client = new SOAPClient($wsdl_url);
 				$client->decode_utf8 = false;
				$rowOrganizacion=$client->listarOrganizacion();			
				$nombre= array('nombreOrganizacion' => $_REQUEST['nombre']);
				$rowOrganizacion = $client->consultarOrganizacionXNombre($nombre);
			
			} catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../views/index.php');
			}	
			
			if(!isset($rowOrganizacion->return)){
				
					//Borrado 0 es FALSE y 1 TRUE
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
					
					if(!isset($_POST["correo"])){
			 			$correo="";
			 		}else{
						if(preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$_POST["correo"])){						
			 				$correo=$_POST["correo"];
						}
						else{
							javaalert("El formato del correo es incorrecto, por favor verifique");
						}
					}
					
					if(!isset($_POST["organizacion"])){
			 			$organizacionPadre="";
			 		}else{
			 			$organizacionPadre= array('id' => $_POST["organizacion"],'borrado'=>'0');
					}
					
			 		$organizacion= array('nombre' => $_POST["nombre"],
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
						$client->insertarOrganizacion($registroOrganizacion);
					
					} catch (Exception $e) {
						javaalert('Lo sentimos no hay conexión');
						iraURL('../views/index.php');
					}
			
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
		}
		else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	}
	include("../views/crearOrganizacion.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
}
?>