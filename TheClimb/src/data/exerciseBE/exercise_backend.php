<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

date_default_timezone_set('US/Eastern');
session_start();

$month = date("m");
$day = date("d");
$year = date("Y");
$today = $year . '-' . $month . '-' . $day;
$message = "";

if (isset($_POST['date'])) { //check if form was submitted
    $input = $_POST['date']; //get input text
    $message = "You entered: " . $input;
} else {
    $input = $today;
}

$most_recent_sunday = date('Y-m-d', strtotime('last Sunday', strtotime($input)));

// Calculate the next Sunday after the selected date
$next_saturday = date('Y-m-d', strtotime('next Saturday', strtotime($input)));

// Colors signifying worked or not worked
$worked = "#163F8C";
$notworked = "#bbb";

// different muscle groups
$traps = $notworked;
$lowerchest = $notworked;
$upperchest = $notworked;
$frontdeltoid = $notworked;
$bicep = $notworked;
$tricep = $notworked;
$forearm = $notworked;
$abs = $notworked;
$obliques = $notworked;
$hipflexor = $notworked;
$quads = $notworked;
$reardeltoid = $notworked;
$lats = $notworked;
$lowerback = $notworked;
$glutes = $notworked;
$hamstrings = $notworked;
$calves = $notworked;

$conn = mysqli_connect("oceanus.cse.buffalo.edu:3306", "dreilly5", "50280971", "cse442_2024_spring_team_s_db");

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
    $userSearch = 'SELECT `username` FROM `climberdb` where `token`= ?';
    $userstmt = $conn->prepare($userSearch);
    $userstmt->bind_param("s", $hashedToken);
    $userstmt->execute();
    $userRes = $userstmt->get_result();
    $row = $userRes->fetch_assoc();
    $currentuser = $row["username"];
} else {
    $currentuser = "Not found";
}




$workoutscompleted = "SELECT exercise FROM workoutdb";
$workouts = $conn->query($workoutscompleted);
$exerciseoptions = "";
while ($row = $workouts->fetch_assoc()) {
    //print_r($row);
    $exercisename = $row["exercise"];
    $exerciseoptions = $exerciseoptions . "<option>" . $exercisename . "</option>";
}

$dropoptions = "<option disabled selected value>Select Exercise</option>" . $exerciseoptions;
$dropset = "<input class = 'inputStyle' type='text' id='sets' name='sets' pattern='^[1-9][0-9]?$' title = 'Please Enter a Number: (MAX 99)' placeholder='Number of Sets' required>";
$droprep = "<input class = 'inputStyle' type='text' id='reps' name='reps' pattern='^[1-9][0-9]?$' title = 'Please Enter a Number: (MAX 99)' placeholder='Number of Reps' required>";

$weeklycardiosql = "SELECT distance FROM cardiodb WHERE username='$currentuser' AND date_log BETWEEN '$most_recent_sunday' AND '$next_saturday'";
$wcardio = $conn->query($weeklycardiosql);
$weeklycardiocompleted = 0;

$dailycardiosql = "SELECT distance FROM cardiodb WHERE username='$currentuser' AND date_log >= '$input'";
$dcardio = $conn->query($dailycardiosql);
$dailycardiocompleted = 0;

$workoutscompleted = "SELECT id,exercise,date_log,sets,rep,weight FROM exercisedb WHERE username='$currentuser' AND date_log ='$input'";
$workouts = $conn->query($workoutscompleted);

$tablecontent = "";
while ($row = $workouts->fetch_assoc()) {
    //print_r($row);
    $exname = $row["exercise"];
    $sets = $row["sets"];
    $reps = $row["rep"];
    $weight = $row["weight"];
    $idname = $row["id"];
    $tablecontent = $tablecontent . "<form action=../src/data/exerciseBE/delete_form.php method=post> <tr><td>" . $exname . "</td><td>" . $sets . "</td><td>" . $reps . "</td><td>" . $weight . "</td><td> <input type='hidden' name='idnameDel' value='$idname'><input type='hidden' name='exnameDel' value='$exname'><input type='hidden' name='setsDel' value='$sets'><input type='hidden' name='repsDel' value='$reps'><input type='hidden' name='weightDel' value='$weight'> <button type = 'submit' class = 'deleteButton'>×</button> </td></tr>  </form>";
}

$workoutscompleted = "SELECT exercise,date_log FROM exercisedb WHERE username='$currentuser' AND date_log ='$input'";
$workouts = $conn->query($workoutscompleted);

while ($row = $workouts->fetch_assoc()) {

    $t = $row["exercise"];
    $excercisescompleted = "SELECT * FROM workoutdb WHERE exercise='$t'";
    $excercises = $conn->query($excercisescompleted);
    while ($rows = $excercises->fetch_assoc()) {
        if ($rows["traps"] == '1') {
            $traps = $worked;
        }
        if ($rows["lowerchest"] == '1') {
            $lowerchest = $worked;
        }
        if ($rows["upperchest"] == '1') {
            $upperchest = $worked;
        }
        if ($rows["frontdeltoid"] == '1') {
            $frontdeltoid = $worked;
        }
        if ($rows["bicep"] == '1') {
            $bicep = $worked;
        }
        if ($rows["tricep"] == '1') {
            $tricep = $worked;
        }
        if ($rows["forearm"] == '1') {
            $forearm = $worked;
        }
        if ($rows["abs"] == '1') {
            $abs = $worked;
        }
        if ($rows["obliques"] == '1') {
            $obliques = $worked;
        }
        if ($rows["hipflexor"] == '1') {
            $hipflexor = $worked;
        }
        if ($rows["quads"] == '1') {
            $quads = $worked;
        }
        if ($rows["reardeltoid"] == '1') {
            $reardeltoid = $worked;
        }
        if ($rows["lats"] == '1') {
            $lats = $worked;
        }
        if ($rows["lowerback"] == '1') {
            $lowerback = $worked;
        }
        if ($rows["glutes"] == '1') {
            $glutes = $worked;
        }
        if ($rows["hamstrings"] == '1') {
            $hamstrings = $worked;
        }
        if ($rows["calves"] == '1') {
            $calves = $worked;
        }

    }

}

while ($row = $wcardio->fetch_assoc()) {
    $weeklycardiocompleted += $row['distance'];

}

while ($row = $dcardio->fetch_assoc()) {
    $dailycardiocompleted += $row['distance'];

}


$accomplishedmiles = $dailycardiocompleted;
//$migoal = "1.35";
//$calcons = "900";
//$calgoal = "2100";
//if execstatus == "completed"
//if ($execval == "Completed") {
//    $execstatus = "360deg";
//} else {
//    $execstatus = "20deg";
//}

$weeklymi = $weeklycardiocompleted;

$stmtgoal = $conn->prepare("SELECT CardioGoal FROM UserProfileDB WHERE email = ?");
$stmtgoal->bind_param("s", $email);

// Execute the statement
$stmtgoal->execute();

// Get the result
$resultgoal = $stmtgoal->get_result();

// Fetch the data
$rowgoal = $resultgoal->fetch_assoc();
if ($rowgoal['CardioGoal'] === null) {
    $weeklygoal = '0.00';
} else {
    $weeklygoal = $rowgoal['CardioGoal'];
}
;

$stmtgoal->close();


if ($weeklymi < $weeklygoal) {
    $covpx = strval(1 - (floatval($weeklymi) / floatval($weeklygoal)));
    $desktopcovpx = ($covpx * 300) . "px";
    $mobilecovpx = ($covpx * 600) . "px";
} else {
    $desktopcovpx = "0px";
    $mobilecovpx = "0px";
}

//$dct = strval(round(floatval($accomplishedmiles) / floatval($migoal) * 360) + 20);
//$dailycardiopct = $dct . "deg";
//$wct = strval(round(floatval($weeklymi) / floatval($weeklygoal) * 360) + 20);
//$weeklycardiopct = $wct . "deg";



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