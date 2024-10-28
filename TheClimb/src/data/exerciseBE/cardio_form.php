<?php
include 'dbConnection.php';
include 'grabCookie.php';
include 'exercise_backend.php';

$conn = OpenCon();
$user = tokenToUser($conn);
$distance = (float)$_POST['cardiocomp'];
$id = NULL;
 echo $user;

$sql = 'INSERT INTO `cardiodb`(`id`,`username`,`distance`,`date_log`) VALUES (?,?,?,?);';

$cardiostmt = $conn->prepare($sql);

$id=NULL;
//        $user="annushap@buffalo.edu";

echo $conn->error;
$cardiostmt->bind_param("isds",$id,$user,$distance,$input);

if ($cardiostmt->execute() === TRUE) {
    echo "CalorieGoal set successfully, ";
} else {
    echo "Error updating CalorieGoal: " . $conn->error;
}
$cardiostmt->close();
CloseCon($conn);

        
mysqli_query($conn,$sql);

CloseCon($conn);

header("Location: ../../../public/exercise_page.php");