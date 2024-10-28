<?php
include '../friends_backend.php';



date_default_timezone_set('America/New_York');
$conn = mysqli_connect("oceanus.cse.buffalo.edu:3306", "annushap", "50309108", "cse442_2024_spring_team_s_db");
// include ("../getupdates.php");
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



// $updatet = "";
// $strengthupd = "I completed a strength workout!";
// $cardioupd = "I completed a cardio workout!";
// $checkboxvalselected = 0;

// $pstupdsql = "SELECT * FROM UserProfileDB WHERE email='$email'";
// $updgoals = $conn->query($pstupdsql);
// while ($row = $updgoals->fetch_assoc()) {
//     if ($row['updatepref'] != NULL) {

//         $checkboxvalselected = $row['updatepref'];
//     }
// }
// $username = getUsername($conn);
// $date = date("Y-m-d");

// $dupesql = "SELECT * FROM updateDB WHERE username='$username'";
// $dupeck = $conn->query($dupesql);
// $validentry = array(
//     "s" => "0",
//     "c" => "0",
// );
// $cardcomp = 0;
// $cardcompsql = "SELECT * FROM cardiodb WHERE username='$username'";
// $cardg = $conn->query($cardcompsql);
// while ($row = $cardg->fetch_assoc()) {
//     if ($row['date_log'] == $date) {
//         // echo ("HERE2");
//         $cardcomp = 1;
//     }
// }

// $strcomp = 0;
// $strcompsql = "SELECT * FROM exercisedb WHERE username='$username'";
// $strg = $conn->query($strcompsql);
// while ($row = $strg->fetch_assoc()) {
//     if ($row['date_log'] == $date) {
//         // echo ("HERE");
//         $strcomp = 1;
//     }
// }


function findUpdateID()
{
    $updatesToShow = 0;
    $updateString = implode(', ', $_GET["updatecheck"]);

    if (
        strpos($updateString, "cardio") !== false
        &&
        strpos($updateString, "strength") !== false
    ) {
        $updatesToShow = 3;
    } else if (
        strpos($updateString, "cardio") !== false
    ) {
        $updatesToShow = 1;
    } else if (strpos($updateString, "strength") !== false) {
        $updatesToShow = 2;
    } else {
        $updatesToShow = 0;
    }
    // echo $updatesToShow;
    return $updatesToShow;

}

$upd = findUpdateID();

$sql = 'UPDATE `UserProfileDB` SET `updatepref` = ? WHERE `email` = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $upd, $email);
if ($stmt->execute() === TRUE) {
    echo "Nutrients set successfully, ";
} else {
    echo "Error updating CalorieGoal: " . $conn->error;
}





// $validentry['s'] = strval($strcomp);
// $validentry['c'] = strval($cardcomp);
// // echo($validentry['s']);

// // echo($validentry['c']);
// while ($row = $dupeck->fetch_assoc()) {

//     if ($row['date'] == $date) {

//         if ($checkboxvalselected == 1 && $row['text'] == $cardioupd) {
//             $validentry['c'] = '0';
//         }
//         if ($checkboxvalselected == 2 && $row['text'] == $strengthupd) {
//             $validentry['s'] = '0';

//         }
//         if ($checkboxvalselected == 3 && $row['text'] == $cardioupd) {
//             $validentry['c'] = '0';
//         }
//         if ($checkboxvalselected == 3 && $row['text'] == $strengthupd) {
//             $validentry['s'] = '0';
//         }
//     }
// }
// // echo $validentry['s'];
// // echo $validentry['c'];
// if ($checkboxvalselected == 1 && $validentry['c'] == '1') {
//     //insert update for cardio;
//     $username = getUsername($conn);
//     $date = date("Y-m-d");
//     // Insert the post into the database, add date too
//     $insertQuery = "INSERT INTO `updateDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
//     $stmt = $conn->prepare($insertQuery);
//     $stmt->bind_param("sss", $username, $date, $cardioupd);
//     if ($stmt->execute()) {
//         // echo "New record created successfully.";
//     } else {
//         // echo "Error creating new record: " . $stmt->error;
//         return;
//     }


// } else if ($checkboxvalselected == 2 && $validentry['s'] == '1') {
//     //insert update for strength;
//     $username = getUsername($conn);
//     $date = date("Y-m-d");
//     // Insert the post into the database, add date too
//     $insertQuery = "INSERT INTO `updateDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
//     $stmt = $conn->prepare($insertQuery);
//     $stmt->bind_param("sss", $username, $date, $strengthupd);
//     if ($stmt->execute()) {
//         // echo "New record created successfully.";
//     } else {
//         // echo "Error creating new record: " . $stmt->error;
//         return;
//     }

// } else if ($checkboxvalselected == 3) {
//     //insert update for both;
//     $username = getUsername($conn);
//     $date = date("Y-m-d");
//     // Insert the post into the database, add date too
//     if ($validentry['s'] == '1') {
//         $insertQuery = "INSERT INTO `updateDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
//         $stmt = $conn->prepare($insertQuery);
//         $stmt->bind_param("sss", $username, $date, $strengthupd);
//         if ($stmt->execute()) {
//             // echo "New record created successfully.";
//         } else {
//             // echo "Error creating new record: " . $stmt->error;
//             return;
//         }
//     }
//     $username = getUsername($conn);
//     $date = date("Y-m-d");

//     if ($validentry['c'] == '1') {
//         // Insert the post into the database, add date too
//         $insertQuery = "INSERT INTO `updateDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
//         $stmt = $conn->prepare($insertQuery);
//         $stmt->bind_param("sss", $username, $date, $cardioupd);
//         if ($stmt->execute()) {
//             echo "New record created successfully.";
//         } else {
//             echo "Error creating new record: " . $stmt->error;
//             return;
//         }
//     }

// }

header("Location: ../../../public/friendsFrontend.php");