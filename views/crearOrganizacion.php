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
 			 <li><a href="../pages/organizacion.php">Atrás</a></li>
  			 <li><a href="../pages/crearOrganizacion.php">Crear</a></li>
 			 <li><a href="../pages/restaurarOrganizacion.php">Restaurar</a></li>
		</ul>
      </div>
       
       	<div class="col-md-2">
        </div>
        
        <div class="col-md-4">  
         <form method="POST">    
        <table width="100%" class="table-striped table-bordered table-condensed">
			 <tr>
			 <th width="40%">Nombre</th>
				 <td>
                 	<input type="text" name="nombre" id="nombre" maxlength="49" size="50" title="Ingrese el nombre" placeholder="Ej. Organización" autofocus required>
                 	<div id="Info" style="float:right"></div>
                 </td>
			 </tr>
			 <tr>
			 <th width="40%">Descripión</th>
				 <td><input type="text" name="descripcion" id="descripcion" maxlength="149" size="50" title="Ingrese la descripción" placeholder="Ej. Descripción Organización" required="required"></td>
			 </tr>
             <tr>
             <th width="40%">Tipo</th>
				 <td><input type="text" name="tipo" id="tipo" maxlength="149" size="50" title="Ingrese el tipo" placeholder="Ej. Tipoxx" required="required"></td>		
			 </tr>
             <tr>
             <th width="40%">Dirección</th>
				 <td><input type="text" name="direccion" id="direccion" maxlength="149" size="50" title="Ingrese la dirección" placeholder="Ej. Direcciónxx" required="required"></td>		
			 </tr>
             <tr>
             <th width="40%">Teléfono</th>
				 <td><input type="text" name="telefono" id="telefono" maxlength="149" size="50" title="Ingrese el teléfono" placeholder="Ej. 04161234567" required="required"></td>		
			 </tr>
             <tr>
             <th width="40%">Fax</th>
				 <td><input type="text" name="fax" id="fax" maxlength="149" size="50" title="Ingrese el fax" placeholder="Ej. 02769876543" required="required"></td>		
			 </tr>
             <tr>
             <th width="40%">Correo</th>
				 <td>
                 	<input type="text" name="correo" id="correo" maxlength="149" size="50" title="Ingrese el correo" placeholder="Ej. nombre@gmail.com" required="required">
                 	<div id="Info2" style="float:right"></div>
                 </td>		
			 </tr>
             <tr>
             <th width="40%">Ciudad</th>
				 <td><input type="text" name="ciudad" id="ciudad" maxlength="149" size="50" title="Ingrese la ciudad" placeholder="Ej. Ciudadxxx" required="required"></td>		
			 </tr>
             <tr>
             <th width="40%">Estado</th>
				 <td><input type="text" name="estado" id="estado" maxlength="149" size="50" title="Ingrese el estado" placeholder="Ej. Estadoxxx" required="required"></td>		
			 </tr>
			 <tr>
			 <th width="40%">Organización</th>
				 <td><select id="organizacion" name="organizacion"  required  title="Ingrese la organización">
                  <option value="" style="display:none">Seleccionar:</option> 
				 <?php
				 	for ($i=0;$i<$canOrga;$i++)
					{
						echo '<option value="'.$resultadoListaOrganizacion->return[$i]->id.'">'.$resultadoListaOrganizacion->return[$i]->nombre.'</option>';
					}
				  ?>
                 </select></td>
			 </tr>
			 <tr>
			 <th width="40%">Habilitado</th>
				 <td><input type="checkbox" name="borrado" id="borrado" title="Si no presiona estará deshabilitado"> </td>
			 </tr>
	</table>
    <br />
     <div class="col-md-12" align="center"><button class="btn" id="crear_uno" name="crear_uno" type="submit">Guardar</button></div>
    <div class="col-md-12" align="center"> <button class="btn" id="crear_otro" name="crear_otro" type="submit">Guardar y Añadir Otro</button></div>
</form>  
</div>

<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
 
  <script type="text/javascript">
    $(function() {
    	$('table').footable();
    });
  </script>
  
  <script type="text/javascript">
	$(document).ready(function() {
 	<!-- Codigo para verificar si el nombre del Grupo ya existe --> 
   		$('#nombre').blur(function(){
			if($(this).val()!=""){
				$('#Info').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
			}
        	var nombre = $(this).val();        
        	var dataString = 'nombre='+nombre;
        	$.ajax({
            	type: "POST",
            	url: "../ajax/chequeoNombreOrganizacion.php",
            	data: dataString,
            	success: function(data) {
                	$('#Info').fadeIn(1000).html(data);
            	}
        	});     
 		});
		
		
		$('#correo').blur(function(){
			if($(this).val()!=""){
				$('#Info2').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
			}
        	var nombre = $(this).val();        
        	var dataString = 'correo='+correo;
        	$.ajax({
            	type: "POST",
            	url: "../ajax/chequeoCorreo.php",
            	data: dataString,
            	success: function(data) {
                	$('#Info2').fadeIn(1000).html(data);
            	}
        	});     
 		});
	});
 </script>
  </body>
</html>