<?php 
session_start();  
$con=mysqli_connect('localhost','root','','ceapr');
if(isset($_SESSION['id']) && $_SESSION['privilegio'] != 1){
    header("location:inicio.php");
}
	?>  
<html>
	<head>
		<title>Eliminar Datos</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<body>
<div class="container">
<div class="row">
<div class="col-md-6">
<?php 
 $sql="SELECT * from user  where id =". $_GET['id'];
 $result=mysqli_query($con,$sql);
   while($mostrar=mysqli_fetch_array($result)){
	 ?>
		<h2>Actualizar Datos</h2>
		<form class="caja" role="form" name="delete" action="php/Update.php" method="post">
		<div class="form-group">
		    <input type="hidden" id="fg0" type="text" class="form-control" id="id" name="id" value="<?php  echo $mostrar['id']?>" required>
		  </div>
          <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input  id="fg2" type="text" class="form-control" id="username" name="username" value="<?php  echo $mostrar['username']?>" required>
		  </div>
		  <div class="form-group">
		    <label for="username">Nombre completo</label>
		    <input  id="fg2" type="text" class="form-control" id="fullname" name="fullname" value="<?php  echo $mostrar['fullname']?>" required>
		  </div>
		  <div class="form-group">
		    <label for="username">Email</label>
		    <input  id="fg2" type="text" class="form-control" id="email" name="email" value="<?php  echo $mostrar['email']?>" required>
		  </div>
		  <div class="form-group">
		    <label for="username">Privilegio</label>
		    <input  id="fg2" type="number"  min="1" max="4" class="form-control" id="privilegio" name="privilegio" value="<?php  echo $mostrar['privilegio']?>" onkeydown="return false">
		  </div>
		  <div class="form-group">
		    <label for="username">Contraseña</label>
		    <input  id="fg2" type="password" class="form-control" id="password" name="password" value="<?php  echo $mostrar['password']?>" required>
		  </div>
		  <button type="submit" class="btn btn-default">Listo</button>
		</form>
		<?php }
	 ?>
		<a class="btn btn-default" href="inicio.php">Volver</a>
</div>
</div>
</div>
   
		<script src="js/valida_login.js"></script>
	</body>
</html>