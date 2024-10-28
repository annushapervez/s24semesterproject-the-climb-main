<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'grabCookie.php';
function buildMealAndInfo($date): array
{
//    echo "working";
//    include "dbConnection.php";
    $conn = OpenCon();

    $email = tokenToEmail($conn);


    $mealprefSearch = 'SELECT `mealpref` FROM `UserProfileDB` where email=?';
    $mealstmt = $conn->prepare($mealprefSearch);
    $mealstmt->bind_param("s", $email);
    $mealstmt->execute();
    $mealprefres = $mealstmt->get_result();
    $row = $mealprefres->fetch_assoc();
    $mealprefVal = $row["mealpref"];


    //Work for getting the calorie goal for a user
    $calGoalSearch = 'SELECT `CalorieGoal` FROM `UserProfileDB` where email=?';
    $calGoalStmt = $conn->prepare($calGoalSearch);
    $calGoalStmt->bind_param("s", $email);
    $calGoalStmt->execute();
    $calgoalInfo = $calGoalStmt->get_result();
    $row = $calgoalInfo->fetch_assoc();
    $calGoal = $row["CalorieGoal"];

    CloseCon($conn);



    switch($mealprefVal){
        case 0:
            $visibility= array("carbs" => "dont", "protein" => "dont", "fat" => "dont");
            break;
        case 1:
            $visibility= array("carbs" => "show", "protein" => "show", "fat" => "show");
            break;
        case 2:
            $visibility= array("carbs" => "show", "protein" => "dont", "fat" => "dont");
            break;

        case 3:
            $visibility= array("carbs" => "dont", "protein" => "show", "fat" => "dont");
            break;

        case 4:
            $visibility= array("carbs" => "dont", "protein" => "dont", "fat" => "show");
            break;

        case 5:
            $visibility= array("carbs" => "show", "protein" => "show", "fat" => "dont");
            break;

        case 6:
            $visibility= array("carbs" => "show", "protein" => "dont", "fat" => "show");
            break;

        case 7:
            $visibility= array("carbs" => "dont", "protein" => "show", "fat" => "show");
            break;
        default:
            $visibility = array("carbs" => "null", "protein" => "null", "fat" => "null");
            echo "should never reach this case";
    }



    $conn = OpenCon();
    $mealInfo = 'SELECT `MEAL`, `CALORIES`, `CARBS`,`PROTEIN`, `FAT` 
    FROM `nutrition_table` where `USER`=? AND `DATE`=?';

    $stmt = $conn->prepare($mealInfo);
    echo $conn->error;

    $stmt->bind_param("ss",$email, $date);

//    $result =
    $stmt->execute();

    $mealRes= $stmt->get_result();

    $mealList="";

    $nutrientsList="";

    $totalCalories=0;

    while($row = $mealRes->fetch_assoc()){
//        echo implode("-", $row);;
        $meal = $row["MEAL"];
        $mealList .= "<li class='mealName'>" . $meal . "</li><br/>";

        $calories = $row["CALORIES"];
        $carbs = $row["CARBS"];
        $protein = $row["PROTEIN"];
        $fat = $row["FAT"];
        $carbVisibility= $visibility['carbs'];
        $proteinVisibility = $visibility['protein'];
        $fatVisibility = $visibility['fat'];
        $totalCalories+=$calories;

        $nutrientsList .= "<li class = 'nutrientValues'>
            <p class= 'nutrientValue '>Calories: " . $calories . "</p>
            <p class= 'nutrientValue $carbVisibility'> | Carbs: " . $carbs . "</p>
            <p class= 'nutrientValue $proteinVisibility'> | Protein: " . $protein . "</p>
            <p class= 'nutrientValue $fatVisibility'> | Fat: " . $fat . "</p>
            </li><br/>";

    }
    $nutrientsList .="<p> Total Calories: $totalCalories / $calGoal</p>";

    $returnArray= array(
        "mealData" => $mealList,
        "calorieData" => $nutrientsList,
    );


    return $returnArray;
}





?>