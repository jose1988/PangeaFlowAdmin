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
 			 <li><a href="#">Atrás</a></li>
  			 <li><a href="../pages/crearGrupo.php">Crear</a></li>
 			 <li><a href="../pages/restaurarGrupo.php">Restaurar</a></li>
			 </ul>
       </div>
 
        <div class="col-md-1">
        </div>
        
        <div class="col-md-8">
        <?php 
	   	if(!isset($resultadoListaGrupo->return)){
	   ?>
       		<div class="well well-small alert alert-block" align="center">
   				<h2 style="color:#666">Atención</h2>
    			<h4>No Existen Registros en Grupo</h4>
   			</div>
            
         <?php }
		 	else{
		 ?>
        <table width="100%" class="footable table-hover" data-page-size="7">
      		<thead bgcolor="#B9B9B9">
				<tr>
					<th style="width:10%; text-align:center">Id</th>
                    <th style="width:20%; text-align:center">Nombre</th>
                    <th style="width:25%; text-align:center">Descripción</th>
                    <th style="width:15%; text-align:center">Editar</th>
                    <th style="width:15%; text-align:center">Eliminar</th>
                    <th style="width:15%; text-align:center">Ver</th>  
				</tr>
			</thead>
  <tbody>
      <?php
	  if(count($resultadoListaGrupo->return)>1){   
		for ($i=0;$i<count($resultadoListaGrupo->return);$i++){
			echo '<tr>';
			echo '<td style="text-align:center" width="10%">'.$resultadoListaGrupo->return[$i]->id.'</td>';
			echo '<td width="20%">'.$resultadoListaGrupo->return[$i]->nombre.'</td>';
			echo '<td width="25%">'.$resultadoListaGrupo->return[$i]->descripcion.'</td>';
			echo '<td style="text-align:center" width="15%"><a href="../pages/editarGrupo.php?id='.$resultadoListaGrupo->return[$i]->id.'"><button class="btn">Editar</button></td>';
			echo '<td style="text-align:center" width="15%"><a href="../pages/eliminarGrupo.php?id='.$resultadoListaGrupo->return[$i]->id.'"><button class="btn">Eliminar</button></td>';
			echo '<td style="text-align:center" width="15%"><a href="../pages/verGrupo.php?id='.$resultadoListaGrupo->return[$i]->id.'"><button class="btn">Ver</button></td>';
			echo '</tr>';
			}
	  }
	  else{
		  	echo '<tr>';
			echo '<td style="text-align:center" width="10%">'.$resultadoListaGrupo->return->id.'</td>';
			echo '<td width="20%">'.$resultadoListaGrupo->return->nombre.'</td>';
			echo '<td width="25%">'.$resultadoListaGrupo->return->descripcion.'</td>';
			echo '<td style="text-align:center" width="15%"><a href="../pages/editarGrupo.php?id='.$resultadoListaGrupo->return->id.'"><button class="btn">Editar</button></td>';
			echo '<td style="text-align:center" width="15%"><a href="../pages/eliminarGrupo.php?id='.$resultadoListaGrupo->return->id.'"><button class="btn">Eliminar</button></td>';
			echo '<td style="text-align:center" width="15%"><a href="../pages/verGrupo.php?id='.$resultadoListaGrupo->return->id.'"><button class="btn">Ver</button></td>';
			echo '</tr>';
		  
		  }
		?>
		</tbody>	
	</table>
	<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>
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