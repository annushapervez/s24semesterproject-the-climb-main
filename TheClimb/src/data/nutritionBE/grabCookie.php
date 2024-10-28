<?php

function tokenToEmail($conn){
    if(isset($_COOKIE['token'])){
        $userToken=$_COOKIE["token"];
        $hashedToken=sha1($userToken);
        $emailSearch = 'SELECT `email` FROM `climberdb` where `token`= ?';
        $emailstmt = $conn->prepare($emailSearch);
        $emailstmt->bind_param("s", $hashedToken);
        $emailstmt->execute();
        $emailRes= $emailstmt->get_result();
        $row = $emailRes->fetch_assoc();
        $email=$row["email"];
    }else{
        $email = "Not found";
    }
    return $email;
}


?>