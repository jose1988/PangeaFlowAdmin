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
    
   	<link href="../css/footable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="../css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="../css/footable.paginate.css" rel="stylesheet" type="text/css" />    
	
</head>

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
 			 <li><a href="../pages/usuario.php">Atrás</a></li>
  			 <li><a href="../pages/crearUsuario.php">Crear</a></li>
 			 <li><a href="../pages/restaurarUsuario.php">Restaurar</a></li>
			 </ul>
       </div>
       
       	<div class="col-md-2">
        </div>
        
        <div class="col-md-4">
        
       <?php 
	   	if(!isset($rowUsuario->return)){
	   ?>
       		<div class="well well-small alert alert-block" align="center">
   				<h2 style="color:#666">Atención</h2>
    			<h4>No Existe un Usuario con ese ID</h4>
   			</div>
            
         <?php }
		 	else{
		 ?>       
		 
        <h2 align="center">Datos del Usuario</h2>        
        <table width="100%" class="table-striped table-bordered table-condensed">
        	<?php
			echo '<th width="40%">Primer Nombre</th>';
			if(!isset($rowUsuario->return->primerNombre)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->primerNombre.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Segundo Nombre</th>';
			if(!isset($rowUsuario->return->segundoNombre)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->segundoNombre.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Primer Apellido</th>';
			if(!isset($rowUsuario->return->primerApellido)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->primerApellido.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Segundo Apellido</th>';
			if(!isset($rowUsuario->return->segundoApellido)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->segundoApellido.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Cédula</th>';
			if(!isset($rowUsuario->return->cedula)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->cedula.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">RIF</th>';
			if(!isset($rowUsuario->return->rif)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->rif.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Teléfono Personal</th>';
			if(!isset($rowUsuario->return->telefonosPersonal)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->telefonosPersonal.'</td>';
			}
			echo '</tr>';
		    echo '<tr>';
			echo '<th width="40%">Teléfono de Oficina</th>';
			if(!isset($rowUsuario->return->telefonosOficina)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->telefonosOficina.'</td>';
			}
			echo '</tr>';
		    echo '<tr>';
			echo '<th width="40%">Correo</th>';
			if(!isset($rowUsuario->return->email)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->email.'</td>';
			}
			echo '</tr>';
	      	echo '<tr>';
			echo '<th width="40%">Fax</th>';
			if(!isset($rowUsuario->return->fax)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->fax.'</td>';
			}
			echo '</tr>';
		   echo '<tr>';
			echo '<th width="40%">Dirección Personal</th>';
			if(!isset($rowUsuario->return->direccionPersonal)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->direccionPersonal.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Dirección de Oficina</th>';
			if(!isset($rowUsuario->return->direccionOficina)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->direccionOficina.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Descripción</th>';
			if(!isset($rowUsuario->return->descripcion)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->descripcion.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Estado</th>';
			if(!isset($rowUsuario->return->estado)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->estado.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Nombre de usuario</th>';
			echo '<td>'.$rowUsuario->return->id.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Clasificación de Usuario</th>';
			if(!isset($rowUsuario->return->idClasificacionUsuario->nombre)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->idClasificacionUsuario->nombre.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Organización</th>';
			if(!isset($rowUsuario->return->idOrganizacion->nombre)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->idOrganizacion->nombre.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Skin</th>';
			if(!isset($rowUsuario->return->idSkin->nombre)){
				echo '<td> </td>';
			}
			else{
				echo '<td>'.$rowUsuario->return->idSkin->nombre.'</td>';
			}
			echo '</tr>';
		
			echo '<tr>';
			echo '<th width="40%">Borrado</th>';
			if(!isset($rowUsuario->return->borrado)){
				echo '<td> </td>';
			}
			else{
				if($rowUsuario->return->borrado==1){
					echo '<td>TRUE</td>';
				}
				else{
					echo '<td>FALSE</td>';	
				}
			}
			echo '</tr>';
		?>	
	</table>
	<?php }?>    
    </div>    


<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
 
  <script type="text/javascript">
    $(function() {
      	$('table').footable();
    });
  </script>
  </body>
</html>