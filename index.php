<?php 
session_start();
 if(isset($_SESSION['id'])){
    header("location:inicio.php");
    }
?>
<html>
	<head>
		<title> INICIO DE SESION </title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	</head>
	<body>
	<?php 
 include "php/navbar.php"; 
?>
<div class="container">
<div class="row">
<div class="col-md-6">

		<h2>INICIAR SESION</h2>
		<form role="form"  id="login" name="login" action="php/login.php" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario o email</label>
		    <input align="center" type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" required>
		  </div>

		  <button type="submit" id="enviar" class="btn btn-default">Acceder</button>
		</form>
</div>
</div>
</div>
	</body>
</html>