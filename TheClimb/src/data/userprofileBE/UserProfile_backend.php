<?php
$firstname = "";
$lastname = "";
$email = "";
$age = "";
$gender = "";
$birthday = "";
$height = "";
$weight = "";
$updated_email = "";
$profilepic = '../src/assets/empty.png';

$conn = mysqli_connect("oceanus.cse.buffalo.edu:3306", "annushap", "50309108", "cse442_2024_spring_team_s_db");
function getUserInfoByEmail($conn) {
    $userToken= htmlspecialchars($_COOKIE["token"]);
    $hashedToken= sha1($userToken);
    $emailQuery = "SELECT email FROM climberdb WHERE token=?";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param("s", $hashedToken);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $row = $result1->fetch_assoc();
    $email=$row["email"];

    $userInfoQuery = "SELECT * FROM `UserProfileDB` WHERE `email`=?";
    $stmt =$conn->prepare($userInfoQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $userInfoResult =  $stmt->get_result();

    return array('email' => $email, 'userInfoResult' => $userInfoResult);
}


function updateUserInfo($conn, $profilepic, $firstname, $lastname, $updated_email, $age, $gender, $birthday, $height, $weight) {
    $userInfoData = getUserInfoByEmail($conn);
    $email = $userInfoData['email'];
    $userInfo = $userInfoData['userInfoResult'];

    if (mysqli_num_rows($userInfo) == 0) {
        $query = "INSERT INTO `UserProfileDB` (`email`) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        if($stmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error creating new record: " . $stmt->error;
            return;
        }
    }

    $updateQuery = "UPDATE `UserProfileDB` SET ";
    $bindTypes = "";
    $bindParams = [];
    if ($profilepic != "../src/assets/empty.png") {
        $updateQuery .= "`profilephoto`=?, ";
        $bindTypes .= "s";
        $bindParams[] = &$profilepic;
    }

    if ($firstname != "") {
        $updateQuery .= "`firstName`=?, ";
        $bindTypes .= "s";
        $bindParams[] = &$firstname;
    }

    if ($lastname != "") {
        $updateQuery .= "`lastName`=?, ";
        $bindTypes .= "s";
        $bindParams[] = &$lastname;
    }

    if ($updated_email != "" && $updated_email != $email) {
        $hashedToken = sha1($_COOKIE["token"]);
        $updateEmailQuery = "UPDATE climberdb SET email=? WHERE token=?";
        $stmt = $conn->prepare($updateEmailQuery);
        $stmt->bind_param("ss", $updated_email, $hashedToken);
        if (!$stmt->execute()) {
            echo "Error updating email in climberdb: " . $stmt->error;
        }
        $updateQuery .= "`email`=?, ";
        $bindTypes .= "s";
        $bindParams[] = &$updated_email;
    }

    if ($age != "") {
        $updateQuery .= "`age`=?, ";
        $bindTypes .= "i";
        $bindParams[] = &$age;
    }

    if ($gender != ""){
        $updateQuery .= "`gender`=?, ";
        $bindTypes .= "s";
        $bindParams[] = &$gender;
    }

    if ($birthday != "") {
        $formattedBirthday = date('Y-m-d', strtotime($birthday));
        $updateQuery .= "`birthday`=?, ";
        $bindTypes .= "s";
        $bindParams[] = &$formattedBirthday;
    }

    if ($height != "") {
        $updateQuery .= "`height`=?, ";
        $bindTypes .= "s";
        $bindParams[] = &$height;
    }

    if ($weight != "") {
        $updateQuery .= "`weight`=?, ";
        $bindTypes .= "i";
        $bindParams[] = &$weight;
    }

    $updateQuery = rtrim($updateQuery, ', ');
    $updateQuery .= " WHERE `email`=?";
    $bindTypes .= "s";
    $bindParams[] = &$email;

    $stmt = $conn->prepare($updateQuery);
    call_user_func_array([$stmt, "bind_param"], array_merge([$bindTypes], $bindParams));
    
    if($stmt->execute()) {
        echo "Record inserted/updated successfully.";
    } else {
        echo "Error inserting/updating record: " . $stmt->error;
    }
}
$userInfoData = getUserInfoByEmail($conn);
$email = $userInfoData['email'];
$userInfo = $userInfoData['userInfoResult'];

if ($userInfo && mysqli_num_rows($userInfo) > 0) {
    $userInfo = mysqli_fetch_assoc($userInfo);
        // Update variables with user information
        $firstname = $userInfo['firstName'];
        $lastname = $userInfo['lastName'];
        $age = $userInfo['age'];
        $gender = $userInfo['gender'];
        $birthday = $userInfo['birthday'];
        $height = $userInfo['height'];
        $weight = $userInfo['weight'];
        $profilepic = $userInfo['profilephoto'];
    }

// gather info from server 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['profile-photo'])) {
        $profilepic = $_POST['profile-photo'];
    }

    if (isset($_POST['firstName'])) {
        $firstname = $_POST["firstName"];
    }

    if (isset($_POST['lastName'])) {
        $lastname = $_POST["lastName"];
    }

    if (isset($_POST['email'])) {
        $updated_email = $_POST["email"];
    }

    if (isset($_POST['age'])) {
        $age = $_POST["age"];
    }

    if (isset($_POST['gender'])) {
        $gender = $_POST["gender"];
    }

    if (isset($_POST['birthday'])) {
        $birthday = $_POST["birthday"];
    }

    if (isset($_POST['height'])) {
        $height = $_POST["height"];
    }

    if (isset($_POST['weight'])) {
        $weight = $_POST["weight"];
    }

    echo updateUserInfo($conn, $profilepic, $firstname, $lastname, $updated_email, $age, $gender, $birthday, $height, $weight);
}


function generateImageOptions($imageDirectory) {
    $images = scandir($imageDirectory);
    foreach ($images as $image) {
        if ($image !== '.' && $image !== '..') {
            $imagePath = $imageDirectory . $image;
            echo '<label>';
            echo '<input type="radio" name="profile-photo" value="' . $imagePath . '">';
            echo '<img src="' . $imagePath . '" alt="' . $image . '">';
            echo '</label>';
        }
    }
}


?>