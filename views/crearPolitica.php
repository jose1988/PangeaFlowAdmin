<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<title>Documento sin título</title>

	<!-- javascript -->
	
	<script type="text/javascript" src="../js/jquery-2.0.2.js"></script>
	<script type=text/javascript src="../js/bootstrap.js"></script>
	
	
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
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Clasificacion Rol</a></li>
          <li class="divider"></li>
          <li><a href="#">Clasificacion Usuario</a></li>
          <li class="divider"></li>
          <li><a href="#">Grupo</a></li>
          <li class="divider"></li>
          <li><a href="#">Usuario</a></li>
          <li class="divider"></li>
          <li><a href="#">Rol</a></li>
      
      
        </ul>
      </li>
   
    
      <li><a href="#">Organización</a></li>
      <li><a href="#">Política</a></li>
      <li><a href="#">Reporte</a></li>
      <li><a href="#">Skin</a></li>
       </ul>
   </nav>  
  
<div class="col-md-2" align="center">
        <ul class="nav nav-stacked nav-tabs-justified">
 			 <li><a href="rol.php">Atrás</a></li>
  			 <li><a href="#">Crear</a></li>
 			 <li><a href="#">Restaurar</a></li>
			 </ul>
       </div>
	   	<div class="col-md-2">
        </div>
         <div class="col-md-4">  
         <form method="POST">    
        <table width="100%" class="table-striped table-bordered table-condensed">
			 <tr>
			 <th width="40%">Nombre</th>
				 <td><input type="text" name="nombre" id="nombre" maxlength="49" size="50" title="Ingrese el nombre" placeholder="Ej. Cola" autofocus required></td>
			 </tr>
			 <tr>
			 <th width="40%">Descripión</th>
				 <td><input type="text" name="descripcion" id="descripcion" maxlength="149" size="50" title="Ingrese la descripción" placeholder="Ej. Primero que entra, primero que sale " required="required"></td>
			 </tr>
			 <tr>
			 <th width="40%">Documentación</th>
				 <td><textarea name="documentacion" id="documentacion" maxlength="499"  title="Ingrese la doumentación" placeholder="Ej. "  required="required"></textarea></td>		
			 </tr>
             <tr>
			 <th width="40%">Implementación</th>
				 <td><textarea name="documentacion" id="documentacion" maxlength="499"  title="Ingrese la doumentación" placeholder="Ej. "  required="required"></textarea></td>		
			 </tr>
              <tr>
			 <th width="40%">Estado</th>
				 <td><input type="text" name="estado" id="estado" maxlength="149" size="50" title="Ingrese el estado" placeholder="Ej. Estadoxx " required="required"></td>		
			 </tr>
			 
			 <tr>
			 <th width="40%">Habilitado</th>
				 <td><input type="checkbox" name="borrado" id="borrado" title="si no presiona estara deshabilitado"> </td>
			 </tr>
	</table>
     <div class="col-md-9" align="center"><button class="btn" id="crear_uno" name="crear_uno" type="submit">Guardar</button></div>
    <div class="col-md-9" align="center"> <button class="btn" id="crear_otro" name="crear_otro" type="submit">Guardar y añadir otro</button></div>
</form>  
    </div>
<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
 
  <script type="text/javascript">
    $(function() {
      $(table).footable()
    })
  </script>