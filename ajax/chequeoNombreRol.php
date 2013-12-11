<?php
include("../lib/funciones.php");
sleep(1);
$conn=conectar();
if(isset($_REQUEST['usuarioo'])&&$_REQUEST['usuarioo']!="") {
   
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
		
    if($registros>0)
        echo '<div id="Error">No disponible</div>';
    else
        echo '<div id="Success">Disponible</div>';
}else{
	  echo '<div></div>';
	}

?>