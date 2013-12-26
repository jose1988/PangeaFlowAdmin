<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  	include("../lib/funciones.php");
  	require_once('../lib/nusoap.php');
  
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
		
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && 
			isset($_POST["descripcion"]) && $_POST["descripcion"]!="" &&
			isset($_POST["url"]) && $_POST["url"]!="" ){
			
			try{	
				$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';
  				$client = new SOAPClient($wsdl_url);
 				$client->decode_utf8 = false;
				$rowReporte=$client->listarReporte();			
				$nombre= array('nombreReporte' => $_REQUEST['nombre']);
				$rowReporte = $client->consultarReporteXNombre($nombre);
			
			} catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../pages/index.php');
			}
			
			if(!isset($rowReporte->return)){
				
				//Borrado 0 es FALSE y 1 TRUE
			 	if(!isset($_POST["borrado"])){
			 		$borrado="0";
			 	}else{
			 		$borrado="1";
			 	}
			 
			 	$reporte= array('nombre' => $_POST["nombre"],
			  		'descripcion' => $_POST["descripcion"],
					'url' => $_POST["url"],
					'borrado' => $borrado);
				
				try{
					$registroReporte= array('registroReporte' => $reporte);
					$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';
					$client = new SOAPClient($wsdl_url);
    				$client->decode_utf8 = false;
					$client->insertarReporte($registroReporte);
				
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
				}
			
				javaalert("Reporte creado");			
				if(isset($_POST["crear_uno"])){
					iraURL('../pages/reporte.php');
				}
				else{
					iraURL('../pages/crearReporte.php');
				}
			}
			else{
				javaalert("El nombre ya existe, por favor verifique");
			}
			
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	}
	include("../views/crearReporte.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
}
?>