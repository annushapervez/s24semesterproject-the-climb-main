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
$followingPlaceholder = "";
 $followinglist = "SELECT * FROM relationdb WHERE follower='$currentuser'";
 $following = $conn->query($followinglist);

while ($row = $following->fetch_assoc()) {
        $followingPlaceholder = $followingPlaceholder . "<md>" . "<br>" . $row['user'] . "<br></md>";
    }?>