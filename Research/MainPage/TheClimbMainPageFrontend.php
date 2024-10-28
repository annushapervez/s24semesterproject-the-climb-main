<html>

<head>
    <title>The Climb</title>
    <link rel="stylesheet" href="mainpage.css">
</head>

<?php
include("backendfile.php"); ?>


<body>
    <div style="width: 100%; height: 100%; position: relative; background: #4A4A4A">
        <div id="leftrect" style="width: 248px; height: 317px; left: 80px; top: 156px; position: absolute">
            <div
                style="width: 325px; height: 517px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 27px">
            </div>
            <div style="width: 229px; height: 293px; left: 19px; top: 38px; position: absolute">
                <div
                    style="width: 250px; height: 250px; left: 14px; top: 42px; position: absolute; background: #070707; border-radius: 9999px">
                </div>
                <div
                    style="width: 225px; height: 225px; left: 25px; top: 53px; position: absolute; background: #D9D9D9; border-radius: 9999px">
                </div>
                <div style="width: 200px; height: 200px; left: 35px; top: 65px; position: absolute; background: conic-gradient(#1A60E7 235deg,
                    #d9d9d9 0);; border-radius: 9999px">
                </div>
                <div
                    style="width: 175px; height: 175px; left: 47px; top: 77px; position: absolute; background: #D9D9D9; border-radius: 9999px">
                </div>
                <div style="width: 150px; height: 150px; left: 55px; top: 90px; position: absolute; background: conic-gradient(#163F8C 180deg,
                    #d9d9d9 0); border-radius: 9999px">
                </div>
                <div
                    style="width: 125px; height: 125px; left: 67px; top: 102px; position: absolute; background: #D9D9D9; border-radius: 9999px">
                </div>
                <div style="width: 100px; height: 100px; left: 79px; top: 115px; position: absolute; background:conic-gradient(#D52C73 360deg,
                    #d9d9d9 0); border-radius: 9999px">
                </div>
                <div
                    style="width: 75px; height: 75px; left: 91px; top: 128px; position: absolute; background: #D9D9D9; border-radius: 9999px">
                </div>
                <div
                    style="width: 1px; height: 9px; left: 91px; top: 65px; position: absolute; transform: rotate(180deg); transform-origin: 0 0; border: 1px #D9D9D9 solid">
                </div>
                <div
                    style="width: 1px; height: 8px; left: 91px; top: 85px; position: absolute; transform: rotate(180deg); transform-origin: 0 0; border: 1px #D9D9D9 solid">
                </div>
                <div style="width: 229px; height: 293px; left: 0px; top: 0px; position: absolute">
                    <div style="width: 229px; height: 73px; left: 0px; top: 320px; position: absolute">
                        <div
                            style="width: 15px; height: 11px; left: 0px; top: 38px; position: absolute; background: #163F8C">
                        </div>
                        <div
                            style="width: 15px; height: 11px; left: 0px; top: 2px; position: absolute; background: #1A60E7">
                        </div>
                        <div
                            style="width: 15px; height: 11px; left: 0px; top: 78px; position: absolute; background: #D52C73">
                        </div>
                        <div
                            style="width: 205px; height: 39px; left: 24px; top: 0px; position: absolute; color: black; font-size: 16px; font-family: arial; font-weight: 400; word-wrap: break-word">
                            <?php
                            include("TheClimbMainPageBackend.php");
                            echo "<div>  Calories: $calcons/$calgoal kCal</div>"; ?>
                            </br>
                            <?php
                            include("TheClimbMainPageBackend.php");
                            echo "<div>Cardio: $accomplishedmiles/$migoal Miles</div>"; ?>
                            </br>
                            <?php
                            include("TheClimbMainPageBackend.php");
                            echo "<div>Weight Training:
                            $execstatus</div>"; ?>
                        </div>
                    </div>
                    <div
                        style="left: 60px; top: -30px; position: absolute; color: black; font-size: 25px; font-family: arial; font-weight: 500; word-wrap: break-word; text-align: center;">
                        Daily Overview</div>

                </div>
            </div>
        </div>
        <div id="middle" style="width: 397px; height: 329px; left: 500px; top: 156px; position: absolute">
            <div
                style="width: 497px; height: 517px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 37px">
            </div>
            <div
                style="left: 85px; top: 8px; position: absolute; color: black; font-size: 25px; font-family: arial; font-weight: 500; ">
                Muscles Worked This Week</div>
            <div style="width: 329px; height: 158px; left: 115px; top: 121px; position: absolute">
                <img src="./Front.png" alt="Front">

            </div>
            <div style="width: 329px; height: 158px; left: 275px; top: 121px; position: absolute">
                <img src="./Back.png" alt="Front">

            </div>
            <div style="width: 229px; height: 58px; left: 115px; top: 401px; position: absolute">
                <div
                    style="width: 205px; height: 39px; left: 24px; top: 0px; position: absolute; color: black; font-size: 15px; font-family: arial; font-weight: 400; word-wrap: break-word">
                    Worked this week</div>
                <div
                    style="width: 205px; height: 39px; left: 24px; top: 39px; position: absolute; color: black; font-size: 15px; font-family: arial; font-weight: 400; word-wrap: break-word">
                    Have not worked this week</div>
                <div
                    style="width: 18px; height: 10px; left: 0px; top: 1px; position: absolute; background: #163F8C; border: 1px black solid">
                </div>
                <div
                    style="width: 18px; height: 10px; left: 0px; top: 42.50px; position: absolute; background: rgba(0, 0, 0, 0.25); border: 1px black solid">
                </div>


            </div>
        </div>
    </div>
    <div id='right' style="width: 384px; height: 517px; left: 1106px; top: 156px; position: absolute">
        <div
            style="width: 325px; height: 517px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 37px">
        </div>
        <div
            style="width: 182px; height: 218px; left: 66px; top: 65px; position: absolute; background: #D9D9D9; border: 4px black solid">
        </div>
        <div
            style="left: 80px; top: 8px; position: absolute; color: black; font-size: 25px; font-family: arial; font-weight: 500; word-wrap: break-word">
            Weekly Cardio</div>
        <div style="width: 190px; height: 283px; left: 66px; top: 151px; position: absolute; background: black">
        </div>
        <div style="width: 10px; height: 97px; left: 158px; top: 299px; position: absolute; background: #FFC805">
        </div>
        <div style="width: 10px; height: 96px; left: 158px; top: 153px; position: absolute; background: #FFC805">
        </div>
        <div
            style="width: 205px; height: 39px; left: 109px; top: 458px; position: absolute; color: black; font-size: 16px; font-family: arial; font-weight: 400; word-wrap: break-word">
            <?php
            include("TheClimbMainPageBackend.php");
            echo "<div>Weight Training:
                            $weeklymi/$weeklygoal Miles</div>"; ?>
        </div>
        <div
            style="width: 18px; height: 10px; left: 75px; top: 461.50px; position: absolute; background: black; border: 1px black solid">
        </div>
    </div>

    </div>


</body>

</html>