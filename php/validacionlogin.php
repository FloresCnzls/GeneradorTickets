<style>
.error{
	backgorund-color: #FF9185;
	font-size: 12px:
	paddin: 10px;
}
.correto{
	backgorund-color: #A0DEA7;
	font-size: 12px:
	paddin: 10px;
}
</style>
<?php 

		if(isset($_POST['username'])){
			$usuario = $_POST['username'];
			$pass = $_POST['password'];
			$campos = array();
			if($usuario== ""){
				array_push($campos, "El campo usuario no puede estar vacio");
			}
			if($pass== ""){
				array_push($campos, "El campo password no puede estar vacio");
			}
			if (count($campos)>0){
				echo "<div class='error'>";
				for($i = 0; $i < count($campos); $i++){
					echo "<li>".$campos[$i]."</li>";
				}
			}
			else{
				echo "<div class='correcto'>";	
			}
			echo"</div>";
		}
		?>