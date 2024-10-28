<?php

date_default_timezone_set('US/Eastern');

$conn = mysqli_connect("oceanus.cse.buffalo.edu:3306", "aidanodo", "50393459", "cse442_2024_spring_team_s_db");

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

$execval = 'Incomplete';
$weeklygoal = "5";


$workoutscompleted = "SELECT exercise,date_log FROM exercisedb WHERE username='$currentuser' AND date_log between date_sub(now(),INTERVAL 1 WEEK) and now()";
$workouts = $conn->query($workoutscompleted);
$weeklygoalsql = "SELECT * FROM UserProfileDB WHERE email='$email'";
$weeklycardiosql = "SELECT distance FROM cardiodb WHERE username='$currentuser' AND date_log between date_sub(now(),INTERVAL 1 WEEK) and now()";
$wcardio = $conn->query($weeklycardiosql);
$wgoals = $conn->query($weeklygoalsql);
$weeklycardiocompleted = 0;

$dailycardiosql = "SELECT distance FROM cardiodb WHERE username='$currentuser' AND date_log >= CURRENT_DATE";
$dcardio = $conn->query($dailycardiosql);
$dailycardiocompleted = 0;
$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('Y-m-d');



while ($row = $workouts->fetch_assoc()) {
    if ($row['date_log'] == $currentDate) {
        $execval = 'Completed';
    }
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

while ($row = $wgoals->fetch_assoc()) {
    if ($row['CardioGoal'] != NULL) {

        $weeklygoal = $row['CardioGoal'];
    }
}

while ($row = $dcardio->fetch_assoc()) {
    $dailycardiocompleted += $row['distance'];

}

$calcons = 0;
$calgoal = '0';
// echo $email;


$usercalgoal = "SELECT * FROM UserProfileDB WHERE email='$email'";
$usercals = $conn->query($usercalgoal);


while ($row = $usercals->fetch_assoc()) {
    $calgoal = $row['CalorieGoal'];
}

$usercalcon = "SELECT * FROM nutrition_table WHERE USER='$email'AND DATE >= CURRENT_DATE";
$usercalcons = $conn->query($usercalcon);


while ($row = $usercalcons->fetch_assoc()) {
    if ($row != NULL) {
        $calcons += intval($row['CALORIES']);
    }
}


// $calcons = strval($calcons);

//echo $calgoal;
$accomplishedmiles = $dailycardiocompleted;




$migoal = strval(round(floatval($weeklygoal) / 7, 2));


//if execstatus == "completed"
if ($execval == "Completed") {
    $execstatus = "360deg";
} else {
    $execstatus = "20deg";
}

if ($calcons == '0') {
    $dailycaloriepct = '20deg';
} else if ($calgoal == '0') {
    $dailycaloriepct = '360deg';
} else {
    $dailycaloriepct = strval(round(floatval($calcons) / floatval($calgoal) * 330) + 20) . "deg";
}

$weeklymi = $weeklycardiocompleted;


if ($weeklymi < $weeklygoal) {
    $covpx = strval(330 - round(floatval($weeklymi) / floatval($weeklygoal) * 330)) . "px";
    $vdub = strval(40 - round(floatval($weeklymi) / floatval($weeklygoal) * 40)) . "vw";
} else {
    $covpx = "0px";
    $vdub = '0vw';
}

$dct = strval(round(floatval($accomplishedmiles) / floatval($migoal) * 360) + 20);
$dailycardiopct = $dct . "deg";
$wct = strval(round(floatval($weeklymi) / floatval($weeklygoal) * 360) + 20);
$weeklycardiopct = $wct . "deg";
