<?php 
session_start();  
$con=mysqli_connect('localhost','root','','ceapr');
if(isset($_SESSION['id']) && $_SESSION['privilegio'] != 2){
    header("location:inicio.php");
}
	?>  
<html>
	<head>
		<title>Asignar ticket</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<body>
<div class="container">
<div class="row">
<div class="col-md-6">
<?php 
$id = $_GET['id'];       
$sql= "SELECT * from user where id=$id"; 
$result = mysqli_query($con,$sql);
while($mostrar=mysqli_fetch_array($result)){

?>
<form class="caja" role="form" name="update" action="php/asigticket.php" method="post">
<div class="form-group">
<label for="username">Tickets</label>
		    <select name="idticket" id="idticket">
<?php
		$consulta= "Select * from tickets where estado!='Asignado'";
		$ejecutar=mysqli_query($con,$consulta) or die (mysqli_error($con));
        ?>
        <?php
			foreach($ejecutar as $opciones):?>
             <div class="form-group">
			<option id="idticket" name="idticket" value="<?php echo $opciones['idticket']?>"><?php echo $opciones['descripcion']?></option>
			<?php endforeach ?>

			</select>
		  </div>
		<div class="form-group">
		    <input   type="hidden" id="fg0" type="text" class="form-control" id="idemple" name="idemple" value="<?php echo $id; ?>" >
		  </div>
		  <div class="form-group">
		    <label for="username">Nombre del Empleado</label>
		    <input  id="fg" type="text" class="form-control" id="naemple" name="naemple" value="<?php echo $mostrar['username']; ?>" readonly>
		  </div>
          <div class="form-group">
		    
		    <input type="hidden" id="fg" type="text" class="form-control" id="estado" name="estado" value="Asignado">
		  </div>
		  <button type="submit" class="btn btn-default">Listo</button>
		</form>
 <br>
 <?php 
	}
	 ?> 
	<a class="btn btn-default" href="asignar.php">Volver</a>
	</div>
	</div>
	</div>
   
		<script src="js/valida_login.js"></script>
	</body>
</html>