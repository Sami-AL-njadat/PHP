
<?php
// Database connection parameters
$server = "localhost";
$username = "root";
$password = "";
$database = "mkonline";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "Connection ok";
}
 
 
 ?>