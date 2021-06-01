<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ceapr";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
    
$sql = "UPDATE user SET username='$_POST[username]',fullname='$_POST[fullname]',email='$_POST[email]', password='$_POST[password]', privilegio='$_POST[privilegio]' WHERE id='$_POST[id]'";
if ($conn->query($sql) === TRUE) {
print "<script>alert(\"Datos de usuario actualizados.\");window.location='../inicio.php';</script>";

} else {
    echo "Error al actualizar datos: " . $conn->error;
}
$conn->close();
?>