<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowUsuario = $client->listarClasificacionUsuario($estadoBorrado);
  $cantUsuario=count($rowUsuario->return);
 // echo '<pre>';print_r($rowUsuario);
  
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $rowOrganizacion = $client->listarOrganizacionByBorrado($estadoBorrado);
  $cantOrganizacion=count($rowOrganizacion->return);
  if(!isset($rowOrganizacion->return)){
  javaalert("Lo sentimos no se pueden crear usuarios porque no hay ninguna organización existente");
  iraURL('../pages/usuario.php');
  }elseif(!isset($rowUsuario->return)){
  javaalert("Lo sentimos no se pueden crear usuarios porque no hay ninguna clasificación de usuario existente");
  iraURL('../pages/usuario.php');
  }
 
if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["primernombre"]) && $_POST["primernombre"]!="" && isset($_POST["cedula"]) && $_POST["cedula"]!="" && isset($_POST["primerapellido"]) && $_POST["primerapellido"]!="" && isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["direccionp"]) && $_POST["direccionp"]!="" && isset($_POST["direcciono"]) && $_POST["direcciono"]!="" && isset($_POST["clasificacion"]) && $_POST["clasificacion"]!="" && isset($_POST["usuario"]) && $_POST["usuario"]!="" && isset($_POST["contrasena"]) && $_POST["cotrasena"]!="" && isset($_POST["contrasena_c"]) && $_POST["cotrasena_c"]!=""){		
		 try {
		 require_once('../lib/nusoap.php'); 
	     $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeUsuarios?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				$Nombre= array('idUsuario' => $_POST['usuario']);
				$rowNombreUsuario = $client->consultarUsuario($Nombre);
	    	}catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
					}		
			if(!isset($rowNombreUsuario->return)){				
			 if(!isset($_POST["borrado"])){
			 $borrado="0";
			 }else{
			 $borrado="1";
			 }
			 if(!isset($_POST["segundonombre"])){
			 $segundonombre="";
			 }else{
			 $segundonombre=$_POST["segundonombre"];
			 }
			 if(!isset($_POST["segundoapellido"])){
			 $segundoapellido="";
			 }else{
			 $segundoapellido=$_POST["segundoapellido"];
			 }
			 if(!isset($_POST["rif"])){
			 $rif="";
			 }else{
			 $rif=$_POST["rif"];
			 }
			 if(!isset($_POST["personal"])){
			 $personal="";
			 }else{
			 $personal=$_POST["personal"];
			 }
			 if(!isset($_POST["oficina"])){
			 $oficina="";
			 }else{
			 $oficina=$_POST["oficina"];
			 }
			 if(!isset($_POST["correo"])){
			 $correo="";
			 }else{
			 $correo=$_POST["correo"];
			 }
			 if(!isset($_POST["fax"])){
			 $fax="";
			 }else{
			 $fax=$_POST["fax"];
			 }
			 if(!isset($_POST["descripcion"])){
			 $descripcion="";
			 }else{
			 $descripcion=$_POST["descripcion"];
			 }
			 
			 $Skin= array('id' => '1','borrado'=>'0');
		     $Oganizacion= array('id' =>$_POST["organizacion"],'borrado'=>'0');
		   	$clasificacionUsuario= array('id' =>$_POST["clasificacion"],'borrado'=>'0');
			  $Usuario= 
			  array(
			  'id'=>$_POST['usuario'],
			  'clave' => $_POST['contrasena'],				
			  'primerNombre' => $_POST["primernombre"],
			  'segundoNombre' => $segundonombre,
			  'primerApellido' => $_POST["primerapellido"],
			  'segundoApellido' => $segundoapellido,			  
				'cedula' => $_POST["cedula"],
				'rif' => $rif,
				'telefonosPersonal' => $personal,
				'telefonosOficina' => $oficina,
				'mail' => $correo,
				'fax' => $fax,
				'direccionPersonal' => $_POST["direccionp"],
				'direccionOficina' => $_POST["direcciono"],
				'descripcion' => $descripcion,
				'estado' => $_POST["estado"],
				'fechaCreacion'=>'10-10-13',
				'fechaActualizacionClave'=>'10-10-13',
				'borrado' => $borrado,
				'diasValidezClave'=>'10',
				'idSkin'=>$Skin,
				'idOrganizacion'=>$Oganizacion,
				'idClasificacionUsuario'=>$clasificacionUsuario);
				$registroUsu= array('registroUsuario' => $Usuario);				
				try {
			    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeUsuarios?WSDL';
  			   	$client = new SOAPClient($wsdl_url);
 			    $client->decode_utf8 = false; 
				$client->insertarUsuario($registroUsu);
				} catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/index.php');
					}
				if(isset($_POST["crear_uno"])){
						iraURL('../pages/usuario.php');		
						}else{
						iraURL('../pages/crearUsuario.php');	
							}	
		}else{
				javaalert('El nombre de usuario ya existe , por favor verifique');
				} 				
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
		
	  } 	
  include("../views/crearUsuario.php");
  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');
	}	
?>
