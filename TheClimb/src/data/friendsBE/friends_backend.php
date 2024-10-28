<?php
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

function getAllPosts($conn)
{
    $username = getUsername($conn);
    $query1 = "SELECT user FROM relationdb WHERE follower = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("s", $username);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $users = $result1->fetch_all(MYSQLI_ASSOC);

    $users[] = array('user' => $username);

    $posts = [];
    foreach ($users as $user) {
        $query2 = "SELECT * FROM postDB WHERE username = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("s", $user['user']);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $userPosts = $result2->fetch_all(MYSQLI_ASSOC);
        $posts = array_merge($posts, $userPosts);
    }

    // Sort posts by id in descending order
    usort($posts, function ($a, $b) {
        return $b['id'] - $a['id'];
    });

    return $posts;
}

$allPosts = getAllPosts($conn);

function getAllUpdates($conn)
{
    $username = getUsername($conn);
    $query1 = "SELECT user FROM relationdb WHERE follower = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("s", $username);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $users = $result1->fetch_all(MYSQLI_ASSOC);

    $users[] = array('user' => $username);

    $updates = [];
    foreach ($users as $user) {
        $query2 = "SELECT * FROM updateDB WHERE username = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("s", $user['user']);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $userupdates = $result2->fetch_all(MYSQLI_ASSOC);
        $updates = array_merge($updates, $userupdates);
    }

    // Sort updates by id in descending order
    usort($updates, function ($a, $b) {
        return $b['id'] - $a['id'];
    });

    return $updates;
}
$allUpdates = getAllUpdates($conn);





$updatet = "";
$strengthupd = "I completed a strength workout!";
$cardioupd = "I completed a cardio workout!";
$checkboxvalselected = 0;
$currchecked = 'Nothing';
$pstupdsql = "SELECT * FROM UserProfileDB WHERE email='$email'";
$updgoals = $conn->query($pstupdsql);
while ($row = $updgoals->fetch_assoc()) {
    if ($row['updatepref'] != NULL) {

        $checkboxvalselected = $row['updatepref'];
    }
}
$username = getUsername($conn);
$date = date("Y-m-d");

$dupesql = "SELECT * FROM updateDB WHERE username='$username'";
$dupeck = $conn->query($dupesql);
$validentry = array(
    "s" => "0",
    "c" => "0",
);
$cardcomp = 0;
$cardcompsql = "SELECT * FROM cardiodb WHERE username='$username'";
$cardg = $conn->query($cardcompsql);
while ($row = $cardg->fetch_assoc()) {
    if ($row['date_log'] == $date) {
        // echo ("HERE2");
        $cardcomp = 1;
    }
}


$strcomp = 0;
$strcompsql = "SELECT * FROM exercisedb WHERE username='$username'";
$strg = $conn->query($strcompsql);
while ($row = $strg->fetch_assoc()) {
    if ($row['date_log'] == $date) {
        // echo ("HERE");
        $strcomp = 1;
    }
}

$validentry['s'] = strval($strcomp);
$validentry['c'] = strval($cardcomp);
// echo($validentry['s']);
if ($checkboxvalselected == 1) {
    $currchecked = 'Cardio';
}
if ($checkboxvalselected == 2) {
    $currchecked = 'Strength';

}
if ($checkboxvalselected == 3) {
    $currchecked = 'Cardio and Strength';
}
if ($checkboxvalselected == 0) {
    $currchecked = 'Nothing';
}
// echo($validentry['c']);
while ($row = $dupeck->fetch_assoc()) {

    if ($row['date'] == $date) {

        if ($checkboxvalselected == 1 && $row['text'] == $cardioupd) {
            $validentry['c'] = '0';
            $currchecked = 'Cardio';
        }
        if ($checkboxvalselected == 2 && $row['text'] == $strengthupd) {
            $validentry['s'] = '0';
            $currchecked = 'Strength';

        }
        if ($checkboxvalselected == 3 && $row['text'] == $cardioupd) {
            $validentry['c'] = '0';
            $currchecked = 'Cardio and Strength';
        }
        if ($checkboxvalselected == 3 && $row['text'] == $strengthupd) {
            $validentry['s'] = '0';
            $currchecked = 'Cardio and Strength';
        }


    }
}
// echo $validentry['s'];
// echo $validentry['c'];
if ($checkboxvalselected == 1 && $validentry['c'] == '1') {
    //insert update for cardio;
    $username = getUsername($conn);
    $date = date("Y-m-d");
    // Insert the post into the database, add date too
    $insertQuery = "INSERT INTO `updateDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $username, $date, $cardioupd);
    if ($stmt->execute()) {
        // echo "New record created successfully.";
    } else {
        // echo "Error creating new record: " . $stmt->error;
        return;
    }


} else if ($checkboxvalselected == 2 && $validentry['s'] == '1') {
    //insert update for strength;
    $username = getUsername($conn);
    $date = date("Y-m-d");
    // Insert the post into the database, add date too
    $insertQuery = "INSERT INTO `updateDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $username, $date, $strengthupd);
    if ($stmt->execute()) {
        // echo "New record created successfully.";
    } else {
        // echo "Error creating new record: " . $stmt->error;
        return;
    }

} else if ($checkboxvalselected == 3) {
    //insert update for both;
    $username = getUsername($conn);
    $date = date("Y-m-d");
    // Insert the post into the database, add date too
    if ($validentry['s'] == '1') {
        $insertQuery = "INSERT INTO `updateDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $username, $date, $strengthupd);
        if ($stmt->execute()) {
            // echo "New record created successfully.";
        } else {
            // echo "Error creating new record: " . $stmt->error;
            return;
        }
    }
    $username = getUsername($conn);
    $date = date("Y-m-d");

    if ($validentry['c'] == '1') {
        // Insert the post into the database, add date too
        $insertQuery = "INSERT INTO `updateDB` (`username`, `date`, `text`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $username, $date, $cardioupd);
        if ($stmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error creating new record: " . $stmt->error;
            return;
        }
    }

}
?>

<script type="text/javascript">
    // header("Location: ../../../public/friendsFrontend.php");
    //connect to the server, figure out the value stored. if its a 1 then cardio, if its a 2 strength, if 3 then post both

    window.onload = function () {
        if (!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
</script>