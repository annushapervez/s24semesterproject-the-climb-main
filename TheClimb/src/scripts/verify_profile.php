<?php   require 'connection.php';

$userToken=htmlspecialchars($_COOKIE["token"]);
$hashedToken=sha1($userToken);
$emailSearch = 'SELECT email FROM climberdb where token= ?';
$emailstmt = $conn->prepare($emailSearch);
$emailstmt->bind_param("s", $hashedToken);
$emailstmt->execute();
$emailRes= $emailstmt->get_result();
$row = $emailRes->fetch_assoc();
$email=$row["email"];

$sql = "SELECT email FROM UserProfileDB WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 0) { 
        echo '<script type="text/javascript">'; 
        echo 'alert("No profile information detected. Please set up a profile for this account");';
        echo 'window.location.href = "../public/UserProfile_frontend.php";';
        echo '</script>';
}

?>