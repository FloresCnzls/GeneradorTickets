<?php
        $conexion=mysqli_connect("localhost","root","", "ceapr");
	       if(mysqli_connect_errno()){
	       	echo "Fallo al conectar a la BDD";
	       	exit();
	       }

if(!empty($_POST)){
	if(isset($_POST["idcliente"]) &&isset($_POST["username"]) &&isset($_POST["fecha"])  &&isset($_POST["descripcion"]) &&isset($_POST["area"]) &&isset($_POST["comentario"]) &&isset($_POST["estado"]) &&isset($_POST["naemple"])){
		if($_POST["idcliente"]!=""&& $_POST["username"]!=""&&$_POST["fecha"]!=""&&$_POST["descripcion"]!=""&&$_POST["area"]!=""&&$_POST["comentario"]!=""&&$_POST["estado"]!=""&&$_POST["naemple"]!=""){
			include "conexion.php";
			$found=false;
			$sql1= "select * from tickets where descripcion=\"$_POST[descripcion]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			 }
       if($found){
        print "<script>alert(\"Este ticket ya fue generado.\");window.location='../ticket.php';</script>";
       }
       else {
       mysqli_set_charset($conexion, "utf8_spanish2_ci");
			 $sql = "insert into tickets(idcliente,username,fecha,descripcion,area,comentario,estado,naemple) value (\"$_POST[idcliente]\",\"$_POST[username]\",\"$_POST[fecha]\",\"$_POST[descripcion]\",\"$_POST[area]\",\"$_POST[comentario]\",\"$_POST[estado]\",\"$_POST[naemple]\")";
			 $query = $con->query($sql);
            if($query!=null){
			    print "<script>alert(\"Ticket generado exitosamente\");window.location='../inicio.php';</script>";
	       	   }
            }
              
      }   
        
   } 
}          
?>