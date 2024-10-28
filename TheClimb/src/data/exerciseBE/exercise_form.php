<?php
include 'dbConnection.php';
include 'grabCookie.php';
include 'exercise_backend.php';

$conn = OpenCon();
$user = tokenToUser($conn);
$exname =$_POST['selectname'];
$insets = (int)$_POST['sets'];
$inreps = (int)$_POST['reps'];
$inweight = (int)$_POST['weight'];
$id = NULL;
 echo $user;

 // this is where i left off please start here and finish logging to exercises and then check post in chrome and how to read it.

$sql = 'INSERT INTO `exercisedb`(`id`,`username`,`date_log`,`exercise`,`sets`,`rep`,`weight`) VALUES (?,?,?,?,?,?,?);';

$exercisestmt = $conn->prepare($sql);

$id=NULL;
//        $user="annushap@buffalo.edu";

echo $conn->error;
$exercisestmt->bind_param("isssiii",$id,$user,$input,$exname,$insets,$inreps,$inweight);

if ($exercisestmt->execute() === TRUE) {
    echo "exercise added set successfully, ";
} else {
    echo "Error updating exercise: " . $conn->error;
}
$exercisestmt->close();
CloseCon($conn);

        
mysqli_query($conn,$sql);

CloseCon($conn);

header("Location: ../../../public/exercise_page.php");