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
    
$sql = "UPDATE tickets SET comentario='$_POST[comentario]' WHERE idticket='$_POST[idticket]'";
if ($conn->query($sql) === TRUE) {
print "<script>alert(\"Ticket Editado.\");window.location='../inicio.php';</script>";

} else {
    echo "Error al actualizar datos: " . $conn->error;
}
$conn->close();
?>