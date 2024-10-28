<?php
function OpenCon()
{
    $serverName = "oceanus.cse.buffalo.edu";
    $dbuser = "donovanb";
    $dbpassword = "50395746";
    $dbname = "cse442_2024_spring_team_s_db";

//echo "working";

    $conn = new mysqli($serverName, $dbuser, $dbpassword, $dbname, 3306) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}
function CloseCon($conn)
{
    $conn -> close();
    return $conn;
}
?>