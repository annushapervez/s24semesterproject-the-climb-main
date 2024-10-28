<?php 
if (isset($_COOKIE['token'])) {
        $userToken = $_COOKIE["token"];
        $hashedToken = sha1($userToken);
        $userSearch = 'SELECT username FROM climberdb where token= ?';
        $userstmt = $conn->prepare($userSearch);
        $userstmt->bind_param("s", $hashedToken);
        $userstmt->execute();
        $userRes = $userstmt->get_result();
        $row = $userRes->fetch_assoc();
        $currentuser = $row["username"];
    } else {
        $currentuser = "Not found";
    }
$friendsPlaceholder = ""
 $friendslist = "SELECT * FROM relationdb WHERE user='$currentuser'";
 $friendss = $conn->query($friendslist);

while ($row = $friendss->fetch_assoc()) {
        $friendsPlaceholder = $friendsPlaceholder . "<md>" . "<br>" . $row['follower'] . "<br></md>";
    }?>