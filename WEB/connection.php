<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";  
$dbname = "AIDAYS_DATABASE";  

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
