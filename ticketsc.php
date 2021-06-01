<?php 
session_start();  
$con=mysqli_connect('localhost','root','','ceapr');
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
<h2 id="act">Tickets comentados</h2>
<table border="1" id="actividades">
		<tr style="color: black">
        <td colspan="1">ID ticket</td>
			<td colspan="1">Fecha de Ocurrencia</td>
			<td colspan="1">Descripcion</td>
			<td colspan="1">Área</td>
			<td colspan="1">Estado</td>
			<td colspan="1">Comentario</td>
			<td colspan="1">Accion</td>
		</tr>
        <?php
        $com = $_SESSION['id'];
		$siri = $con -> query("Select * from tickets where (idemple = $com) AND (comentario !='-')");
        $rows = mysqli_num_rows($siri);
    if($rows >0){
        while($row = mysqli_fetch_array($siri)){
            echo "<tr>";
            echo "<td>"; echo $row['idticket']; echo "</td>";
            echo "<td>"; echo $row['fecha']; echo "</td>";
            echo "<td>"; echo $row['descripcion']; echo "</td>";
			echo "<td>"; echo $row['area']; echo "</td>";
			echo "<td>"; echo $row['estado']; echo "</td>";
            echo "<td>"; echo $row['comentario']; echo "</td>";
			echo "<td>";echo'<a href="editarticket.php?id='.$row['idticket'].'"class="button special scrolly">Editar</a>';echo "</td>";
            echo "</tr>";
        }    
    }        
		?>
</table>
<a class="btn btn-default" href="inicio.php">Volver</a>
</div>
</div>
</div>
   
		<script src="js/valida_login.js"></script>
	</body>
</html>