<?php 
require 'connection.php';
$currentToken = $_COOKIE['token'];
    if(isset($_COOKIE['token'])) {
        $tokenQuery = 
        "UPDATE climberdb
        SET token=''
        WHERE token='$currentToken'";
        $conn->query($tokenQuery);
        setcookie("token", "", time() - 3600); 
        header("Location: ../../public/login_page.php");
    }
?>