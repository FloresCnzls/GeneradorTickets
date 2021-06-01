<?php
//if(isset($_POST['username'])){
	//$usuario = $_POST['username'];
	//$pass = $_POST['password'];
	//$campos = array();
	//if($usuario== ""){
	//	print "<script>alert(\"El campo usuario debe tener valor.\");window.location='../index.php';</script>";
	//}
	//if($pass== ""){
		//print "<script>alert(\"El campo contrase;a debe tener valor.\");window.location='../index.php';</script>";
	//}
//}
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			$con=mysqli_connect('localhost','root','','ceapr');
			$user_id=null;
			$sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()){
				$user_id=$r["id"];
				$privi=$r["privilegio"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Contraseña o usuario incorrecto.\");window.location='../index.php';</script>";
			}else{
				session_start();
				$_SESSION['username']=$_POST["username"];
				$_SESSION["id"]=$user_id;
				$_SESSION['privilegio'] = $privi;
				print "<script>window.location='../inicio.php';</script>";				
			}
		}
	}	
?>