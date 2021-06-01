<?php 
session_start();  
$con=mysqli_connect('localhost','root','','ceapr');
if(isset($_SESSION['id']) && $_SESSION['privilegio'] != 2){
    header("location:inicio.php");
}
	?>  
<html>
	<head>
		<title>Asignar Ticket</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	</head>
	<body>
	<div class="container">
	<div class="row">
	<div class="col-md-6">
	<h2 id="act">Asignar tickets a empleados</h2>
<table border="1" id="actividades">
		<tr style="color: black">
        <td colspan="1">ID Empleado</td>
			<td colspan="1">Nombre Completo</td>
			<td colspan="1">Nombre Usuario</td>
			<td colspan="1">Accion</td>
		</tr>
        <?php
        //$com = $_SESSION['id'];
		$siri = $con -> query("Select * from user where privilegio=3");
        $rows = mysqli_num_rows($siri);
    if($rows >0){
        while($row = mysqli_fetch_array($siri)){
            echo "<tr>";
            echo "<td>"; echo $row['id']; echo "</td>";
            echo "<td>"; echo $row['fullname']; echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
			echo "<td>";echo'<a href="asigticket.php?id='.$row['id'].'"class="button special scrolly">Asignar</a>';echo "</td>";
            echo "</tr>";
        }    
    }        
		?>
</table>
	<a class="btn btn-default" href="inicio.php">Volver</a>
	</div>
	</div>
	</div>
	<script src="js/valida_registro.js"></script> 

</body>
</html>