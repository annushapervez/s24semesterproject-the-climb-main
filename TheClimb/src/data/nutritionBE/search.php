<?php
require_once 'dbConnection.php';
require_once 'grabCookie.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = OpenCon();
$email = tokenToEmail($conn);
$search = $_GET['term'];

//$query = $conn->query("SELECT * FROM `nutrition_table` WHERE `MEAL` LIKE '%$search%' ORDER BY `MEAL` ASC") or die(mysqli_connect_errno());
$query = $conn->query("SELECT DISTINCT `MEAL` FROM `nutrition_table` WHERE `USER`='$email' AND `MEAL` LIKE '%$search%' ORDER BY `MEAL` ASC") or die(mysqli_connect_errno());




$list = array();
$rows = $query->num_rows;

if($rows > 0){
    while($fetch = $query->fetch_assoc()){
        $data['value'] = $fetch['MEAL'];
        array_push($list, $data);
    }
}

echo json_encode($list);
?>