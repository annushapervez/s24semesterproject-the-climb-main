<?php 
require 'connection.php';
$followed = $_POST["addUsername"];

$userToken=htmlspecialchars($_COOKIE["token"]);
$hashedToken=sha1($userToken);
$userSearch = 'SELECT username FROM climberdb where token= ?';
$userstmt = $conn->prepare($userSearch);
$userstmt->bind_param("s", $hashedToken);
$userstmt->execute();
$userRes= $userstmt->get_result();
$row = $userRes->fetch_assoc();
$username=$row["username"];

$sql = "SELECT * FROM climberdb WHERE username='$followed'";
$result = $conn->query($sql);

if ($result->num_rows == 0) { 
        echo '<script type="text/javascript">'; 
        echo 'alert("No user with this username. Please try again.")';
        echo '</script>';
}else{
    $stmt = $conn->prepare("INSERT INTO relationdb (id, user, follower) VALUES (?, ?, ?)");
    $stmt->bind_param("iss",$zero, $followed, $username);
    $stmt->execute();
}

?>