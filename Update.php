<?php 
session_start();  
$con=mysqli_connect('localhost','root','','ceapr');
if(isset($_SESSION['id']) && $_SESSION['privilegio'] != 1){
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
<h2>Usuarios</h2>
<table border="1" id="actividades">
		<tr style="color: black">
        <td colspan="1">Nombre usuario</td>
			<td colspan="1">Nombre Completo</td>
			<td colspan="1">Email</td>
			<td colspan="1">Tipo Usuario</td>
			<td colspan="1">Accion</td>
		</tr>
        <?php
      	$com = $_SESSION['id'];
		$siri = $con -> query("Select * from user where id !=$com");
        $rows = mysqli_num_rows($siri);
   		 if($rows >0){
        while($row = mysqli_fetch_array($siri)){
            echo "<tr>";
            echo "<td>"; echo $row['fullname']; echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['email']; echo "</td>";
			echo "<td>"; echo $row['privilegio']; echo "</td>";
			//echo "<td>"; echo $row['area']; echo "</td>";
			echo "<td>";echo'<a href="edit.php?id='.$row['id'].'"class="button special scrolly">Editar</a>';echo'<a href="php/Delete.php?id='.$row['id'].'"class="button special scrolly" style="color:red;">Eliminar</a>';echo "</td>";
            echo "</tr>";
        }    
    }        
		?>
</table>
</div>
</div>
</div>
   
		<script src="js/valida_login.js"></script>
	</body>
</html>