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
	<li><a href="#">Skin</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Clasificación Rol</a></li>
          <li class="divider"></li>
          <li><a href="#">Clasificación Usuario</a></li>
          <li class="divider"></li>
          <li><a href="../pages/grupo.php">Grupo</a></li>
          <li class="divider"></li>
          <li><a href="#">Usuario</a></li>
          <li class="divider"></li>
          <li><a href="#">Rol</a></li>      
        </ul>
      </li>  
      <li><a href="../pages/organizacion.php">Organización</a></li>
      <li><a href="#">Política</a></li>
      <li><a href="../pages/reporte.php">Reporte</a></li>    
  </ul>     
</nav>

      <div class="col-md-2" align="center">
        <ul class="nav nav-stacked nav-tabs-justified">
 			 <li><a href="../pages/grupo.php">Atrás</a></li>
  			 <li><a href="../pages/crearGrupo.php">Crear</a></li>
 			 <li><a href="#">Restaurar</a></li>
			 </ul>
       </div>
       
       	<div class="col-md-2">
        </div>
        
        <div class="col-md-4 panel">     
        <table width="100%" class="table-condensed table-bordered">
        	<tr>
        		<th>Nombre:</th>
            	<td><input type="text" id="nombre" name="nombre" /></td>
            </tr>
            <tr>
        		<th>Descripción:</th>
            	<td><input type="text" id="descripcion" name="descripcion" /></td>
            </tr>
            <tr>
        		<th>Documentación:</th>
            	<td><input type="text" id="documentacion" name="documentacion" /></td>
            </tr>
            <tr>
        		<th>Fecha de Creación:</th>
            	<td><input type="text" id="fecha" name="fecha" /></td>
            </tr>
            <tr>
        		<th>Tipo:</th>
            	<td><input type="text" id="tipo" name="tipo" /></td>
            </tr>
            <tr>
        		<th>Estado:</th>
            	<td><input type="text" id="estado" name="estado" /></td>
            </tr>
            <tr>
        		<th>Borrado:</th>
            	<td><input type="text" id="borrado" name="borrado" /></td>
            </tr>
		</table> 
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