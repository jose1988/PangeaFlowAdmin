<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
   if(!isset($_GET['id'])){
    iraURL('../pages/usuario.php');
   }  
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowClasiUsuario = $client->listarClasificacionUsuario($estadoBorrado);
  $cantClaUsuario=0;
  if(isset($rowClasiUsuario->return)){
   $cantClaUsuario=count($rowClasiUsuario->return);
  }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $rowSkin = $client->listarXBorrado($estadoBorrado);
  $cantSkin=0;
  if(isset($rowSkin->return)){
   $cantSkin=count($rowSkin->return);
  }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $rowOrganizacion = $client->listarOrganizacionByBorrado($estadoBorrado);
  $cantOrganizacion=0;
  if(isset($rowOrganizacion->return)){
   $cantOrganizacion=count($rowOrganizacion->return);
  }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeUsuarios?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idUsuario= array('idUsuario' => $_GET['id']);
  $rowUsuario = $client->consultarUsuario($idUsuario);
   // echo '<pre>';print_r($rowUsuario);

		if(!isset($rowUsuario->return)){
				javaalert('No existe el registro de usuario');
	            iraURL('../pages/usuario.php');	
		}elseif($rowUsuario->return->borrado==1){
				javaalert('No existe el registro de usuario');
	            iraURL('../pages/usuario.php');	
		}
if(isset($_POST["modificar"])){
	 	if(isset($_POST["primernombre"]) && $_POST["primernombre"]!="" && isset($_POST["cedula"]) && $_POST["cedula"]!="" && isset($_POST["primerapellido"]) && $_POST["primerapellido"]!="" && isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["direccionp"]) && $_POST["direccionp"]!="" && isset($_POST["direcciono"]) && $_POST["direcciono"]!="" && isset($_POST["clasificacion"]) && $_POST["clasificacion"]!="" && isset($_POST["usuario"]) && $_POST["usuario"]!="" && isset($_POST["contrasena"]) && $_POST["contrasena"]!="" && isset($_POST["contrasena_c"]) && $_POST["contrasena_c"]!="" && isset($_POST["organizacion"]) && $_POST["organizacion"]!=""  && isset($_POST["skin"]) && $_POST["skin"]!=""){		
		 if($_POST["usuario"]!=$rowUsuario->return->id){
			 try {
				$Nombre= array('idUsuario' => $_POST['usuario']);
				$rowNombreUsuario = $client->consultarUsuario($Nombre);
	    	}catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
					}	
		 }		
			if(!isset($rowNombreUsuario->return)){				
			 if(isset($_POST["borrado"])){
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
			 
			  if(!isset($_POST["correo"])){
			 $correo="";
			 }else{

			  if(preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$_POST["correo"])){						
						$correo=$_POST["correo"];
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
							'fechaCreacion'=>date("Y-m-d"),
							'fechaActualizacionClave'=>date("Y-m-d"),
							'borrado' => $borrado,
							'diasValidezClave'=>'10',
							'idSkin'=>$Skin,
							'idOrganizacion'=>$Oganizacion,
							'idClasificacionUsuario'=>$clasificacionUsuario);
							$registroUsu= array('registroUsuario' => $Usuario);				
							try {
							$client->editarUsuario($registroUsu);
							} catch (Exception $e) {
								javaalert('Lo sentimos no hay conexión');
								iraURL('../views/index.php');
								}
									iraURL('../pages/usuario.php');		
				}else{
				javaalert("El formato del correo es incorrecto, por favor verifique");
				}		
			 }
			
		}else{
				javaalert('El nombre de usuario ya existe , por favor verifique');
				} 				
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
		
	  } 	
  include("../views/editarUsuario.php");
  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');
	}	
?>
