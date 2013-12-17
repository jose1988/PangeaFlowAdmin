<?php	  
include("../lib/funciones.php");

  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowUsuario = $client->listarClasificacionUsuario($estadoBorrado);
  $cantUsuario=count($rowUsuario->return);
 // echo '<pre>';print_r($rowUsuario);
 
if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["primernombre"]) && $_POST["primernombre"]!="" && isset($_POST["cedula"]) && $_POST["cedula"]!="" && isset($_POST["primerapellido"]) && $_POST["primerapellido"]!="" && isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["direccionp"]) && $_POST["direccionp"]!="" && isset($_POST["direcciono"]) && $_POST["direcciono"]!="" && isset($_POST["clasificacion"]) && $_POST["clasificacion"]!=""){		
		
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
			 
			 $Skin= array('id' => '2','borrado'=>'0');
		     $Oganizacion= array('id' =>'2','borrado'=>'0');
		   	$clasificacionUsuario= array('id' =>'1','borrado'=>'0');
			  $Usuario= 
			  array('primerNombre' => $_POST["primernombre"],
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
                'clave' => '123',				
				'borrado' => $borrado,
				'diasValidezClave'=>'10',
				'idSkin'=>$Skin,
				'idOrganizacion'=>$Oganizacion,
				'idClasificacionUsuario'=>$clasificacionUsuario);
				$registroUsu= array('registroUsuario' => $Usuario);
//echo '<pre>';
//print_r($Usuario);				
			    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeUsuarios?WSDL';
  			   	$client = new SOAPClient($wsdl_url);
 			    $client->decode_utf8 = false; 
				$client->insertarUsuario($registroUsu);
						
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  } 	
  include("../views/crearUsuario.php");
  
?>
