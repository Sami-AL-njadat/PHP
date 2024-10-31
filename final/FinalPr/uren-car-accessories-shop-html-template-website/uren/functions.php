<?php 
session_start();
$serverName = 'localhost';
$usernName = 'root';
$password = '';
$dbName = 'ecomm';

$conn = new mysqli($serverName, $usernName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->error);
}
function redirect($url, $status) {
    $_SESSION['status'] = "$status";
    header('Location: '.$url);
    exit(0);
}

function alertMessage(){
    if(isset($_SESSION['status'])){
        if ($_SESSION['status'] == "Register Successfull.") {
            echo '<div class="alert alert-success">'.$_SESSION['status'].'</div>';
            unset($_SESSION['status']);
        }else{
        echo '<div class="alert alert-danger">'.$_SESSION['status'].'</div>';
        unset($_SESSION['status']);
        }
    }
}
