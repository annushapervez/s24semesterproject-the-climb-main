<?php 
require 'connection.php';
    $username = $_POST["Username"];
    $email = $_POST["Email"];
    $pass = $_POST["Password"];
    $defaultToken = "";
    $passhash = password_hash($pass,PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO climberdb (id, email, username, password,token) VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $zero,$email,$username,$passhash,$defaultToken);
    $stmt->execute();
    header("Location: ../../public/login_page.php");
?>