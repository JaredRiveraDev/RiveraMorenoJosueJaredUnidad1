<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pelisdb';
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar conexión
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
// echo "Conexión exitosa";
