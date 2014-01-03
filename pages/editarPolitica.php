<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  	include("../lib/funciones.php");
  	require_once('../lib/nusoap.php');
    if(!isset($_GET['id'])){
    iraURL('../pages/clasificacionRol.php');
    }
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?wsdl';
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$idP = array('idPolitica' => $_GET['id']);	
    $rowPolitica = $client->buscarPolitica($idP);
	if(!isset($rowPolitica->return)){
				javaalert('No existe el registro de política');
	            iraURL('../pages/politica.php');	
		}elseif($rowPolitica->return->borrado==1){
				javaalert('No existe el registro de política');
	            iraURL('../pages/politica.php');
		}
	if(isset($_POST["modificar"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" &&
			isset($_POST["implementacion"]) && $_POST["implementacion"]!="" && isset($_POST["estado"]) && $_POST["estado"]!=""){
			if($_POST["nombre"]!=$rowPolitica->return->nombre){
				try{	
					$nombre= array('nombrePolitica' => $_REQUEST['nombre']);
					$rowPoliticaXNombre = $client->consultarPoliticaXNombre($nombre);
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
				}
			}			
			if(!isset($rowPoliticaXNombre->return)){
						
				if(isset($_POST["borrado"])){
			 		$borrado="0";
			 	}else{
			 		$borrado="1";
			 	}
				if(!isset($_POST["documentacion"])){
			 		$documentacion="";
			 	}else{
			 		$documentacion=$_POST["documentacion"];
				}
			 	$politica= array(
				'id'=>$rowPolitica->return->id,
				'nombre' => $_POST["nombre"],
			  		'descripcion' => $_POST["descripcion"],
					'documentacion' => $_POST["documentacion"],	
					'implementacion' => $_POST["implementacion"],				
					'estado' => $_POST["estado"],
					'borrado' => $borrado);
				try{
					$registroPolitica= array('registroPolitica' => $politica); 	   
					$client->editarPolitica($registroPolitica);
				    javaalert("El registro de política ha sido modificado");
					iraURL('../pages/politica.php');
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
			javaalert("Debe agregar los campos obligatorios, por favor verifique");
		}
	  }
	  
	include("../views/editarPolitica.php");
		
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
}
?>