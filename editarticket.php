<?php 
$con=mysqli_connect('localhost','root','','ceapr');
session_start();
if(isset($_SESSION['id']) && $_SESSION['privilegio'] != 3){
    header("location:inicio.php");
}
	?>  
	<html>
	<head>
		<title>Actualizar Datos</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<body>
<div class="container">
<div class="row">
<div class="col-md-6">
<h2>Editar comentario</h2>
<?php 
$id = $_GET['id'];       
$sql= "SELECT * from tickets where idticket =$id"; 
$result = mysqli_query($con,$sql);
while($mostrar=mysqli_fetch_array($result)){

?>
<form class="caja" role="form" name="update" action="php/editart.php" method="post">
		<div class="form-group">
		    <input  type="hidden" id="fg0" type="text" class="form-control" id="idticket" name="idticket" value="<?php echo $mostrar['idticket']; ?>" >
		  </div>
		  <div class="form-group">
		    <label for="username">Nombre del cliente</label>
		    <input  id="fg" type="text" class="form-control" id="comentario" name="comentario" value="<?php echo $mostrar['username']; ?>" readonly>
		  </div>
		  <div class="form-group">
		    <label for="descripcion">Descripcion</label>
		    <input  id="fg" type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $mostrar['descripcion']; ?>" readonly>
		  </div>
		  <div class="form-group">
		    <label for="username">Área</label>
		    <input  id="fg" type="text" class="form-control" id="area" name="area" value="<?php echo $mostrar['area']; ?>" readonly>
		  </div>
		  <div class="form-group">
		    <label for="username">Comentario</label>
		    <input  id="fg" type="text" class="form-control" id="comentario" name="comentario" value="<?php echo $mostrar['comentario']; ?>" required>
		  </div>
		  <button type="submit" class="btn btn-default">Listo</button>
		</form>
		<a class="btn btn-default" href="crearcomen.php">Volver</a>
 <br>
 <?php 
	}
	 ?> 
	 </body>
	 </html>