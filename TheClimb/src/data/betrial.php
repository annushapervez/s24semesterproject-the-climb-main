<?php

$conn = mysqli_connect("oceanus.cse.buffalo.edu:3306", "aidanodo", "50393459", "cse442_2024_spring_team_s_db");


if (isset($_COOKIE['token'])) {
    $userToken = $_COOKIE["token"];
    $hashedToken = sha1($userToken);
    $emailSearch = 'SELECT `email` FROM `climberdb` where `token`= ?';
    $emailstmt = $conn->prepare($emailSearch);
    $emailstmt->bind_param("s", $hashedToken);
    $emailstmt->execute();
    $emailRes = $emailstmt->get_result();
    $row = $emailRes->fetch_assoc();
    $email = $row["email"];
} else {
    $email = "Not found";
}


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
$friendsPlaceholder = "";
$friendslist = "SELECT * FROM relationdb WHERE user='$currentuser'";
$friendss = $conn->query($friendslist);

while ($row = $friendss->fetch_assoc()) {
    $friendsPlaceholder = $friendsPlaceholder . "<md>" . "<br>" . $row['follower'] . "<br></md>";
}
