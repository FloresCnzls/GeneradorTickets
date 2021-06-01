<?php
        $conexion=mysqli_connect("localhost","root","", "ceapr");
	       if(mysqli_connect_errno()){
	       	echo "Fallo al conectar a la BDD";
	       	exit();
	       }

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["fullname"]) &&isset($_POST["email"])  &&isset($_POST["password"]) &&isset($_POST["confirm_password"]) &&isset($_POST["privilegio"])){
		if($_POST["username"]!=""&& $_POST["fullname"]!=""&&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["password"]==$_POST["confirm_password"]&&$_POST["privilegio"]!=""){
			include "conexion.php";
			$found=false;
			$sql1= "select * from user where username=\"$_POST[username]\" or email=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			 }
       if($found){
        print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
       }
       else {
       mysqli_set_charset($conexion, "utf8_spanish2_ci");
			 $sql = "insert into user(username,fullname,email,password,privilegio,created_at) value (\"$_POST[username]\",\"$_POST[fullname]\",\"$_POST[email]\",\"$_POST[password]\",\"$_POST[privilegio]\",NOW())";
			 $query = $con->query($sql);
            if($query!=null){
			    print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../index.php';</script>";
	       	   }
            }
              
      }   
        
   } 
}          
?>