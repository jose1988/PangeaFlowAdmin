<?php
if(!isset($rowClasificacionUsuario->return)){
echo '<script language="javascript"> window.location = "../pages/clasificacionUsuario.php"; </script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<title>Pangea Flow</title>

	<!-- javascript -->
		<script type="text/javascript" src="../js/jquery-2.0.3.js"></script>
	<script type='text/javascript' src="../js/bootstrap.js"></script>
	<!-- styles -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	 	<link href="../css/footable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="../css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="../css/footable.paginate.css" rel="stylesheet" type="text/css" />    
	<link href="../css/estiloVerificacionNombre.css" rel="stylesheet">
	
	
</head>
<?php 
	$nombre="";
	$descripcion="";
	if(isset($rowClasificacionUsuario->return->nombre)){
	$nombre=$rowClasificacionUsuario->return->nombre;
	}
	if(isset($rowClasificacionUsuario->return->descripcion)){
	$descripcion=$rowClasificacionUsuario->return->descripcion;
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
	<li><a href="skin.php">Skin</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="clasificacionRol.php">Clasificación Rol</a></li>
          <li class="divider"></li>
          <li><a href="clasificacionUsuario.php">Clasificación Usuario</a></li>
          <li class="divider"></li>
          <li><a href="grupo.php">Grupo</a></li>
          <li class="divider"></li>
          <li><a href="usuario.php">Usuario</a></li>
          <li class="divider"></li>
          <li><a href="rol.php">Rol</a></li>      
        </ul>
      </li>  
      <li><a href="organizacion.php">Organización</a></li>
      <li><a href="politica.php">Política</a></li>
      <li><a href="reporte.php">Reporte</a></li>    
  </ul>     
   </nav>  
  
<div class="col-md-2" align="center">
        <ul class="nav nav-stacked nav-tabs-justified">
 			 <li><a href="clasificacionUsuario.php">Atrás</a></li>   			 
			<li><a href="crearClasificacionUsuario.php">Crear</a></li>
 			 <li><a href="restaurarClasificacionUsuario">Restaurar</a></li>
			 </ul>
       </div>
	   	<div class="col-md-2">
        </div>
         <div class="col-md-4">  
         <form method="POST" id="formulario">    
        <table width="100%" class="table-striped table-bordered table-condensed">
			 <tr>
			 <th width="40%">Nombre</th>
				 <td><input type="text" name="nombre" id="nombre" maxlength="49" size="50" value="<?php echo $nombre; ?>" required>
                 <div id="Info" style="float:right" align="center"></div>
                 </td>
		 </tr>
			 <tr>
			 <th width="40%">Descripión</th>
				 <td><input type="text" name="descripcion" id="descripcion" maxlength="149" size="50"  value="<?php echo $descripcion; ?>" ></td>
			 </tr>
			 <th width="40%">Habilitado</th>
					<td><input type="checkbox" name="borrado" id="borrado"  checked> </td>
			 </tr>
	</table><br>
     <div class="col-md-9" align="center"><button class="btn" id="modificar" name="modificar" type="submit">Modificar</button></div>
</form>  
    </div>
<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
 
<script type="text/javascript">
var nombreTiene=document.forms.formulario.nombre.value;
 $(document).ready(function() {
 <!-- Codigo para verificar si el nombre del Rol ya existe --> 
   $('#nombre').blur(function(){
	   if($(this).val()!="" && $(this).val()!=nombreTiene){
		           $('#Info').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
		   
        var nombre = $(this).val();        
        var dataString = 'nombre='+nombre;
        $.ajax({
            type: "POST",
            url: "../ajax/chequeoNombreClasifUsuario.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });  
      }else{
		$('#Info').fadeIn(1000).html("");
		}			
 });
 });
 
 </script>  

</body>
</html>