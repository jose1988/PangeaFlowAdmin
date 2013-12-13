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
 			 <li><a href="#">Atrás</a></li>
  			 <li><a href="../pages/crearOrganizacion.php">Crear</a></li>
 			 <li><a href="../pages/restaurarOrganizacion.php">Restaurar</a></li>
			 </ul>
       </div>
        <div class="col-md-1">
        </div>
        
        <div class="col-md-8">
        <?php 
			if(!isset($resultadoListaOrganizacion->return)){
		?>
        	<div class="alert alert-block" align="center">
   				<h2 style="color:#666">Atención</h2>
    			<h4>No Existen Registros en Organización</h4>
   			</div>
        <?php }
			else{
		?>   
        <table width="100%" class="footable table-hover" data-page-size="7">
      		<thead align="center">
				<tr>
				  <th data-class="expand" data-sort-initial="true" data-type="numeric">
					<span>Id</span>
				  </th>
				  <th data-sort-ignore="true">
					<span>Nombre</span>
				  </th>
				  <th data-hide="phone" data-sort-ignore="true">
					Ciudad
				  </th>
				  <th data-hide="phone,mediatablet" data-sort-ignore="true">
                  	Editar 
				  </th>
				  <th data-hide="phone,mediatablet" data-sort-ignore="true">
					Eliminar 
				  </th>
          		 <th data-hide="phone,mediatablet" data-sort-ignore="true">
					Ver 
				  </th>
				</tr>
	 </thead>
  <tbody>
      <?php
	  if(count($resultadoListaOrganizacion->return)>1){   
		for ($i=0;$i<count($resultadoListaOrganizacion->return);$i++){
			echo '<tr>';
			echo '<td width=10%">'.$resultadoListaOrganizacion->return[$i]->id.'</td>';
			echo '<td width="20%">'.$resultadoListaOrganizacion->return[$i]->nombre.'</td>';
			echo '<td width="25%">'.$resultadoListaOrganizacion->return[$i]->ciudad.'</td>';
			echo '<td width="15%"><a href="../pages/editarOrganizacion.php?id='.$resultadoListaOrganizacion->return[$i]->id.'"><button class="btn">Editar</button></td>';
			echo '<td width="15%"><a href="../pages/eliminarOrganizacion.php?id='.$resultadoListaOrganizacion->return[$i]->id.'"><button class="btn">Eliminar</button></td>';
			echo '<td width="15%"><a href="../pages/verOrganizacion.php?id='.$resultadoListaOrganizacion->return[$i]->id.'"><button class="btn">Ver</button></td>';	
			echo '</tr>';
			}
	  }
	  else{
		  	echo '<tr>';
			echo '<td width=10%">'.$resultadoListaOrganizacion->return->id.'</td>';
			echo '<td width="20%">'.$resultadoListaOrganizacion->return->nombre.'</td>';
			echo '<td width="25%">'.$resultadoListaOrganizacion->return->ciudad.'</td>';
			echo '<td width="15%"><a href="../pages/editarOrganizacion.php?id='.$resultadoListaOrganizacion->return->id.'"><button class="btn">Editar</button></td>';
			echo '<td width="15%"><a href="../pages/eliminarOrganizacion.php?id='.$resultadoListaOrganizacion->return->id.'"><button class="btn">Eliminar</button></td>';
			echo '<td width="15%"><a href="../pages/verOrganizacion.php?id='.$resultadoListaOrganizacion->return->id.'"><button class="btn">Ver</button></td>';	
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