<?php
date_default_timezone_set('US/Eastern');

echo "<hr>";
$currentDate = date('Y-m-d H:i:s');
echo "<b> Date and time of page access is $currentDate </b>";
echo "<br/>";
echo "<br/>";
$randNumber = rand(0,100000);
echo "<b> Welcome visitor! the random number associated with your visit is $randNumber!</b";
?>
