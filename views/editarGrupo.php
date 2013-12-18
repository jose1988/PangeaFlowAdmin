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
 			 <li><a href="../pages/grupo.php">Atrás</a></li>
  			 <li><a href="../pages/crearGrupo.php">Crear</a></li>
 			 <li><a href="../pages/restaurarGrupo.php">Restaurar</a></li>
		</ul>
      </div>
       
       	<div class="col-md-2">
        </div>
        
        <div class="col-md-4">
 		 <?php 
	   	if(!isset($resultadoBuscarGrupo->return)){
	   ?>
       		<div class="alert alert-block" align="center">
   				<h2 style="color:#666">Atención</h2>
    			<h4>No Existe un Grupo con ese ID</h4>
   			</div>
            
         <?php }
		 	else{
		 ?>        
         <form method="POST">    
        <table width="100%" class="table-striped table-bordered table-condensed">
			 <tr>
			 <th width="40%">Nombre</th>
				 <td><input type="text" name="nombre" id="nombre" value="<?php echo $resultadoBuscarGrupo->return->nombre;?>" maxlength="49" size="50" title="Ingrese el nombre" placeholder="Ej. Grupo" autofocus required></td>
			 </tr>
			 <tr>
			 <th width="40%">Descripión</th>
				 <td><input type="text" name="descripcion" id="descripcion" value="<?php echo $resultadoBuscarGrupo->return->descripcion;?>" maxlength="149" size="50" title="Ingrese la descripción" placeholder="Ej. Descripción Grupo" required="required"></td>
			 </tr>
			 <tr>
			 <th width="40%">Documentación</th>
				 <td><textarea name="documentacion" id="documentacion" maxlength="499"  title="Ingrese la doumentación" placeholder="Ej. "  required="required"><?php echo $resultadoBuscarGrupo->return->documentacion;?></textarea></td>		
			 </tr>
              <tr>
              <th width="40%">Fecha de Creación</th>
				 <td><output><?php echo $fecha;?></output></td>		
			 </tr>
             <tr>
             <th width="40%">Tipo</th>
				 <td><input type="text" name="tipo" id="tipo" value="<?php echo $resultadoBuscarGrupo->return->tipo;?>" maxlength="149" size="50" title="Ingrese el tipo" placeholder="Ej. Tipoxx " required="required"></td>		
			 </tr>
             <tr>
             <th width="40%">Estado</th>
				 <td><input type="text" name="estado" id="estado" value="<?php echo $resultadoBuscarGrupo->return->estado;?>" maxlength="149" size="50" title="Ingrese el estado" placeholder="Ej. Estadoxx " required="required"></td>		
			 </tr>
			 <tr>
			 <th width="40%">Organización</th>
				 <td><select id="organizacion" name="organizacion"  required  title="Ingrese la organización">
				 <?php
				 if($resultadoBuscarGrupo->return->idOrganizacion->id!=""){
					echo '<option value="'.$resultadoBuscarGrupo->return->idOrganizacion->id.'" style="display:none">'.$resultadoBuscarGrupo->return->idOrganizacion->nombre.'</option>'; 
				 	for ($i=0;$i<$canOrga;$i++)
					{
						if(($resultadoListaOrganizacion->return[$i]->id)!=($resultadoBuscarGrupo->return->idOrganizacion->id)){
							echo '<option value="'.$resultadoListaOrganizacion->return[$i]->id.'">'.$resultadoListaOrganizacion->return[$i]->nombre.'</option>';
						}
					}
				 }
				 else{?>
					 <option value="" style="display:none">Seleccionar:</option> 
				 <?php
				 		for ($i=0;$i<$canOrga;$i++)
						{
							echo '<option value="'.$resultadoListaOrganizacion->return[$i]->id.'">'.$resultadoListaOrganizacion->return[$i]->nombre.'</option>';
						}
					 
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
     <div class="col-md-12" align="center"><button class="btn" id="editar" name="editar" type="submit">Editar</button></div>
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