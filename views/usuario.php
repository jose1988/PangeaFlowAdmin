<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

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
   <div class="row">
          <div class="col-md-2" align="center">
             <ul class="nav nav-pills nav-stacked">
 			 <li class="active"><a href="#">Atrás</a></li>
  			 <li><a href="#">Crear</a></li>
 			 <li><a href="#">Restaurar</a></li>
			 </ul>
       </div>
        
        <div class="col-md-9">
		 <?php
//		 $cantClasifRol = 0;
	if($cantUsuarios == 0){
    ?>
    <div class="alert alert-warning" align="center">
   			<h2 style="color:rgb(255,255,255)"> Atención</h2>
    <h4>No existen registros en Usuario</h4>
    </div>
     <?php 
	}else{
	
	?>
		<table width="100%" class="footable table-striped table-hover" data-page-size="5">
      <thead>
				<tr>
				  <th data-class="expand" data-sort-initial="true" data-type="numeric">
					<span>Id</span>
				  </th>
				  <th data-hide="phone" data-sort-ignore="true">
					Primer Nombre
				  </th>
                    <th data-hide="phone" data-sort-ignore="true">
					Primer Apellido
				  </th>
				  <th data-hide="phone,mediatablet" data-sort-ignore="true">
					<span class="add-on"> <i class="icon-pencil"></i> </span> Editar 
				  </th>
				  <th data-hide="phone,mediatablet" data-sort-ignore="true">
				<span class="add-on"><i class="icon-trash"></i></span> Eliminar 
				  </th>
          		 <th data-hide="phone,mediatablet" data-sort-ignore="true">
				<span class="add-on"><i class="icon-eye-open"></i></span> Ver 
				  </th>
				</tr>
	 </thead>
  <tbody>
      <?php 
	  if($cantUsuarios==1){
			echo '<td width="15%">'.$rowUsuario->return->id.'</td>';
			echo '<td width="20%">'.$rowUsuario->return->primerNombre.'</td>';
			echo '<td width="20%">'.$rowUsuario->return->primerApellido.'</td>';
			echo '<td width="15%"><a href="editarproducto.php?id='.$rowUsuario->return->id.'"><button class="btn btn-primary"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button> </td>';
			echo '<td width="16%"><a href="eliminarproducto.php?id='.$rowUsuario->return->id.'"> <button class="btn btn-primary" type="button"  name="eliminar"> <span class="add-on"><i class="icon-trash"></i></span> Eliminar</button> </td>';
			echo '<td width="13%"><a href="verproducto.php?id='.$rowUsuario->return->id.'"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-eye-open"></i></span> Ver</button> </td>';
			echo '</tr>';
	  }elseif($cantUsuarios>1){      
		for ($i=0;$i<$cantUsuarios;$i++)
			{
			echo '<td width="15%">'.$rowUsuario->return[$i]->id.'</td>';
			echo '<td width="20%">'.$rowUsuario->return[$i]->primerNombre.'</td>';
			echo '<td width="20%">'.$rowUsuario->return[$i]->primerApellido.'</td>';
			echo '<td width="15%"><a href="editarClasifRol.php?id='.$rowUsuario->return[$i]->id.'"><button class="btn btn-primary"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button> </td>';
			echo '<td width="16%"><a href="eliminarClasifRol.php?id='.$rowUsuario->return[$i]->id.'"> <button class="btn btn-primary" type="button"  name="eliminar"> <span class="add-on"><i class="icon-trash"></i></span> Eliminar</button> </td>';
			echo '<td width="13%"><a href="verClasifRol.php?id='.$rowUsuario->return[$i]->id.'"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-eye-open"></i></span> Ver</button> </td>';
			echo '</tr>';
			}
	    }
		?>
	</tbody>	
</table>
	<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>
    </div>
	 <?php 
	}
	
	?>
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