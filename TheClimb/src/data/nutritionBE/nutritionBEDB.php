<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'dbConnection.php';
include 'grabCookie.php';
include 'setNutrients.php';
//echo "working";
$conn = OpenCon();
//echo "Connected Successfully, ";

//Upload information to the DB
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = tokenToEmail($conn);

    if (isset($_GET["calories"])) {
        $calorieGoal = (int)$_GET["calories"];



        $sql = 'UPDATE `UserProfileDB` SET `CalorieGoal` = ? WHERE `email` = ?';
        $stmt = $conn->prepare($sql);
        echo $conn->error;
        $stmt->bind_param("is", $calorieGoal,$email);
        if ($stmt->execute() === TRUE) {
            echo "CalorieGoal set successfully, ";
        } else {
            echo "Error updating CalorieGoal: " . $conn->error;
        }

        echo "Calorie Goal: " . $calorieGoal;
        $stmt->close();
        CloseCon($conn);



    }
    elseif (isset($_GET["nutrients"])){

        if (!function_exists('str_contains')) {
            function str_contains(string $haystack, string $needle): bool
            {
                return '' === $needle || false !== strpos($haystack, $needle);
            }
        }

        echo implode(', ', $_GET['nutrients']);
        $nutrientsToShow =findNutrientID();




        $sql = 'UPDATE `UserProfileDB` SET `mealpref` = ? WHERE `email` = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $nutrientsToShow,$email);
        if ($stmt->execute() === TRUE) {
            echo "Nutrients set successfully, ";
        } else {
            echo "Error updating CalorieGoal: " . $conn->error;
        }




        echo "mealPrefID:" . $nutrientsToShow;
        $stmt->close();
        CloseCon($conn);





        //Do DB stuff via the for loop
//        foreach( $_POST["nutrients"] as $stuff ) {
//            echo "$stuff";
//        }

    }
    elseif (isset($_GET["mealInfo"])){

        $mealArr = $_GET['mealInfo'];
        echo "Meal date: " . (string)$mealArr[0] . ", ";
        echo "Meal name: " . (string)$mealArr[1] . ", ";
        echo "Calories: " . (float)$mealArr[2] . ", ";
        echo "Carbs: " . (float)$mealArr[3] . ", ";
        echo "Fat: " . (float)$mealArr[4] . ", ";
        echo "Protein: " . (float)$mealArr[5];


        $sql = 'INSERT INTO `nutrition_table` (`id`, `USER`, `MEAL`, `CALORIES`, `CARBS`, `PROTEIN`, `FAT`, `DATE`) 
                VALUES (?,?,?,?,?,?,?,?);';

        $stmt = $conn->prepare($sql);

        $id=NULL;
//        $user="annushap@buffalo.edu";

        $mealArr[1] = htmlspecialchars($mealArr[1]);
        echo $conn->error;
        $stmt->bind_param("issdddds",
            $id,$email,$mealArr[1],$mealArr[2],$mealArr[3],$mealArr[4],$mealArr[5],$mealArr[0]);

        if ($stmt->execute() === TRUE) {
            echo "Meal added successfully, ";
        } else {
            echo "Error adding meal: " . $conn->error;
        }
        $stmt->close();
        CloseCon($conn);


    }
    elseif (isset($_GET["existingMeal"])){

        $mealDate = $_GET["existingMeal"][0];
        $meal2Add =  $_GET["existingMeal"][1];

        echo "<p>" . $mealDate . "!<p/>";
        echo "<p>" . $meal2Add . "!<p/>";


        $mealInfo = "SELECT `MEAL`, `CALORIES`, `CARBS`,`PROTEIN`, `FAT` 
    FROM `nutrition_table` where `USER`=? AND `MEAL` = ? LIMIT 1";

        $stmt = $conn->prepare($mealInfo);
        echo $conn->error;

        $stmt->bind_param("ss",$email,$meal2Add);

//    $result =
        $stmt->execute();

        $mealRes= $stmt->get_result();




        while($row = $mealRes->fetch_assoc()) {
//        echo implode("-", $row);;
            $meal = $row["MEAL"];
            $calories = $row["CALORIES"];
            $carbs = $row["CARBS"];
            $protein = $row["PROTEIN"];
            $fat = $row["FAT"];

            $sql = 'INSERT INTO `nutrition_table` (`id`, `USER`, `MEAL`, `CALORIES`, `CARBS`, `PROTEIN`, `FAT`, `DATE`) 
                VALUES (?,?,?,?,?,?,?,?);';

            $stmt = $conn->prepare($sql);
            $id=NULL;
            echo $conn->error;

            $stmt->bind_param("issdddds",
                $id,$email,$meal,$calories,$carbs,$protein,$fat,$mealDate);

            if ($stmt->execute() === TRUE) {
                echo "Meal added successfully, ";
            } else {
                echo "Error adding meal: " . $conn->error;
            }
            $stmt->close();
            CloseCon($conn);

        }
    }

    else{
        echo "something went wrong";
    }
}


else{
    // Handle the case when the form is not submitted
    echo "Form not submitted.";
}

//echo $dbc;

?>