<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
   	iraURL('../pages/reporte.php');
  }
    
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idReporte= array('idReporte' =>$_GET['id'] );
  $rowReporte = $client->buscarReporte($idReporte);
  
  if(!isset($rowReporte->return)){
  		javaalert('No existe el registro de reporte');
		iraURL('../pages/reporte.php');	
  }elseif($rowReporte->return->borrado==1){
		javaalert('No existe el registro de reporte');
		iraURL('../pages/reporte.php');	
  }
  
	if(isset($_POST["modificar"])){
	
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && 
			isset($_POST["descripcion"]) && $_POST["descripcion"]!="" &&
			isset($_POST["url"]) && $_POST["url"]!="" ){
							
			if($_POST["nombre"]!=$rowReporte->return->nombre){
				try {
					$Nombre= array('nombreReporte' => $_POST['nombre']);
					$rowReporteXNombre = $client->consultarReporteXNombre($Nombre);
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión ');
					iraURL('../views/index.php');
				}
			}
				
			if(!isset($rowReporteXNombre->return)){
				//Borrado 0 es FALSE y 1 TRUE
				if(isset($_POST["borrado"])){
			 		$borrado="0";
			 	}else{
			 		$borrado="1";
			 	}
				
			 	$reporte= array(
					'id'=>$_GET['id'],
					'nombre' => $_POST["nombre"],
			  		'descripcion' => $_POST["descripcion"],
					'url' => $_POST["url"],
					'borrado' => $borrado);
					
				try{
					$registroReporte= array('registroReporte' => $reporte);
					$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';
					$client = new SOAPClient($wsdl_url);
    				$client->decode_utf8 = false;
					$client->editarReporte($registroReporte);
					
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
				}
				javaalert("Reporte modificado");
				iraURL('../pages/reporte.php');	
							
			}else{
				javaalert("El nombre ya existe, por favor verifique");
			}		
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
	} 	
  	include("../views/editarReporte.php");
  
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
}
?>