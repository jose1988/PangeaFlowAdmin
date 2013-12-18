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
 			 <li><a href="../pages/politica.php">Atrás</a></li>
  			 <li><a href="../pages/crearPolitica.php">Crear</a></li>
 			 <li><a href="../pages/restaurarPolitica.php">Restaurar</a></li>
		</ul>
   	</div>
    
       	<div class="col-md-2">
        </div>
        
        <div class="col-md-4">
        
		<?php 
	   	if(isset($bpoliticas)){
	   ?>        
        <h2 align="center">Datos de la Política</h2>
        
        <table width="100%" class="table-striped table-bordered table-condensed">
        	<?php
			echo '<tr>';
			echo '<th width="40%">Id</th>';
			echo '<td>'.$bpoliticas->return->id.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Nombre</th>';
			if(!isset($bpoliticas->return->nombre)){
				echo'<td> </td>';
			}
			else{
				echo '<td>'.$bpoliticas->return->nombre.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Descripión</th>';
			if(!isset($bpoliticas->return->descripcion)){
				echo'<td> </td>';
			}
			else{
				echo '<td>'.$bpoliticas->return->descripcion.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Documentación</th>';
			if(!isset($bpoliticas->return->documentacion)){
				echo'<td> </td>';
			}
			else{
				echo '<td>'.$bpoliticas->return->documentacion.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Fecha de Creación</th>';
			if(!isset($bpoliticas->return->implementacion)){
				echo'<td> </td>';
			}
			else{
				echo '<td>'.$bpoliticas->return->implementacion.'</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<th width="40%">Tipo</th>';
			if(!isset($bpoliticas->return->estado)){
				echo'<td> </td>';
			}
			else{
				echo '<td>'.$bpoliticas->return->estado.'</td>';
			}
			echo '</tr>';
			
			echo '<tr>';
			echo '<th width="40%">Borrado</th>';
			if(!isset($bpoliticas->return->borrado)){
				echo '<td> </td>';
			}
			else{
				if($bpoliticas->return->borrado==1){
					echo '<td>TRUE</td>';
				}
				else{
					echo '<td>FALSE</td>';	
				}
			}
			echo '</tr>';
		?>	
	</table>
    <?php } 
		else{ ?>
			<div class="well well-sm alert alert-block" align="center">
   				<h2 style="color:#666">Atención</h2>
    			<h4>No Existe una Política con ese ID</h4>
   			</div>
        <?php } ?>
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