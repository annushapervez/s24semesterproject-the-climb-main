
<?php
include 'dbConnection.php';
include 'grabCookie.php';
include 'exercise_backend.php';

$conn = OpenCon();
$email = tokenToEmail($conn);
$CardioGoal = $_POST['cardiogoal'];


 $sql = 'UPDATE `UserProfileDB` SET `CardioGoal` = ? WHERE `email` = ?';
 $stmt = $conn->prepare($sql);
 echo $conn->error;
 $stmt->bind_param("is", $CardioGoal,$email);
 if ($stmt->execute() === TRUE) {
     echo "CalorieGoal set successfully, ";
 } else {
     echo "Error updating CalorieGoal: " . $conn->error;
 }

 $stmt->close();
 CloseCon($conn);

header("Location: ../../../public/exercise_page.php");