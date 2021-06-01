<?php 
	$con=mysqli_connect('localhost','root','','ceapr');
  session_start();
  if(!isset($_SESSION['id'])){
    header("location:index.php");
    }
?> 
<!DOCTYPE HTML>
<html>
	<head>
		<title>inicio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="perfil/css/main.css" />
      				 <link rel="icon" type="image/png" href="images/GOBIERNO.png">

       <script type="text/javascript" src="assets/js/cal.js"></script>
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo">
                           
                 <?php  
	               $sql="SELECT id, username from user  where id =". $_SESSION['id'];
                        $result=mysqli_query($con,$sql);
		                  while($mostrar=mysqli_fetch_array($result)){
                            ?>
                    <a href="inicio.php"><?php echo $mostrar['username'] ?></a>
                    	       <?php 
	                               }
                                    ?> 
                                    <?php 

                    if (isset($_SESSION['id'])) {
                        if ($_SESSION['privilegio'] == 1 ) {
                              echo "| Administrador";
                            }
                        if ($_SESSION['privilegio'] == 2 ) {
                            echo "| Jefe";
							
                            }
                        if ($_SESSION['privilegio'] == 3 ) {
                            echo "| Empleado";
                            }
                        if($_SESSION['privilegio'] == 4 ) {
                            echo "| Usuario";
                            }
                    }
                            ?>
                    </div>
				<a href="#menu" class="toggle"><span>Menu</span></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="inicio.php">Inicio</a></li>
                    <?php  if ($_SESSION['privilegio'] == 1 )  echo '<li><a href="registro.php">Crear Usuario</a></li>'?>
                    <?php  if ($_SESSION['privilegio'] == 1 )  echo '<li><a href="Update.php">Usuarios</a></li>'?>
                    <?php  if ($_SESSION['privilegio'] == 4 )  echo '<li><a href="ticket.php">Crear Ticket</a></li>'?>
                    <?php  if ($_SESSION['privilegio'] == 2 )  echo '<li><a href="asignar.php">Asignar ticket</a></li>'?>
					<?php  if ($_SESSION['privilegio'] == 3 )  echo '<li><a href="crearcomen.php">Ticket Asignado</a></li>'?>
					<li><a href="php/logout.php">Salir</a></li>
				</ul>
			</nav>
			<section id="banner" data-video="images/banner">
				<div class="inner">
					<h1>GESILY</h1>
					<p>Empresa dedicada a soluciones de informatica.</p>
				</div>
			</section>
		<section id="one" class="wrapper style2">
				<div class="inner">
						<div class="box">
							<div class="content">
								<header class="align-center">
									<h2 id="act">Tickets</h2>
								</header>
								<hr />
								<?php  if ($_SESSION['privilegio'] == 4 )  echo '<h2>Estos son tus tickets creados</h2>'?>
								<?php  if ($_SESSION['privilegio'] == 2 )  echo '<h2>Tickets para asignar</h2>'?>
								<?php  if ($_SESSION['privilegio'] == 3 )  echo '<h2>Tickets asiganados</h2>'?>
<table border="1" id="actividades">
		<tr style="color: black">
			<td colspan="1">Fecha de Ocurrencia</td>
			<td colspan="1">Descripcion</td>
			<td colspan="1">Área</td> 
			<td colspan="1">Estado</td>
			<td colspan="1">Empleado Asginado</td>
			<td colspan="1">Comentario</td>
		</tr>
		<?php
		if ($_SESSION['privilegio'] == 4){
        $com = $_SESSION['id'];
		$siri = $con -> query("Select * from tickets where idcliente = $com order by fecha desc limit 6");
        $rows = mysqli_num_rows($siri);
    	if($rows >0){
        while($row = mysqli_fetch_array($siri)){
            echo "<tr>";
            echo "<td>"; echo $row['fecha']; echo "</td>";
            echo "<td>"; echo $row['descripcion']; echo "</td>";
			echo "<td>"; echo $row['area']; echo "</td>"; 
			echo "<td>"; echo $row['estado']; echo "</td>";
			echo "<td>"; echo $row['naemple']; echo "</td>";
            echo "<td>"; echo $row['comentario']; echo "</td>";
        }  
		if ($_SESSION['privilegio'] == 4 )  echo '<h2>Tickets asiganados</h2>';
    }
}
		?>
<?php
		if ($_SESSION['privilegio'] == 3){
        $com = $_SESSION['id'];
		$siri = $con -> query("Select * from tickets where idemple = $com order by fecha desc limit 6");
        $rows = mysqli_num_rows($siri);
    if($rows >0){
        while($row = mysqli_fetch_array($siri)){
            echo "<tr>";
            echo "<td>"; echo $row['fecha']; echo "</td>";
            echo "<td>"; echo $row['descripcion']; echo "</td>";
			echo "<td>"; echo $row['area']; echo "</td>";
			echo "<td>"; echo $row['estado']; echo "</td>";
			echo "<td>"; echo $row['naemple']; echo "</td>";
            echo "<td>"; echo $row['comentario']; echo "</td>";
            echo "</tr>";
        }    
    }
}        
		?>
<?php
if ($_SESSION['privilegio'] == 2){
		$siri = $con -> query ("Select * from tickets where estado = 'No Asignado'");
        $rows = mysqli_num_rows($siri);
    if($rows >0){
        while($row = mysqli_fetch_array($siri)){
            echo "<tr>";
			echo "<td>"; echo $row['fecha']; echo "</td>";
            echo "<td>"; echo $row['descripcion']; echo "</td>";
			echo "<td>"; echo $row['area']; echo "</td>";
			echo "<td>"; echo $row['estado']; echo "</td>";
			echo "<td>"; echo $row['naemple']; echo "</td>";
            echo "<td>"; echo $row['comentario']; echo "</td>";
            echo "</tr>";
        }    
    }
}

        
		?>
	</table>	
        <?php 
        if($_SESSION['privilegio'] == 2){
			//if($vin == $id){
				#echo'<a href="audio_acti.php?id='.$_SESSION['id'].'&comision='.$_SESSION['comision'].'" class="button special scrolly">Subir actividad</a>  ';	
				echo'<a href="asignar.php?id='.'" class="button special scrolly">Asignar Ticket</a>  ';	
			}
		if($_SESSION['privilegio'] == 3){
			echo'<a href="crearcomen.php?id='.'" class="button special scrolly">Crear comentario</a>  ';	
			
        }
		if($_SESSION['privilegio'] == 3){
			echo'<a href="ticketsc.php?id='.'" class="button special scrolly">Editar comentario</a>  ';	
			
        }
		if($_SESSION['privilegio'] == 4){
			echo'<a href="ticket.php?id='.'" class="button special scrolly">Crear Ticket</a>  ';	
	}?>	
	<br> <br> <br><br><br><br><br><style>			
 </style>
</div> 
							</div>
						</div>
					
				</div>
			</section>
    
    			<section id="three" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">

                        				<div>
							<div class="box">
								<div class="image fit">									
								<img src="images/vision-exercise-1.jpg" alt="" />

								</div> 
								<div class="content">
									<header class="align-center">
										<h2>Visión</h2>
									</header>
									<hr />
									<p> Ser una empresa con liderazgo y reconocimiento nacional por la formación integral de sus estudiantes basada en el carisma salesiano, vivencia de valores, excelencia académica, científica y tecnológica; comprometida con el espíritu salesiano y la transformación social.</p>
								</div>
							</div>
						</div>

						<div>
							<div class="box">
								<div class="image fit">									
								<img src="images/mision-y-vision.jpg" />

								</div>
								<div class="content">
									<header class="align-center">
										<h2>Misión</h2>
									</header>
									<hr />
									<p>Ser una empresa con liderazgo y reconocimiento nacional por la formación integral de sus estudiantes basada en el carisma salesiano, vivencia de valores, excelencia académica, científica y tecnológica; comprometida con el espíritu salesiano y la transformación social.</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
    
    <style>
            #imglogo{
                border-radius: 35px;
            }
                                </style>
    
		<!-- Footer -->

			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<h4><li>Copyright-©</li></h4>
					</ul>

			</div>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>