<?php
if(!isset($rowReporte->return)){
	echo '<script language="javascript"> window.location = "../pages/reporte.php"; </script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pangea Flow</title>

	<!-- javascript -->	
	<script type="text/javascript" src="../js/jquery-2.0.2.js"></script>
	<script type='text/javascript' src="../js/bootstrap.js"></script>	
	
	<!-- styles -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">    
    <link href="../css/estiloVerificacionNombre.css" rel="stylesheet">
	
</head>

<?php 
	$nombre="";
	$descripcion="";
	$url="";
	if(isset($rowReporte->return->nombre)){
		$nombre=$rowReporte->return->nombre;
	}
	if(isset($rowReporte->return->descripcion)){
		$descripcion=$rowReporte->return->descripcion;
	}
	if(isset($rowReporte->return->url)){
		$url=$rowReporte->return->url;
	}
?>

<body>
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">PangeaFlow</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
	<li><a href="../pages/skin.php">Skin</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="../pages/clasificacionRol.php">Clasificación Rol</a></li>
          <li class="divider"></li>
          <li><a href="../pages/clasificacionUsuario.php">Clasificación Usuario</a></li>
          <li class="divider"></li>
          <li><a href="../pages/grupo.php">Grupo</a></li>
          <li class="divider"></li>
          <li><a href="../pages/usuario.php">Usuario</a></li>
          <li class="divider"></li>
          <li><a href="../pages/rol.php">Rol</a></li>      
        </ul>
      </li>  
      <li><a href="../pages/organizacion.php">Organización</a></li>
      <li><a href="../pages/politica.php">Política</a></li>
      <li><a href="../pages/reporte.php">Reporte</a></li>    
  </ul>     
</nav>

      <div class="col-md-2" align="center">
        <ul class="nav nav-stacked nav-tabs-justified">
 			 <li><a href="../pages/reporte.php">Atrás</a></li>
  			 <li><a href="../pages/crearReporte.php">Crear</a></li>
 			 <li><a href="../pages/restaurarReporte.php">Restaurar</a></li>
		</ul>
      </div>
       
       	<div class="col-md-2">
        </div>
        
        <div class="col-md-4">
        <?php 
	   	if(!isset($rowReporte->return)){
	   ?>
       		<div class="alert alert-block" align="center">
   				<h2 style="color:#666">Atención</h2>
    			<h4>No Existe un Reporte con ese ID</h4>
   			</div>
            
         <?php }
		 	else{
		 ?>
         <form method="POST" id="formulario">    
        <table width="100%" class="table-striped table-bordered table-condensed">
			 <tr>
			 <th width="40%">Nombre</th>
				 <td>
                 	<input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" maxlength="49" size="50" title="Ingrese el nombre" placeholder="Ej. Reporte" autofocus required>
                     <div id="Info" style="float:right"></div>
                 </td>
			 </tr>
			 <tr>
			 <th width="40%">Descripión</th>
				 <td><input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>" maxlength="149" size="50" title="Ingrese la descripción" placeholder="Ej. Descripción Reporte" required="required"></td>
			 </tr>
             <tr>
             <th width="40%">Url</th>
				 <td><input type="text" name="url" id="url" value="<?php echo $url;?>" maxlength="149" size="80" title="Ingrese el URL" placeholder="Ej. http//pangea.com " required="required"></td>		
			 </tr>
			 <tr>
			 <th width="40%">Habilitado</th>
				 <td><input type="checkbox" name="borrado" id="borrado" title="Si no esta seleccionado estará deshabilitado" checked="checked"> </td>
			 </tr>
	</table>
    <br />
     <div class="col-md-12" align="center"><button class="btn" id="modificar" name="modificar" type="submit">Modificar</button></div>
  </form>
<?php }?>
</div>

  <script type="text/javascript">
  	var nombreTiene=document.forms.formulario.nombre.value;
	$(document).ready(function() {
 	<!-- Codigo para verificar si el nombre del Reporte ya existe --> 
   		$('#nombre').blur(function(){
			if($(this).val()!="" && $(this).val()!=nombreTiene){
				
				$('#Info').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);			
        		var nombre = $(this).val();        
        		var dataString = 'nombre='+nombre;
        		$.ajax({
            		type: "POST",
            		url: "../ajax/chequeoNombreReporte.php",
            		data: dataString,
            		success: function(data) {
                		$('#Info').fadeIn(1000).html(data);
            		}
        		});
			}
 		});
	});
 </script>
  </body>
</html>