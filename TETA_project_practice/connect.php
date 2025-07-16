<?php

//This creates a connection to the database
$host = "localhost";
$user = "root";
$pass = "";
$database = "teta";

$conn = new mysqli($host, $user, $pass, $database);

if (!$conn) {
    die("Error: ". mysqli_error($conn));
}

?>