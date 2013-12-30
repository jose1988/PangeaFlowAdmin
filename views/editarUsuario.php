<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<title>Pangea Flow</title>

	
	<!-- styles -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	 	<link href="../css/footable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="../css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="../css/footable.paginate.css" rel="stylesheet" type="text/css" />    
	<link href="../css/estiloVerificacionNombre.css" rel="stylesheet">
	
	
</head>
<?php 
	$segundoN="";
	$segundoA="";
	$cedula="";
	$rif="";
	$telfP="";
	$telfO="";
	$descripcion="";
	$mail="";
	$fax="";
	if(isset($rowUsuario->return->segundoNombre)){
	$segundoN=$rowUsuario->return->segundoNombre;
	}
	if(isset($rowUsuario->return->segundoApellido)){
	$segundoA=$rowUsuario->return->segundoApellido;
	}
	if(isset($rowUsuario->return->rif)){
	$rif=$rowUsuario->return->rif;
	}
	if(isset($rowUsuario->return->mail)){
	$mail=$rowUsuario->return->mail;
	}
	if(isset($rowUsuario->return->fax)){
	$fax=$rowUsuario->return->fax;
	}
	if(isset($rowUsuario->return->telefonosPersonal)){
	$telfP=$rowUsuario->return->telefonosPersonal;
	}
	if(isset($rowUsuario->return->telefonosOficina)){
	$telfO=$rowUsuario->return->telefonosOficina;
	}
	if(isset($rowUsuario->return->descripcion)){
	$descripcion=$rowUsuario->return->descripcion;
	}

?>	
<body>
  <form id="formulario" method="post">
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
          <li><a href="clasificacionRol">Clasificación Rol</a></li>
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
  
<div class="col-md-2" align="center">
        <ul class="nav nav-stacked nav-tabs-justified">
 			 <li><a href="usuario.php">Atrás</a></li>
			 <li><a href="crearUsuario.php">Crear</a></li>
 			 <li><a href="restaurarUsuario">Restaurar</a></li>
			 </ul>
       </div>
	   	<div class="col-md-2">
        </div>
         <div class="col-md-4">  
        <table width="100%" class="table-striped table-bordered table-condensed">
			 <tr>
			 <th width="70%">Primer Nombre</th>
				 <td><input type="text" name="primernombre" id="primernombre" maxlength="19" size="30" value="<?php echo $rowUsuario->return->primerNombre; ?>" required></td>
		     </tr>
			 <tr>
			 <th width="70%">Segundo Nombre</th>
				 <td><input type="text" name="segundonombre" id="segundonombre" maxlength="19" size="30" value="<?php echo $segundoN; ?>"  ></td>
		     </tr>
			  <tr>
			 <th width="70%">Primer Apellido</th>
				 <td><input type="text" name="primerapellido" id="primerapellido" maxlength="19" size="30" value="<?php echo $rowUsuario->return->primerApellido; ?>"  required></td>
		     </tr>
			 <tr>
			 <th width="70%">Segundo Apellido</th>
				 <td><input type="text" name="segundoapellido" id="segundoapellido" maxlength="19" size="30" value="<?php echo $segundoA; ?>"  ></td>
		     </tr>

			 <tr>
			 <th width="70%">Cédula</th>
				 <td><input type="text" name="cedula" id="cedula" maxlength="19" size="30" value="<?php echo $rowUsuario->return->cedula; ?>"  required></td>
			 </tr>
              <tr>
			 <th width="70%">RIF</th>
				 <td><input type="text" name="rif" id="rif" maxlength="19" size="30" value="<?php echo $rif; ?>" ></td>		
			 </tr>
			 <th width="70%">Teléfono Personal</th>
				 <td><input type="text" name="personal" id="personal" maxlength="19" size="30" value="<?php echo $telfP; ?>" ></td>		
			 </tr>
			 <th width="70%">Teléfono de Oficina</th>
				 <td><input type="text" name="oficina" id="oficina" maxlength="19" size="30" value="<?php echo $telfO; ?>" ></td>		
			 </tr>
			 <th width="70%">Correo</th>
				 <td><input type="text" name="correo" id="correo" maxlength="19" size="30" value="<?php echo $mail; ?>" >
				 <div id="Info2" style="float:right"></div>
				 </td>		
			 </tr>
			 <th width="70%">Fax</th>
				 <td><input type="text" name="fax" id="fax" maxlength="19" size="30" value="<?php echo $fax; ?>" ></td>		
			 </tr>
			 <th width="70%">Dirección Personal</th>
				 <td><textarea name="direccionp" id="direccionp" maxlength="149"  required><?php echo $rowUsuario->return->direccionPersonal; ?></textarea></td>		
			 </tr>
			 <th width="70%">Dirección de Oficina</th>
				 <td><textarea name="direcciono" id="direcciono" maxlength="149" required><?php echo $rowUsuario->return->direccionOficina; ?></textarea></td>		
			 </tr>
			  <th width="70%">Descripción</th>
				 <td><textarea name="descripcion" id="descripcion" maxlength="149"  ><?php echo $descripcion; ?></textarea></td>		
			 </tr>
			 <tr>
			 <th width="70%">Estado</th>
				 <td><input type="text" name="estado" id="estado" maxlength="19" size="30" value="<?php echo $rowUsuario->return->estado; ?>" required="required"></td>		
			 </tr>
			  <tr>
			 <th width="70%">Usuario</th>
				 <td><input type="text" name="usuario" id="usuario" maxlength="19" size="30" value="<?php echo $rowUsuario->return->id; ?>" required="required">
				 <div id="Info" style="float:right"></div>
				 </td>		
			 </tr>
			  <tr>
			 <th width="70%">Contraseña</th>
				 <td><input type="password" name="contrasena" id="contrasena" maxlength="19" size="30" value="<?php echo $rowUsuario->return->clave; ?>" onkeyup="muestra_seguridad_clave(this.value, this.form)" pattern="[A-Za-z.0-9ñÑ]{6,34}" title="Debe agregar mínimo 6 letras, puntos o números" required/>
				            <input id="fortaleza" name="fortaleza" type="text" size="10" style="border: 0px; text-decoration:italic;text-align:center;display:none" onfocus="blur()">

				 <div id="contra" style="float:right"></div>		
				 </td>	
			</tr>
			 <tr> 
			  <tr>
			 <th width="70%">Confirmar Contraseña</th>
				 <td><input type="password" name="contrasena_c" id="contrasena_c" maxlength="19" size="30" value="<?php echo $rowUsuario->return->clave; ?>" pattern="[A-Za-z.0-9ñÑ]{6,34}" title="Debe repetir la contraseña" required/>
				  <div id="contra1" style="float:right"></div>
				 </td>		
			 </tr>
			 <tr> 
			 <th width="70%">Clasificación de Usuario</th>
				 <td><select id="clasificacion" name="clasificacion">
                  <option value="<?php  echo $rowUsuario->return->idClasificacionUsuario->id; ?>" ><?php echo $rowUsuario->return->idClasificacionUsuario->nombre; ?></option> 
				 <?php
				 	for ($i=0;$i<$cantClaUsuario;$i++)
					{
					if($rowClasiUsuario->return[$i]->id!=$rowUsuario->return->idClasificacionUsuario->id){
						echo '<option value="'.$rowClasiUsuario->return[$i]->id.'">'.$rowClasiUsuario->return[$i]->nombre.'</option>';
					}
					}
				  ?>
                 </select></td>
			 </tr>
			 <tr> 
			 <th width="70%">Organización</th>
				 <td><select id="organizacion" name="organizacion" >
                  <option value="<?php  echo $rowUsuario->return->idOrganizacion->id; ?>" ><?php echo $rowUsuario->return->idOrganizacion->nombre; ?></option> 
				 <?php
				 	for ($i=0;$i<$cantOrganizacion;$i++)
					{
					if($rowUsuario->return->idOrganizacion->id!=$rowOrganizacion->return[$i]->id){
					echo '<option value="'.$rowOrganizacion->return[$i]->id.'">'.$rowOrganizacion->return[$i]->nombre.'</option>';
					}
					}
				  ?>
                 </select></td>
			 </tr>
			  <tr> 
			 <th width="70%">Skin</th>
				 <td><select id="skin" name="skin" >
                  <option value="<?php  echo $rowUsuario->return->idSkin->id; ?>" ><?php echo $rowUsuario->return->idSkin->nombre; ?></option> 
				 <?php
				 	for ($i=0;$i<$cantSkin;$i++)
					{
					if($rowUsuario->return->idSkin->id!=$rowSkin->return[$i]->id){
					echo '<option value="'.$rowSkin->return[$i]->id.'">'.$rowSkin->return[$i]->nombre.'</option>';
					}
					}
				  ?>
                 </select></td>
			 </tr>
			 
			 <tr>
			 <th width="70%">Habilitado</th>
				<td><input type="checkbox" name="borrado" id="borrado"  checked> </td>
			 </tr>
	</table><br>
     <div class="col-md-9" align="center"><button class="btn" id="modificar" name="modificar" type="submit">Modificar</button></div>
</form>  
    </div>
<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-2.0.3.js" ></script> 
 
<script type="text/javascript">
 $(document).ready(function() {
 
 var nombreTiene=document.forms.formulario.usuario.value;
 
 <!-- Codigo para verificar si el nombre del usuario ya existe --> 
   $('#usuario').blur(function(){
	   if($(this).val()!="" && $(this).val()!=nombreTiene){
		           $('#Info').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
		   
        var nombre = $(this).val();        
        var dataString = 'nombre='+nombre;
        $.ajax({
            type: "POST",
            url: "../ajax/chequeoNombreUsuario.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });  
	}	
 });
 

<!-- Codigo para verificar las contraseñas --> 
   $('#contrasena_c').blur(function(){
	 
	 document.getElementById('fortaleza').style.display='none';
	   
        if($(this).val()!="" && document.forms.formulario.contrasena.value!=""){
			$('#contra').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
			$('#contra1').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);

		}

        var contrasena_c = $(this).val();        
        var dataString = 'contrasena_c='+contrasena_c;
		var con= document.forms.formulario.contrasena.value;

        $.ajax({
            type: "POST",
           	url: "../ajax/chequeoContrasena.php?contra="+con+"",
            data: dataString,
            success: function(data) {
                $('#contra').fadeIn(1000).html(data);
				$('#contra1').fadeIn(1000).html(data);
            }
        });
    });
	
	$('#contrasena').blur(function(){
		document.getElementById('fortaleza').style.display='none';
		
        if($(this).val()!="" && document.forms.formulario.contrasena_c.value!=""){
			$('#contra').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
			$('#contra1').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);

		}

        var contrasena = $(this).val();        
        var dataString = 'contrasena='+contrasena;
		var con= document.forms.formulario.contrasena_c.value;
		
        $.ajax({
            type: "POST",
            url: "../ajax/chequeoContrasena.php?contra="+con+"",
            data: dataString,
            success: function(data) {
                $('#contra').fadeIn(1000).html(data);
				$('#contra1').fadeIn(1000).html(data);
            }
        });
    });  
  <!-- Codigo para verificar si el Correo lleva el formato correcto --> 
		$('#correo').blur(function(){
			if($(this).val()!=""){
				$('#Info2').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
			}
			var correo = $(this).val();
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

 <!-- Codigo para verificar la fortaleza de la contraseña --> 

var numeros="0123456789";
var letras="abcdefghyjklmnñopqrstuvwxyz";
var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_mayusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function seguridad_clave(clave){
	var seguridad = 0;
	if (clave.length!=0){
		if (tiene_numeros(clave) && tiene_letras(clave)){
			seguridad += 30;
		}
		if (tiene_minusculas(clave) && tiene_mayusculas(clave)){
			seguridad += 30;
		}
		if (clave.length >= 4 && clave.length <= 5){
			seguridad += 10;
		}else{
			if (clave.length >= 6 && clave.length <= 8){
				seguridad += 30;
			}else{
				if (clave.length > 8){
					seguridad += 40;
				}
			}
		}
	}
	return seguridad				
}	

function muestra_seguridad_clave(clave,formulario){
	seguridad=seguridad_clave(clave);
	document.getElementById('fortaleza').style.color='#FFFFFF'; 
	if(seguridad>0 && seguridad<=40){
		 document.getElementById('fortaleza').style.display='block'; 
		document.getElementById('fortaleza').style.backgroundColor="#2ECCFA"; 
		formulario.fortaleza.value="Debil";
		}else if(seguridad>40 && seguridad<=70){
			formulario.fortaleza.value="Medio";
			document.getElementById('fortaleza').style.backgroundColor="#5882FA"; 
		}else if(seguridad>70){
			formulario.fortaleza.value="Fuerte";
				document.getElementById('fortaleza').style.backgroundColor="#0404B4"; 
		}else{
				document.getElementById('fortaleza').style.display='none'; 
			}		
}
 </script>  

</body>
</html>