<?php
if(!isset($rowRol->return)){
	 echo '<script language="javascript"> window.location = "../views/index.php"; </script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pangea Flow</title>

	<!-- javascript -->
	
	<script type="text/javascript" src="../js/jquery-2.0.3.js"></script>
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
   </div>
      <div class="col-md-2" align="center">
        <ul class="nav nav-stacked nav-tabs-justified">
 			 <li><a href="../views/index.php">Atrás</a></li>
  			 <li><a href="crearRol.php">Crear</a></li>
 			 <li><a href="restaurarRol.php">Restaurar</a></li>
			 </ul>
       </div>
       
        <div class="col-md-1">
        </div>
        
        <div class="col-md-8">
		 <?php
	if($cantRol == 0){
    ?>
    <div class="well well-small alert alert-block" align="center">
    		<h2 style="color:#666">Atención</h2>
    		<h4>No existen registros en rol</h4>
    	</div>
     <?php 
	}else{
	
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
	  if($cantRol==1){
			echo '<td style="text-align:center" width="15%">'.$rowRol->return->id.'</td>';
			echo '<td style="text-align:center" width="20%">'.$rowRol->return->nombre.'</td>';
			echo '<td style="text-align:center" width="20%">'.$rowRol->return->descripcion.'</td>';
			echo '<td style="text-align:center" width="15%"><a href="editarRol.php?id='.$rowRol->return->id.'"><button class="btn"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button> </td>';
			echo '<td style="text-align:center" width="16%"><a href="eliminarRol.php?id='.$rowRol->return->id.'"> <button class="btn" type="button"  name="eliminar"> <span class="add-on"><i class="icon-trash"></i></span> Eliminar</button> </td>';
			echo '<td style="text-align:center" width="13%"><a href="verRol.php?id='.$rowRol->return->id.'"> <button class="btn"> <span class="add-on"><i class="icon-eye-open"></i></span> Ver</button> </td>';
			echo '</tr>';
	  }elseif($cantRol>1){      
		for ($i=0;$i<$cantRol;$i++)
			{
			echo '<td  width="15%">'.$rowRol->return[$i]->id.'</td>';
			echo '<td  width="20%">'.$rowRol->return[$i]->nombre.'</td>';
			echo '<td width="20%">'.$rowRol->return[$i]->descripcion.'</td>';
			echo '<td style="text-align:center" width="15%"><a href="editarRol.php?id='.$rowRol->return[$i]->id.'"><button class="btn"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button> </td>';
			echo '<td style="text-align:center" width="16%"><a href="eliminarRol.php?id='.$rowRol->return[$i]->id.'"> <button class="btn" type="button"  name="eliminar"> <span class="add-on"><i class="icon-trash"></i></span> Eliminar</button> </td>';
			echo '<td style="text-align:center" width="13%"><a href="verRol.php?id='.$rowRol->return[$i]->id.'"> <button class="btn"> <span class="add-on"><i class="icon-eye-open"></i></span> Ver</button> </td>';
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