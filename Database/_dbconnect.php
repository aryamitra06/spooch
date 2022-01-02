<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "spooch";

// Create a connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$connection){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
?>