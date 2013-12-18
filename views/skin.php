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
<img src="../images/LOGOTIPO-FINAL-7.jpg" width="900" height="130" />
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="../images/LOGOTIPO-FINAL-7.jpg" width="200" height="30" /></a>
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
 			 <li class="active"><a href="#">Atras</a></li>
  			 <li><a href="#">Crear</a></li>
 			 <li><a href="#">Restaurar</a></li>
			 </ul>
             
             </div>
             <div class="col-md-1"></div>
      
      <div class="col-md-8">
      
     <?php
					if($regSk!=0){
					?>
						<table class="footable table table-striped table-bordered"  align="center" data-page-size="7">
                        	<thead bgcolor="#B9B9B9">
								<tr>
								   <th style="width:10%; text-align:center">Id</th>
                                   <th style="width:30; text-align:center">Nombre</th>
                                   <th style="width:30%; text-align:center">Borrado</th>
                                  
                                   <th style="width:15%; text-align:center">Editar</th>
                                   <th style="width:15%; text-align:center">Eliminar</th>  
								 </tr>
							  </thead>
                             <tbody>
                             	<tr>
								<?php
								if($regSk>1){
									$j=0;
								    while($j<$regSk){ ?>
                                  	<td style="text-align:center"> <?php echo $skin->return[$j]->id?></td>
                                  	<td style="text-align:center">  <?php echo $skin->return[$j]->nombre ?></td>
                                  	<td style="text-align:center"> <?php echo $skin->return[$j]->borrado ?></td>
                                    
                                    <td style="text-align:center"><button type="button" class="btn">Editar</button></td>
                                    <td style="text-align:center"><button type="button" class="btn">Eliminar</button></td>
                               </tr>
                                
                               <?php
									 $j++;
									 } 
									 }else{  ?>
								  		<td style="text-align:center"> <?php echo $skin->return->id ?></td>
                                  		<td style="text-align:center">  <?php echo $skin->return->nombre ?></td> 
                                  		<td style="text-align:center"> <?php echo $skin->return->borrado ?></td>
                                </tr>
								<?php		 
									 }
								   }   else { ?>
										  <div class="alert alert-block" align="center">
   										  <h2 style="color:rgb(255,255,255)" align="center">Atención</h2>
    									  <h4 align="center"> No hay Skins en el sistema </h4>
   			    					 </div> 
									 <?php
									 }
							     ?>
                                 
                              </tbody>
                            </table>
	<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>
    </div>
      </div>
      </div>

</body>
<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
 
  <script type="text/javascript">
    $(function() {
      $('table').footable();
    });
  </script>
</html>