<?php 
session_start();  
if(isset($_SESSION['id']) && $_SESSION['privilegio'] != 1){
    header("location:inicio.php");
}
if(!isset($_SESSION['id']) && $_SESSION['privilegio'] != 1){
    header("location:index.php");
}
	?>  
<html>
	<head>
		<title>Crear Usuario</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	</head>
	<body>
	<div class="container">
	<div class="row">
	<div class="col-md-6">
	<h2>Crear Usuario nuevo</h2>
	<form role="form" name="registro" action="php/registro.php" method="post" enctype="multipart/form-data">
	  <div class="form-group">
		<label for="username">Nombre de usuario</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
	  </div>
	  <div class="form-group">
		<label for="fullname">Nombre Completo</label>
		<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
	  </div>
	  <div class="form-group">
		<label for="email">Correo Electronico</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
	  </div>
	  <div class="form-group">
		<label for="password">Contrase&ntilde;a</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
	  </div>
	  <div class="form-group">
		<label for="confirm_password">Confirmar Contrase&ntilde;a</label>
		<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contrase&ntilde;a">
	  </div>       
	  <div class="form-group">
		<label for="privilegio">Privilegio del usuario</label>
		<input type="text" class="form-control" id="privilegio" name="privilegio" placeholder="Ingrese privilegio"  min="1" max="4">
	  </div>    
			  <button type="submit" class="btn btn-default">Registrar</button>
			  
	</form>
	<a class="btn btn-default" href="inicio.php">Volver</a>
	</div>
	</div>
	</div>
	<script src="js/valida_registro.js"></script> 

</body>
</html>