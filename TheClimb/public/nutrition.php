<?php global $requested_date, $meals, $curr_date;
date_default_timezone_set('US/Eastern');
session_start() ;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php

$month = date("m");
$day = date("d");
$year = date("Y");
$today = $year . '-' . $month . '-' . $day;
$message = "";

if (isset($_GET['date'])) { //check if form was submitted
    $input = $_GET['date']; //get input text
    $message = "You entered: " . $input;
} else {
    $input = $today;
}
// Grabbing the calorie goal
require '../src/data/nutritionBE/dbConnection.php';
require("../src/data/nutritionBE/mealProcessing.php");


$mealAndInfo = buildMealAndInfo($input);

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <title> Nutrition </title>
    <link rel="stylesheet" href="../src/TheClimb.css">
    <!--    <script src="../src/scripts/nutrition.js"> </script>-->
<!--    <link rel="stylesheet" type="text/css" href="../src/css/bootstrap.css"/>-->
    <link rel="stylesheet" type="text/css" href="../src/css/jquery-ui.css"/>

</head>
<!--<body onload="refresh()">-->
<body>
<?php
require("../src/components/header.php");
require ("../src/scripts/verify_profile.php");
?>

<div class="pre-content">

    <div class="rounded-box-cal">
        <div class="side-element-cal">
            <!-- Your content for the first side element goes here -->
            <label for="start">Meals for date:</label>

        </div>

        <div class="side-element">
            <form name="form" action="" method="get">
                <!-- Your content for the second side element goes here -->
                <?php
                echo "<b> $input </b>";

                echo '<input type="date" id="date" name="date" value= ' . $input . ' min="2018-01-01" max="2099-12-31 on" />';

                ?>


                <input type="submit" value="Submit"/>
            </form>

        </div>

    </div>

    <div class="modalForms">
        <!--    Calorie goal modal-->
        <div id="calGoal" class="formModal">
            <!-- Trigger/Open The Modal -->
            <button class="formButton" id="calBtn">Set Calorie Goal</button>
            <div id="calModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="calClose" class="close">&times;</span>
                    <form class = "calorieForm" id="calorieForm" action="../src/data/nutritionBE/nutritionBEDB.php" method="get">
                        <label for="calories">Calorie Goal</label>
                        <input type="number" id= "calories" name="calories" placeholder="enter your calorie goal" required>
                        <input type="submit" value="Submit" name="submit" id="submit">
                    </form>


                    <p style="display: none;" id="calorieNotification">Calorie goal set!</p>
                </div>

            </div>
        </div>
        <!--Nutreints Modal-->
        <div id="setNutrients" class="formModal">
            <!-- Trigger/Open The Modal -->
            <button class="formButton" id="nutrientsBtn">Track Nutrients</button>
            <div id="nutrientsModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="nutrientsClose" class="close">&times;</span>
                    <form id="nutrientForm" action="../src/data/nutritionBE/nutritionBEDB.php" method="get" class="nutrientForm">

                        <div class="nutrientCheckboxes">
                            <input type="checkbox" id="carbCount" name="nutrients[]" value="carbs">
                            <label for="carbCount"> Carbs</label>
                        </div>
                        <div class="nutrientCheckboxes">
                            <input type="checkbox" id="proteinCount" name="nutrients[]" value="protein">
                            <label for="proteinCount"> Protein</label>
                        </div>
                        <div class="nutrientCheckboxes">
                            <input type="checkbox" id="fatCount" name="nutrients[]" value="fat">
                            <label for="fatCount"> Fat</label>
                        </div>
                        <input type="hidden" id="fatCount" name="nutrients[]" value="">

                        <input type="submit" value="Submit" name="submit" id="submit">

                    </form>

                    <p style="display: none;" id="nutrientNotification">Nutrient preferences set!</p>
                </div>

            </div>
        </div>
        <!--    Add meal modal-->
        <div id="addMeal" class="formModal">
            <!-- Trigger/Open The Modal -->
            <button  class="formButton" id="mealBtn">Add a meal</button>
            <div id="mealModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="mealClose" class="close">&times;</span>
                    <form id="mealForm" action="../src/data/nutritionBE/nutritionBEDB.php" method="get" class="nutrientForm">

                        <?php
                        echo "<input type='hidden' value='$input' name='mealInfo[]'>" ?>

                        <div class = "mealInfo">
                            <label for="mealName">Meal Name (required)</label>
                            <input type="text" id= "mealName" name="mealInfo[]" placeholder="Name of meal" required>

                        </div>

                        <div class = "mealInfo">
                            <label for="mealCalories">Meal Calories (required)</label>
                            <input type="number" min="0"  id= "mealCalories" name="mealInfo[]" required>

                        </div>

                        <div class = "mealInfo">
                            <label for="mealCarbs">Meal Carbs (grams)</label>
                            <input type="number" step="0.01" min=".01" id= "mealCarbs" name="mealInfo[]">

                        </div>

                        <div class = "mealInfo">
                            <label for="mealProtein">Meal Protein (grams)</label>
                            <input type="number" step="0.01" min=".01" id= "mealProtein" name="mealInfo[]">

                        </div>

                        <div class = "mealInfo">
                            <label for="mealFat">Meal Fat (grams)</label>
                            <input type="number" step="0.01" min=".01" id= "mealFat" name="mealInfo[]">

                        </div>
                        <input type="submit" value="Submit" name="submit" id="submit">




                    </form>
                    <form action="../src/data/nutritionBE/nutritionBEDB.php" method="GET" id="dupeMealForm">
                        <div class="auto-widget">
                            <?php
                            echo "<input type='hidden' value='$input' name='existingMeal[]'>" ?>
                            <label for="search">OR select from previously added meals</label>
                            <input class="form-control" placeholder="Name of meal" id="search" type="text" name="existingMeal[]"/>
                            <input type="submit" value="Submit" name="submit" id="submit">

                        </div>
                    </form>
                    <p style="display: none;" id="mealNotification">Meal added!</p>
                </div>

            </div>

        </div>
    </div>

</div>


<div class="content">
    <div class="rounded-box-content">
        <div class="side-element">
            <!-- Your content for the first side element goes here -->
            <h2 class="color-title"> Meals </h2>
        </div>

        <div class="side-element">
            <ol>
                <?php
                echo $mealAndInfo["mealData"];
                ?>
            </ol>

        </div>
    </div>

    <div class="rounded-box-content">
        <div class="side-element">
            <!-- Your content for the first side element goes here -->
            <h2 class="color-title"> Nutrition </h2>

        </div>
        <div class="side-element">
            <ol>
                <?php
                echo $mealAndInfo["calorieData"];
                ?>

        </div>

    </div>
</div>


<script src="../src/scripts/jquery-3.2.1.min.js"></script>
<script src="../src/scripts/jquery-ui.js"></script>
<script type="text/javascript">
    // $(document).ready(function(){
    //     $("#search").autocomplete({
    //         source: '/CSE442-542/2024-Spring/cse-442s/TheClimb/src/data/nutritionBE/search.php',
    //         minLength: 0,
    //         autoFocus: true,
    //         select: itemSelected
    //
    //     })
    //     function itemSelected(event,ui) {
    //         var allowSubmit = true;
    //         console.log("something was selected")
    //     }
    //
    // });

</script>

<script src="../src/scripts/nutrition.js"></script>


</body>


</html>