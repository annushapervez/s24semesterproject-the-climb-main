<?php
include 'dbConnection.php';
include 'grabCookie.php';
include 'exercise_backend.php';



$conn = OpenCon();
$userd = tokenToUser($conn);
$exnamed =$_POST['exnameDel'];
$insetsd = (int)$_POST['setsDel'];
$inrepsd = (int)$_POST['repsDel'];
$inweightd = (float)$_POST['weightDel'];
$idnamed = (int)$_POST['idnameDel'];
 echo $userd;

 // this is where i left off please start here and finish logging to exercises and then check post in chrome and how to read it.

$sql = "DELETE FROM `exercisedb` WHERE `id` = ? AND`username` = ? AND `date_log` = ? AND `exercise` = ? AND `sets` = ? AND `rep` = ? AND `weight` = ?";

$exercisestmt = $conn->prepare($sql);

$id=NULL;//        $user="annushap@buffalo.edu";

echo $conn->error;
$exercisestmt->bind_param("isssiid",$idnamed,$userd,$input,$exnamed,$insetsd,$inrepsd,$inweightd);

if ($exercisestmt->execute() === TRUE) {
    echo "exercise deleted successfully, ";
} else {
    echo "Error updating exercise: " . $conn->error;
}
$exercisestmt->close();
CloseCon($conn);

        
mysqli_query($conn,$sql);

CloseCon($conn);

header("Location: ../../../public/exercise_page.php");