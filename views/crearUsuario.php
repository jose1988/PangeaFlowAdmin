<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<title>Documento sin título</title>

	
	<!-- styles -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	 	<link href="../css/footable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="../css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="../css/footable.paginate.css" rel="stylesheet" type="text/css" />    
	<link href="../css/estiloVerificacionNombre.css" rel="stylesheet">
	
	
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
 			 <li><a href="rol.php">Atrás</a></li>
  			 <li><a href="#">Crear</a></li>
 			 <li><a href="#">Restaurar</a></li>
			 </ul>
       </div>
	   	<div class="col-md-2">
        </div>
         <div class="col-md-5">  
         <form method="POST">    
        <table width="100%" class="table-striped table-bordered table-condensed">
			 <tr>
			 <th width="70%">Primer Nombre</th>
				 <td><input type="text" name="primernombre" id="primernombre" maxlength="19" size="50" title="Ingrese el primer nombre" placeholder="Ej. Juan" autofocus required></td>
		     </tr>
			 <tr>
			 <th width="70%">Segundo Nombre</th>
				 <td><input type="text" name="segundonombre" id="segundonombre" maxlength="19" size="50" title="Ingrese el segundo nombre" placeholder="Ej. Carlos"  ></td>
		     </tr>
			  <tr>
			 <th width="70%">Primer Apellido</th>
				 <td><input type="text" name="primerapellido" id="primerapellido" maxlength="19" size="50" title="Ingrese el primer apellido" placeholder="Ej. Arboleda"  required></td>
		     </tr>
			 <tr>
			 <th width="70%">Segundo Apellido</th>
				 <td><input type="text" name="segundoapellido" id="segundoapellido" maxlength="19" size="50" title="Ingrese el segundo apellido" placeholder="Ej. Villamizar"  ></td>
		     </tr>

			 <tr>
			 <th width="70%">Cédula</th>
				 <td><input type="text" name="cedula" id="cedula" maxlength="19" size="50" title="Ingrese la cédula de Identidad" placeholder="Ej. V-19887677"  required></td>
			 </tr>
              <tr>
			 <th width="70%">RIF</th>
				 <td><input type="text" name="rif" id="rif" maxlength="19" size="50" title="Ingrese el RIF" placeholder="Ej. V-19877699-9 " ></td>		
			 </tr>
			 <th width="70%">Teléfono Personal</th>
				 <td><input type="text" name="personal" id="personal" maxlength="19" size="50" title="Ingrese su teléfono personal" placeholder="Ej. 0424-1234532 " ></td>		
			 </tr>
			 <th width="70%">Teléfono de Oficina</th>
				 <td><input type="text" name="oficina" id="oficina" maxlength="19" size="50" title="Ingrese un teléfono de oficina" placeholder="Ej. 0212-4563789" ></td>		
			 </tr>
			 <th width="70%">Correo</th>
				 <td><input type="text" name="correo" id="correo" maxlength="19" size="50" title="Ingrese un correo" placeholder="Ej. juanvillamizar@gmail.com" ></td>		
			 </tr>
			 <th width="70%">Fax</th>
				 <td><input type="text" name="fax" id="fax" maxlength="19" size="50" title="Ingrese un número de fax" placeholder="Ej. 0212-4563789" ></td>		
			 </tr>
			 <th width="70%">Dirección Personal</th>
				 <td><textarea name="direccionp" id="direccionp" maxlength="149"  title="Ingrese su dirección personal" placeholder="Ej. ALtos de Paramillo" required></textarea></td>		
			 </tr>
			 <th width="70%">Dirección de Oficina</th>
				 <td><textarea name="direcciono" id="direcciono" maxlength="149"  title="Ingrese la dirección de oficina" placeholder="Ej. Avenida Libertador" required></textarea></td>		
			 </tr>
			  <th width="70%">Descripción</th>
				 <td><textarea name="descripcion" id="descripcion" maxlength="149"  title="Ingrese la descripción" placeholder="Ej. Realiza el mantenimiento de las tablas" required></textarea></td>		
			 </tr>
			 <tr>
			 <th width="70%">Estado</th>
				 <td><input type="text" name="estado" id="estado" maxlength="19" size="50" title="Ingrese el estado" placeholder="Ej. Estado  " required="required"></td>		
			 </tr>
			  <tr>
			 <th width="70%">Usuario</th>
				 <td><input type="text" name="usuario" id="usuario" maxlength="19" size="50" title="Ingrese el estado" placeholder="Ej. Estado  " required="required"></td>		
			 </tr>
			  <tr>
			 <th width="70%">Contraseña</th>
				 <td><input type="text" name="contrasena" id="contrasena" maxlength="19" size="50" title="Ingrese el estado" placeholder="Ej. Estado  " required="required"></td>		
			 </tr>
			 <tr> 
			 <th width="70%">Clasificación de Usuario</th>
				 <td><select id="clasificacion" name="clasificacion"  required  title="Ingrese la clasificación del Usuario">
                  <option value="" style="display:none">Seleccionar:</option> 
				 <?php
				 	for ($i=0;$i<$cantUsuario;$i++)
					{
					echo '<option value="'.$rowUsuario->return[$i]->id.'">'.$rowUsuario->return[$i]->nombre.'</option>';
					}
				  ?>
                 </select></td>
			 </tr>
			 <tr>
			 <th width="70%">Habilitado</th>
				 <td><input type="checkbox" name="borrado" id="borrado" title="si no presiona estara deshabilitado"> </td>
			 </tr>
	</table><br>
     <div class="col-md-9" align="center"><button class="btn" id="crear_uno" name="crear_uno" type="submit">Guardar</button></div>
    <div class="col-md-9" align="center"> <button class="btn" id="crear_otro" name="crear_otro" type="submit">Guardar y añadir otro</button></div>
</form>  
    </div>
<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-2.0.3.js" ></script> 
 
<script type="text/javascript">
 $(document).ready(function() {
 <!-- Codigo para verificar si el nombre del Rol ya existe --> 
   $('#nombre').blur(function(){
	   if($(this).val()!=""){
		           $('#Info').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
		   }
        var nombre = $(this).val();        
        var dataString = 'nombre='+nombre;
        $.ajax({
            type: "POST",
            url: "../ajax/chequeoNombreRol.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });     
 });
 });
 </script>  

</body>
</html>