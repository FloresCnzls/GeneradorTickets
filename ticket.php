<?php 
session_start();  
if(isset($_SESSION['id']) && $_SESSION['privilegio'] != 4){
    header("location:inicio.php");
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
	<h2>Generar Ticket</h2><form role="form" name="ticket" action="php/crearticket.php" method="post" enctype="multipart/form-data">
	
    <div class="form-group">
		<input  type="hidden" class="form-control" id="idcliente" name="idcliente" value="<?php echo $_SESSION['id']?>" >
	  </div>
      <div class="form-group">
		<input  type="hidden" class="form-control" id="username" name="username" value="<?php echo $_SESSION['username']?>" >
	  </div>
	  <div class="form-group">
		<label for="fecha">Fecha de Ocurrencia</label>
		<input type="Date" class="form-control" id="fecha" name="fecha" placeholder="Ingrese fecha de ocurrencia" required>
	  </div>
	  <div class="form-group">
		<label for="descripcion">Descripcion del problema</label>
		<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Breve descripcion"required>
	  </div>
	  <div class="form-group">
		<label for="area">Área</label>
		<input type="text" class="form-control" id="area" name="area" placeholder="Área" required>
	  </div>
	  <div class="form-group">
		<input  type="hidden" class="form-control" id="comentario" name="comentario" value="-" >
	  </div>
	  <div class="form-group">
		<input  type="hidden" class="form-control" id="estado" name="estado" value="No Asignado" >
	  </div>
	  <div class="form-group">
		<input  type="hidden" class="form-control" id="naemple" name="naemple" value="-" >
	  </div>
			  <button type="submit" class="btn btn-default">Generar Ticket</button>  
	</form>
	<a class="btn btn-default" href="inicio.php">Volver</a>
	</div>
	</div>
	</div>
	<script src="js/valida_registro.js"></script> 

</body>
</html>