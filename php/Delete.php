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
$sql = "DELETE FROM user WHERE id ='$_GET[id]'";
if ($conn->query($sql) === TRUE) {
    print "<script>alert(\"El usuario se ha eliminado.\");window.location='../Update.php';</script>";
}
else {
    echo "Error al borrar datos: " . $conn->error;
}
mysqli_close($conn);
?>