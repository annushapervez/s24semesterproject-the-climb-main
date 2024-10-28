<?php

function findNutrientID(){
    $nutrientString = implode(', ', $_GET['nutrients']);

    if (str_contains($nutrientString,"carbs") &&
        str_contains($nutrientString,"protein") &&
        str_contains($nutrientString,"fat")){$nutrientsToShow=1;}

    elseif (str_contains($nutrientString,"carbs") &&
        str_contains($nutrientString,"protein")) {$nutrientsToShow=5;}

    elseif (str_contains($nutrientString,"carbs") &&
        str_contains($nutrientString,"fat")) {$nutrientsToShow=6;}

    elseif (str_contains($nutrientString,"fat") &&
        str_contains($nutrientString,"protein")) {$nutrientsToShow=7;}

    elseif (str_contains($nutrientString,"carbs")) {$nutrientsToShow=2;}
    elseif (str_contains($nutrientString,"protein")) {$nutrientsToShow=3;}
    elseif (str_contains($nutrientString,"fat")) {$nutrientsToShow=4;}
    else{$nutrientsToShow=0;}

    return $nutrientsToShow;

}

?>