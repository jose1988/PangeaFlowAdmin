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
 			 <li><a href="../pages/clasificacionUsuario.php">Atrás</a></li>
  			 <li><a href="../pages/crearClasificacionUsuario.php">Crear</a></li>
 			 <li><a href="../pages/restaurarClasificacionUsuario.php">Restaurar</a></li>
			 </ul>
       </div>
 
        <div class="col-md-1">
        </div>
        
        <div class="col-md-8">
        <?php 
	   	if(!isset($rowClasifUsuario->return)){
	   ?>
       		<div class="alert alert-block" align="center">
   				<h2 style="color:#666">Atención</h2>
    			<h4>No se puede eliminar el registro de clasificación de usuario</h4>
   			</div>
            
         <?php }
		 	else{
		 ?>
         
         <div class="well well-small alert alert-block" align="center">
    		<h2 style="color:#666">Atención</h2>
    		<h4>¿Desea eliminar el registro de clasificación de usuario?</h4>
    	</div>
         
        <form method="post">
        <table width="100%" class="footable table-hover" data-page-size="7">
      		<thead>
				<tr>
				  <th data-class="expand" data-sort-initial="true" data-type="numeric">
					<span>Id</span>
				  </th>
				  <th data-sort-ignore="true">
					<span>Nombre</span>
				  </th>
				  <th data-hide="phone" data-sort-ignore="true">
					Descripción
				  </th>
				</tr>
	 </thead>
  <tbody>
      <?php
	  if(count($rowClasifUsuario->return)){

		  	echo '<tr>';
			echo '<td width="10%">'.$rowClasifUsuario->return->id.'</td>';
			echo '<td width="20%">'.$rowClasifUsuario->return->nombre.'</td>';
			echo '<td width="25%">'.$rowClasifUsuario->return->descripcion.'</td>';
			echo '</tr>';
		  
		  }
		?>
		</tbody>	
	</table><br>
	 <button class="btn" id="si" name="si" type="submit">Sí</button>
	 <button class="btn" id="no" name="no" type="submit">No</button>
    </form>
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