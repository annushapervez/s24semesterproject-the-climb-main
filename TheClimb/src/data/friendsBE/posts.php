<?php
date_default_timezone_set('America/New_York');
$conn = mysqli_connect("oceanus.cse.buffalo.edu:3306", "annushap", "50309108", "cse442_2024_spring_team_s_db");
include ("../friends_backend.php");
$email = '';

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
function getUsername($conn)
{
    $userToken = htmlspecialchars($_COOKIE["token"]);
    $hashedToken = sha1($userToken);
    $emailQuery = "SELECT username FROM climberdb WHERE token=?";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param("s", $hashedToken);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $row = $result1->fetch_assoc();
    $username = $row["username"];

    return $username;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST["postsfrom"];
    if (isset($_POST["postsfrom"])) {
        $username = getUsername($conn);
        $postText = $_POST["postsfrom"];

        $date = date("Y-m-d H:i:s");

        // Insert the post into the database, add date too
        $insertQuery = "INSERT INTO `postDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $username, $date, $postText);
        if ($stmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error creating new record: " . $stmt->error;
            return;
        }

    }

}

header("Location: ../../../public/friendsFrontend.php");
