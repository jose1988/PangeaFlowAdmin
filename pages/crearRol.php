<?php	  
include("../lib/funciones.php");

  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowClasifRol = $client->listarClasificacionRol($estadoBorrado);
  $cantClasifRol=count($rowClasifRol->return);
 
if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["documentacion"]) && $_POST["documentacion"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" && isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["clasificacion"]) && $_POST["clasificacion"]!="" ){		
			    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				$estadoBorrado= array('borrado' => '0');
				$rowRol = $client->listarRol($estadoBorrado);
				$cantRol=count($rowRol->return);
			 for ($i=0;$i<$cantRol;$i++)
			 {
				 if($rowRol->return[$i]->nombre==$_POST["nombre"]){
				  $seEncontro=true;
				  break;
				 }
			 }
			 if($seEncontro!=true){
			 if(!isset($_POST["borrado"])){
			 $borrado="0";
			 }else{
			 $borrado="1";
			 }
			 $clasificacionRol= array('id' => $_POST["clasificacion"],'borrado'=>'0');
			  $Rol= 
			  array('nombre' => $_POST["nombre"],
			  	'descripcion' => $_POST["descripcion"],
				'documentacion' => $_POST["documentacion"],				
				'estado' => $_POST["estado"],
				'borrado' => $borrado,
				'idClasificacionRol'=>$clasificacionRol);
				$registroRol= array('registroRol' => $Rol);	
			    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
  			   	$client = new SOAPClient($wsdl_url);
 			    $client->decode_utf8 = false; 
				$client->insertarRol($registroRol);
			}else{
			javaalert("El nombre ya existe, por favor verifique");
			}			
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  } 	
  include("../views/crearRol.php");
  
?>
<script type="text/javascript">
 $(document).ready(function() {
 <!-- Codigo para verificar si el nombre del Rol ya existe --> 
   $('#nombre<').blur(function(){
	   if($(this).val()!=""){
		           $('#Info').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
		   }
        var usuarioo = $(this).val();        
        var dataString = 'usuarioo='+usuarioo;
        $.ajax({
            type: "POST",
            url: "chequeoNombreRol.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });      
 
 }
 </script>  