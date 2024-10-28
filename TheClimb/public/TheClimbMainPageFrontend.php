<html>

<head>
    <title>The Climb</title>

    <link rel="stylesheet" href="../src/TheClimb.css">
</head>

<?php
include ("../src/data/mainpageBE/TheClimbMainPageBackend.php"); ?>

<?php
require ("../src/components/header.php");
require ("../src/scripts/verify_profile.php");

?>

<body>
    <div class='mainpage'>
        <div class='boxes'>
            <div class='leftbox'>
                <div class='boxheaders'>Daily Overview</div>
                <div class='pie'>
                    <div style="width: 229px; height: 293px; left: 19px; top: 38px; position: absolute">
                        <div
                            style="width: 250px; height: 250px; left: 14px; top: 42px; position: absolute; background: #070707; border-radius: 9999px">
                        </div>
                        <div
                            style="width: 225px; height: 225px; left: 25px; top: 53px; position: absolute; background: #D9D9D9; border-radius: 9999px">
                        </div>
                        <div style="width: 200px; height: 200px; left: 37px; top: 65px; position: absolute; background: conic-gradient(#1A60E7  <?= $dailycaloriepct ?>,
                    #d9d9d9 0);; border-radius: 9999px">
                        </div>
                        <div
                            style="width: 175px; height: 175px; left: 49px; top: 78px; position: absolute; background: #D9D9D9; border-radius: 9999px">
                        </div>
                        <div style="width: 150px; height: 150px; left: 61px; top: 90px; position: absolute; background: conic-gradient(#163F8C <?= $dailycardiopct ?>,
                    #d9d9d9 0); border-radius: 9999px">
                        </div>
                        <div
                            style="width: 125px; height: 125px; left: 73px; top: 102px; position: absolute; background: #D9D9D9; border-radius: 9999px">
                        </div>
                        <div style="width: 100px; height: 100px; left: 85px; top: 115px; position: absolute; background:conic-gradient(#D52C73  <?= $execstatus ?>,
                    #d9d9d9 0); border-radius: 9999px">
                        </div>
                        <div
                            style="width: 75px; height: 75px; left: 98px; top: 128px; position: absolute; background: #D9D9D9; border-radius: 9999px">
                        </div>


                    </div>
                </div>
                <div class='daily-stats'>
                    <div class='daily-key1'>
                        <div class='calorieskeybox'></div>
                        <div class='caloriesdailytext'>
                            <?php
                            echo "<div>Calories: $calcons/$calgoal kCal</div>"; ?>

                        </div>
                    </div>
                    <div class='daily-key1'>
                        <div class='cardiokeybox'></div>
                        <div class='cardiodailytext'>
                            <?php
                            echo "<div>Cardio: $accomplishedmiles/$migoal Miles</div>"; ?>

                        </div>
                    </div>
                    <div class='daily-key1'>
                        <div class='workoutkeybox'></div>
                        <div class='workoutdailytext'>
                            <?php
                            echo "<div>Weight Training: $execval</div>"; ?>

                        </div>
                    </div>
                </div>

            </div>
            <div class='middlebox'>
                <div class='boxheaders'>Muscles Worked This Week</div>
                <div class="humanbody">
                    <div class="body-front">


                        <div class="traps-outline-left"></div>
                        <div class="traps-outline-right"></div>
                        <div class="traps-outline-bottom"></div>

                        <div class="traps"></div>
                        <div class="neck"></div>

                        <div class="obliques"></div>
                        <div class="right-arm-outline-r"></div>
                        <div class="right-arm"></div>
                        <div class="left-arm-outline-r"></div>
                        <div class="left-arm"></div>

                        <div class="left-tricep-outline"></div>
                        <div class="right-tricep-outline"></div>
                        <div class="left-tricep"></div>
                        <div class="right-tricep"></div>
                        <div class="left-bicep"></div>
                        <div class="right-bicep"></div>

                        <div class="right-hand"></div>
                        <div class="left-hand"></div>

                        <div class="front-shoulder-outline-left"></div>
                        <div class="front-shoulder-outline-bottom"></div>
                        <div class="front-shoulder"></div>
                        <div class="front-shoulder-outline-top"></div>
                        <div class="rfront-shoulder-outline-left"></div>
                        <div class="rfront-shoulder-outline-bottom"></div>
                        <div class="rfront-shoulder"></div>
                        <div class="rfront-shoulder-outline-top"></div>
                        <div class="lshoulder-outline-left"></div>
                        <div class="lshoulder-outline-right"></div>
                        <div class="lshoulder"></div>
                        <div class="lshoulder-outline-bottom"></div>

                        <div class="lshoulder-outline-top"></div>

                        <div class="rshoulder-outline-left"></div>
                        <div class="rshoulder-outline-right"></div>
                        <div class="rshoulder"></div>
                        <div class="rshoulder-outline-bottom"></div>

                        <div class="rshoulder-outline-top"></div>

                        <div class="chest-outline-left"></div>
                        <div class="chest-outline-right"></div>
                        <div class="chest"></div>



                        <div class="chest-outline-top"></div>

                        <div class="lower-chest-outline-left"></div>
                        <div class="lower-chest-outline-right"></div>
                        <div class="lower-chest"></div>
                        <div class="chest-outline-bottom"></div>
                        <div class="lower-chest-outline-bottom"></div>
                        <div class="lower-chest-outline-top"></div>

                        <div class="left-leg-outline-r"></div>
                        <div class="left-leg-outline-l"></div>


                        <div class="right-leg-outline-r"></div>
                        <div class="right-leg-outline-l"></div>
                        <div class="right-leg"></div>
                        <div class="left-leg"></div>
                        <div class="hip-flexor-outline-l"></div>
                        <div class="hip-flexor-l"></div>
                        <div class="hip-flexor-outline-r"></div>
                        <div class="hip-flexor-r"></div>
                        <div class="abs-base"></div>
                        <div class="abs-1"></div>
                        <div class="abs-2"></div>
                        <div class="abs-3"></div>
                        <div class="lower-abs-outline-left"></div>
                        <div class='leg-line'></div>
                        <div class="right-calf-outline-l"></div>
                        <div class="right-calf-outline-r"></div>
                        <div class="left-calf-outline-l"></div>
                        <div class="left-calf-outline-r"></div>
                        <div class="right-calf"></div>
                        <div class="left-calf"></div>
                        <div class="left-foot"></div>
                        <div class="right-foot"></div>
                        <div class="left-knee"></div>
                        <div class="right-knee"></div>
                        <div class="lower-abs"></div>


                        <div class="sternum"></div>
                        <div class="head"></div>

                    </div>

                    <div class="body-back">


                        <div class="neck"></div>

                        <div class="traps-outline-left"></div>
                        <div class="traps-outline-right"></div>
                        <div class="traps-outline-bottom"></div>
                        <div class="head"></div>
                        <div class="traps"></div>

                        <div class="right-arm-outline-r"></div>
                        <div class="right-arm"></div>
                        <div class="left-arm-outline-r"></div>
                        <div class="left-arm"></div>


                        <div class="left-bicep1"></div>
                        <div class="right-bicep1"></div>

                        <div class="right-hand"></div>
                        <div class="left-hand"></div>

                        <div class="front-shoulder-outline-left"></div>
                        <div class="front-shoulder-outline-bottom"></div>
                        <div class="rear-shoulder-l"></div>
                        <div class="front-shoulder-outline-top"></div>
                        <div class="rfront-shoulder-outline-left"></div>
                        <div class="rfront-shoulder-outline-bottom"></div>
                        <div class="rear-shoulder-r"></div>
                        <div class="rfront-shoulder-outline-top"></div>
                        <div class="lshoulder-outline-left"></div>
                        <div class="lshoulder-outline-right"></div>
                        <div class="lshoulder-rear"></div>
                        <div class="lshoulder-outline-bottom"></div>

                        <div class="lshoulder-outline-top"></div>

                        <div class="rshoulder-outline-left"></div>
                        <div class="rshoulder-outline-right"></div>
                        <div class="rshoulder-rear"></div>
                        <div class="rshoulder-outline-bottom"></div>

                        <div class="rshoulder-outline-top"></div>

                        <div class="left-leg-outline-r"></div>
                        <div class="left-leg-outline-l"></div>
                        <div class="left-knee"></div>
                        <div class="right-knee"></div>

                        <div class="right-leg-outline-r"></div>
                        <div class="right-leg-outline-l"></div>
                        <div class="right-hamstring"></div>
                        <div class="left-hamstring"></div>
                        <div class="hip-flexor-outline-l"></div>
                        <div class="hip-flexor-l"></div>
                        <div class="hip-flexor-outline-r"></div>
                        <div class="hip-flexor-r"></div>
                        <div class="trunk"></div>

                        <div class='shoulder-line'></div>
                        <div class="lat-outline"></div>
                        <div class="lat"></div>

                        <div class="lower-back"></div>


                        <div class="bottom-left-glute-outline"></div>
                        <div class="bottom-right-glute-outline"></div>
                        <div class="bottom-left-glute-outline-b"></div>
                        <div class="bottom-right-glute-outline-b"></div>
                        <div class="middle-glute"></div>

                        <div class="bottom-left-glute"></div>
                        <div class="bottom-right-glute"></div>
                        <div class="top-left-glute-outline"></div>
                        <div class="top-right-glute-outline"></div>
                        <div class="top-left-glute-outline-r"></div>
                        <div class="top-right-glute-outline-r"></div>
                        <div class="top-left-glute"></div>
                        <div class="top-right-glute"></div>



                        <div class="right-calf-outline-l"></div>
                        <div class="right-calf-outline-r"></div>
                        <div class="left-calf-outline-l"></div>
                        <div class="left-calf-outline-r"></div>
                        <div class="right-calf"></div>
                        <div class="left-calf"></div>
                        <div class="left-foot"></div>
                        <div class="right-foot"></div>




                        <div class="back-line"></div>


                    </div>
                </div>
                <div class='daily-stats'>
                    <div class='daily-key2'>
                        <div class='workedbox'></div>
                        <div class='musclesworkedtext'>
                            Worked this week
                        </div>
                    </div>
                    <div class='daily-key2'>
                        <div class='notworkedbox'></div>
                        <div class='musclesnotworkedtext'>
                            Not worked this week
                        </div>
                    </div>
                </div>
            </div>
            <div class='rightbox'>
                <div class='boxheaders'>Weekly Cardio</div>

                <div class='daily-stats'>

                    <div class='daily-key3'>
                        <div class='weeklycardiobox'></div>
                        <br>
                        <div class='weeklycardiotext'>
                            <?php
                            echo "<div> 
                            $weeklymi/$weeklygoal Miles</div>"; ?>
                        </div>
                    </div>
                </div>
                <div class='road'>
                    <div class='street' style=" background: black; border: 4px black solid">
                    </div>




                    <div
                        style="width: 10px; height: 97px; left: 90px; top: 209px; position: absolute; background: #FFC805">
                    </div>
                    <div
                        style="width: 10px; height: 96px; left: 90px; top: 63px; position: absolute; background: #FFC805">
                    </div>
                    <div class='road-cover' style=" left: 4px; top: 3px; position: absolute; background: #D9d9d9">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    .boxes {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        margin-top: 4rem;
        gap: 3rem;


    }

    .mainpage {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
    }

    .leftbox {
        flex: 1;
        text-align: center;
        border-radius: 1rem;
        /* Adjust the border-radius as needed */
        /* Background color of the rounded box */
        padding: 0.2rem;
        background-color: #d9d9d9;
        height: 30rem;
        width: 20rem;
        max-width: 30rem;
        min-width: 15rem;
    }

    .pie {
        left: -18px;
        top: -30px;
        position: relative;
    }

    .middlebox {
        flex: 1;
        text-align: center;
        border-radius: 1rem;
        /* Adjust the border-radius as needed */
        /* Background color of the rounded box */
        padding: 0.2rem;
        background-color: #d9d9d9;
        height: 30rem;
        max-width: 22rem;
        position: relative;
        min-width: 22rem;
    }

    .humanbody {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }

    .body-back {
        flex: 1;
        height: 20px;
    }

    .daily-key1 {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: fit-content;
        justify-content: center;
        gap: 0.5rem;
        margin-left: 2rem;
    }

    .daily-key2 {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: fit-content;
        justify-content: center;
        gap: 0.5rem;
        margin-left: 5rem;

    }

    .daily-key3 {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: fit-content;
        justify-content: center;
        gap: 0.5rem;
        margin-left: 5rem;
    }

    .cardiokeybox {
        height: 1rem;
        width: 1rem;
        background-color: #163F8C;
        border: solid 2px #4A4A4A;
    }

    .notworkedbox {
        height: 1rem;
        width: 1rem;
        background-color: #bbb;
        border: solid 1px black;
        border: solid 2px #4A4A4A;
    }

    .workedbox {
        height: 1rem;
        width: 1rem;
        background-color: #163F8C;
        border: solid 2px #4A4A4A;
    }

    .workoutkeybox {
        height: 1rem;
        width: 1rem;
        background-color: #D52C73;
        border: solid 2px #4A4A4A;
    }

    .calorieskeybox {
        height: 1rem;
        width: 1rem;
        background-color: #1A60E7;
        border: solid 2px #4A4A4A;
    }

    .weeklycardiobox {
        height: 1rem;
        width: 1rem;
        background-color: #000;
        border: solid 2px #4A4A4A;
    }

    .rightbox {
        flex: 1;
        text-align: center;
        border-radius: 1rem;
        /* Adjust the border-radius as needed */
        /* Background color of the rounded box */
        padding: 0.2rem;
        background-color: #d9d9d9;
        height: 30rem;
        max-width: 30rem;
        min-width: 15rem;
    }

    .daily-stats {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        height: 26rem;
        justify-content: flex-end;
        row-gap: 10px;
    }

    .road {

        left: 45px;
        top: -380px;
        position: relative;
    }

    .street {
        width: 182px;
        height: 330px;
    }

    .boxheaders {
        font-size: 1.4rem;
        padding: 0.2rem;
    }

    .road-cover {

        height:
            <?php echo $covpx ?>
        ;
        width: 182px;
    }

    .head {
        display: block;
        width: 34px;
        height: 50px;
        background-color: #4A4A4A;
        /* outline: #000 solid 3px; */
        position: absolute;
        top: 254px;
        left: 650px;
        /* right: -300px; */

        border-radius: 60% 60% 40% 40%/50% 50% 50% 50%;
    }

    .traps {

        border-bottom: 15px solid
            <?php echo $traps ?>
        ;
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        height: 0;
        width: 17px;
        position: absolute;
        top: 300px;
        left: 634px;

    }

    .traps-outline-left {

        border-bottom: 15px solid black;
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        height: 0;
        width: 20px;
        position: absolute;
        top: 300px;
        left: 631px;

    }

    .traps-outline-right {

        border-bottom: 15px solid black;
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        height: 0;
        width: 20px;
        position: absolute;
        top: 300px;
        left: 634px;

    }

    traps-outline-bottom {

        height: 1px;
        width: 79px;
        background-color: black;

        position: absolute;
        top: 314px;
        left: 628px;
    }



    .neck {
        height: 30px;
        width: 20px;
        background-color: #4A4A4A;
        border: solid #000 3px;

        position: absolute;
        top: 290px;
        left: 655px;

    }

    .chest {

        border-bottom: 29px solid
            <?php echo $upperchest ?>
        ;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        height: 0;
        width: 70px;
        position: absolute;
        top: 312px;
        left: 618px;

    }

    .chest-outline-left {

        border-bottom: 29px solid black;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        height: 0;
        width: 70px;
        position: absolute;
        top: 312px;
        left: 616px;

    }

    .chest-outline-right {

        border-bottom: 29px solid black;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        height: 0;
        width: 70px;
        position: absolute;
        top: 312px;
        left: 620;

    }

    .chest-outline-bottom {

        height: 2px;
        width: 99px;
        background-color: black;

        position: absolute;
        top: 340px;
        left: 618px;
    }

    .chest-outline-top {


        height: 3px;
        width: 75px;
        background-color: black;

        position: absolute;
        top: 312px;
        left: 630px;
    }

    .sternum {
        height: 144px;
        width: 3px;
        background-color: #000;
        /* border: solid #000 3px; */

        position: absolute;
        top: 315px;
        left: 666px;

    }

    .lower-chest {

        border-top: 19px solid
            <?php echo $lowerchest ?>
        ;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        height: 0;
        width: 70px;
        position: absolute;
        top: 341px;
        left: 618px;

    }

    .lower-chest-outline-left {

        border-top: 19px solid black;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        height: 0;
        width: 70px;
        position: absolute;
        top: 341px;
        left: 616px;

    }

    .lower-chest-outline-right {

        border-top: 19px solid black;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        height: 0;
        width: 70px;
        position: absolute;
        top: 341px;
        left: 620;

    }

    .lower-chest-outline-bottom {

        height: 2px;
        width: 75px;
        background-color: black;

        position: absolute;
        top: 357px;
        left: 630px;
    }

    lower-chest-outline-top {


        height: 3px;
        width: 75px;
        background-color: black;

        position: absolute;
        top: 312px;
        left: 630px;
    }

    .front-shoulder {
        width: 0;
        height: 0;
        border-top: 20px solid
            <?php echo $frontdeltoid ?>
        ;
        rotate: -90deg;
        border-left: 30px solid transparent;
        position: absolute;
        top: 317px;
        left: 611px;

    }

    .front-shoulder-outline-left {
        width: 3px;
        height: 29px;
        background: black;

        border-left: 30px solid transparent;
        position: absolute;
        top: 312px;
        left: 614px;

    }

    .front-shoulder-outline-top {
        width: 3px;
        height: 3px;
        background: black;

        border-left: 30px solid transparent;
        position: absolute;
        top: 312px;
        left: 614px;

    }


    .rfront-shoulder {
        width: 0;
        height: 0;
        border-top: 20px solid
            <?php echo $frontdeltoid ?>
        ;
        rotate: 90deg;
        border-right: 30px solid transparent;
        position: absolute;
        top: 317px;
        left: 694px;

    }

    .rfront-shoulder-outline-left {
        width: 3px;
        height: 29px;
        background: black;

        border-left: 30px solid transparent;
        position: absolute;
        top: 312px;
        left: 688px;

    }

    .rfront-shoulder-outline-top {
        width: 3px;
        height: 3px;
        background: black;

        border-left: 30px solid transparent;
        position: absolute;
        top: 312px;
        left: 688px;

    }

    .lshoulder {
        border-bottom: 35px solid
            <?php echo $frontdeltoid ?>
        ;
        border-left: 4px solid transparent;
        border-right: 2px solid transparent;
        height: 0;
        rotate: 10deg;
        width: 15px;
        position: absolute;
        top: 311px;
        left: 597px;
    }

    .lshoulder-outline-left {
        border-bottom: 35px solid black;
        border-left: 4px solid transparent;
        border-right: 2px solid transparent;
        height: 0;
        rotate: 10deg;
        width: 15px;
        position: absolute;
        top: 310px;
        left: 594px;
    }

    .lshoulder-outline-right {
        border-bottom: 35px solid black;
        border-left: 4px solid transparent;
        border-right: 2px solid transparent;
        height: 0;
        rotate: 10deg;
        width: 15px;
        position: absolute;
        top: 312px;
        left: 599px;
    }

    .lshoulder-outline-top {
        height: 3;
        rotate: 10deg;
        background: #000;
        width: 18px;
        position: absolute;
        top: 311px;
        left: 602px;
    }

    .lshoulder-outline-bottom {
        height: 3;
        rotate: 10deg;
        background: #000;
        width: 25px;
        position: absolute;
        top: 342px;
        left: 592px;
    }

    .rshoulder {
        border-bottom: 35px solid
            <?php echo $frontdeltoid ?>
        ;
        border-left: 4px solid transparent;
        border-right: 2px solid transparent;
        height: 0;
        rotate: -10deg;
        width: 15px;
        position: absolute;
        top: 311px;
        left: 717px;
    }

    .rshoulder-outline-left {
        border-bottom: 35px solid black;
        border-left: 4px solid transparent;
        border-right: 2px solid transparent;
        height: 0;
        rotate: -10deg;
        width: 15px;
        position: absolute;
        top: 311px;
        left: 714px;
    }

    .rshoulder-outline-right {
        border-bottom: 35px solid black;
        border-left: 4px solid transparent;
        border-right: 2px solid transparent;
        height: 0;
        rotate: -10deg;
        width: 15px;
        position: absolute;
        top: 310px;
        left: 719px;
    }

    .rshoulder-outline-top {
        height: 3;
        rotate: -10deg;
        background: #000;
        width: 18px;
        position: absolute;
        top: 310px;
        left: 717px;
    }

    .rshoulder-outline-bottom {
        height: 3;
        rotate: -10deg;
        background: #000;
        width: 25px;
        position: absolute;
        top: 343px;
        left: 718px;
    }

    .abs-base {
        width: 55px;
        height: 55px;
        background:
            <?php echo $abs ?>
        ;
        border: solid #000;
        position: absolute;
        top: 358px;
        left: 638px;
    }

    .abs-1 {
        width: 57px;
        height: 3px;
        background: black;
        position: absolute;
        top: 373px;
        left: 640px;
    }

    .abs-2 {
        width: 57px;
        height: 3px;
        background: black;
        position: absolute;
        top: 389px;
        left: 640px;
    }

    .abs-3 {
        width: 57px;
        height: 3px;
        background: black;
        position: absolute;
        top: 405px;
        left: 640px;
    }

    .obliques {
        width: 71px;
        height: 75px;
        background:
            <?php echo $obliques ?>
        ;
        border: solid #000;
        position: absolute;
        top: 358px;
        left: 630px;
    }


    .lower-abs {

        border-top: 22px solid
            <?php echo $abs ?>
        ;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        height: 0;
        width: 25px;
        position: absolute;
        top: 415px;
        left: 641px;

    }

    .lower-abs-outline-left {


        border-top: 22px solid black;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        height: 0;
        width: 31px;
        position: absolute;
        top: 417px;
        left: 638px;

    }

    .left-leg {

        border-left: 5px solid transparent;
        border-right: 18px solid transparent;
        border-top: 80px solid
            <?php echo $quads ?>
        ;
        width: 20px;
        rotate: 3deg;
        position: absolute;
        top: 427px;
        left: 630px;
    }

    .left-leg-outline-l {

        border-left: 5px solid transparent;
        border-right: 18px solid transparent;
        border-top: 80px solid black;
        width: 21px;
        rotate: 3deg;
        position: absolute;
        top: 427px;
        left: 628px;
    }

    .left-leg-outline-r {

        border-left: 5px solid transparent;
        border-right: 18px solid transparent;
        border-top: 80px solid black;
        width: 21px;
        rotate: 3deg;
        position: absolute;
        top: 427px;
        left: 632px;
    }


    .right-leg {

        border-left: 18px solid transparent;
        border-right: 5px solid transparent;
        border-top: 80px solid
            <?php echo $quads ?>
        ;
        width: 20px;
        rotate: -3deg;
        position: absolute;
        top: 427px;
        left: 663px;
    }

    .leg-line {
        height: 3px;
        width: 75px;
        background-color: #000;
        /* border: solid #000 3px; */

        position: absolute;
        top: 425px;
        left: 630px;
    }

    .right-leg-outline-l {

        border-left: 18px solid transparent;
        border-right: 5px solid transparent;
        border-top: 80px solid black;
        width: 21px;
        rotate: -3deg;
        position: absolute;
        top: 427px;
        left: 665px;
    }

    .right-leg-outline-r {

        border-left: 18px solid transparent;
        border-right: 5px solid transparent;
        border-top: 80px solid black;
        width: 21px;
        rotate: -3deg;
        position: absolute;
        top: 427px;
        left: 661px;
    }

    .hip-flexor-r {
        border-left: 20px solid transparent;
        border-right: 0px solid transparent;
        border-top: 35px solid
            <?php echo $hipflexor ?>
        ;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 426px;
        left: 685px;
    }

    .hip-flexor-outline-r {
        border-left: 20px solid transparent;
        border-right: 0px solid transparent;
        border-top: 35px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 427px;
        left: 683px;
    }

    .hip-flexor-l {
        border-left: 0px solid transparent;
        border-right: 20px solid transparent;
        border-top: 35px solid
            <?php echo $hipflexor ?>
        ;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 426px;
        left: 632px;
    }

    .hip-flexor-outline-l {
        border-left: 0px solid transparent;
        border-right: 20px solid transparent;
        border-top: 38px solid black;
        width: 0px;
        rotate: 2deg;
        position: absolute;
        top: 426px;
        left: 633px;
    }

    .left-knee {
        width: 19px;
        height: 15px;
        background-color: #bbb;
        border: #000 solid 3px;
        position: absolute;
        top: 500px;
        left: 633px;
    }

    .right-knee {
        width: 19px;
        height: 15px;
        background-color: #bbb;
        border: #000 solid 3px;
        position: absolute;
        top: 500px;
        left: 680px;
    }

    .left-calf {

        border-top: 45px solid
            <?php echo $calves ?>
        ;
        border-left: 5px solid transparent;
        border-right: 0px solid transparent;
        height: 0;
        width: 15px;
        position: absolute;
        top: 520px;
        left: 634px;
    }

    .left-foot {
        width: 29px;
        height: 13px;

        background-color: #4A4A4A;
        position: absolute;
        top: 557px;
        left: 630px;
    }

    .right-calf {

        border-top: 45px solid
            <?php echo $calves ?>
        ;
        border-left: 0px solid transparent;
        border-right: 5px solid transparent;
        height: 0;
        width: 15px;
        position: absolute;
        top: 520px;
        left: 682px;
    }




    .left-calf-outline-r {

        border-top: 45px solid #000;
        border-left: 5px solid transparent;
        border-right: 0px solid transparent;
        height: 0;
        width: 18px;
        position: absolute;
        top: 520px;
        left: 632px;
    }

    .right-foot {
        width: 29px;
        height: 13px;

        background-color: #4A4A4A;
        position: absolute;
        top: 557px;
        left: 676px;
    }

    .right-calf-outline-r {

        border-top: 45px solid #000;
        border-left: 0px solid transparent;
        border-right: 5px solid transparent;
        height: 0;
        width: 19px;
        position: absolute;
        top: 520px;
        left: 681px;
    }

    .left-bicep {
        width: 17px;
        height: 45px;
        background-color:
            <?php echo $bicep ?>
        ;
        border: #000 solid 3px;
        position: absolute;
        rotate: 5deg;
        top: 334px;
        left: 593px;
    }

    .left-bicep1 {
        width: 17px;
        height: 45px;
        background-color:
            <?php echo $tricep ?>
        ;
        border: #000 solid 3px;
        position: absolute;
        rotate: 5deg;
        top: 334px;
        left: 593px;
    }


    .left-tricep {
        width: 0;
        height: 0;
        border-top: 30px solid transparent;
        border-right: 8px solid
            <?php echo $tricep ?>
        ;
        border-bottom: 15px solid transparent;
        position: absolute;
        rotate: 5deg;
        top: 339px;
        left: 585px;
    }

    .left-tricep-outline {
        width: 0;
        height: 0;
        border-top: 34px solid transparent;
        border-right: 11px solid #000;
        border-bottom: 17px solid transparent;
        position: absolute;
        rotate: 4deg;
        top: 336px;
        left: 582px;
    }

    .right-bicep {
        width: 17px;
        height: 45px;
        background-color:
            <?php echo $bicep ?>
        ;
        border: #000 solid 3px;
        position: absolute;
        rotate: -5deg;
        top: 334px;
        left: 718px;
    }

    .right-bicep1 {
        width: 17px;
        height: 45px;
        background-color:
            <?php echo $tricep ?>
        ;
        border: #000 solid 3px;
        position: absolute;
        rotate: -5deg;
        top: 334px;
        left: 718px;
    }

    .right-tricep {
        width: 0;
        height: 0;
        border-top: 30px solid transparent;
        border-left: 8px solid
            <?php echo $tricep ?>
        ;
        border-bottom: 15px solid transparent;
        position: absolute;
        rotate: -5deg;
        top: 339px;
        left: 740px;
    }

    .right-tricep-outline {
        width: 0;
        height: 0;
        border-top: 34px solid transparent;
        border-left: 11px solid #000;
        border-bottom: 17px solid transparent;
        position: absolute;
        rotate: -4deg;
        top: 336px;
        left: 741px;
    }

    .right-arm {

        border-top: 45px solid
            <?php echo $forearm ?>
        ;
        border-left: 0px solid transparent;
        border-right: 5px solid transparent;
        height: 0;
        width: 15px;
        position: absolute;
        top: 380;
        left: 722px;
    }

    .right-arm-outline-r {

        border-top: 45px solid #000;
        border-left: 0px solid transparent;
        border-right: 5px solid transparent;
        height: 0;
        width: 19px;
        position: absolute;
        top: 380px;
        left: 720px;
    }



    .left-arm-outline-r {

        border-top: 45px solid #000;
        border-left: 5px solid transparent;
        border-right: 0px solid transparent;
        height: 0;
        width: 19px;
        position: absolute;
        top: 380px;
        left: 589px;
    }

    .left-arm {

        border-top: 45px solid
            <?php echo $forearm ?>
        ;
        border-left: 5px solid transparent;
        border-right: 0px solid transparent;
        height: 0;
        width: 15px;
        position: absolute;
        top: 380px;
        left: 591px;
    }

    .left-hand {

        width: 24px;
        height: 18px;
        background: #4A4A4A;
        border-radius: 50%;
        position: absolute;
        top: 418px;
        left: 591px;
    }

    .right-hand {

        width: 24px;
        height: 18px;
        background: #4A4A4A;
        border-radius: 50%;
        position: absolute;
        top: 418px;
        left: 717px;
    }

    .body-front {
        position: absolute;
        top: -184px;
        left: -36rem;
    }

    .body-back {
        position: absolute;
        top: -184px;
        left: -25rem;
    }

    .trunk {
        width: 71px;
        height: 120px;
        background: #bbb;
        border: solid #000;
        position: absolute;
        top: 312px;
        left: 630px;
    }

    .back-line {
        height: 160px;
        width: 3px;
        background-color: #000;
        /* border: solid #000 3px; */

        position: absolute;
        top: 300px;
        left: 666px;

    }


    .shoulder-line {
        height: 2px;
        width: 103px;
        background-color: #000;
        /* border: solid #000 3px; */

        position: absolute;
        top: 339px;
        left: 615px;
    }

    .lat {
        border-left: 35px solid transparent;
        border-right: 35px solid transparent;
        border-top: 105px solid
            <?php echo $lats ?>
        ;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 314px;
        left: 633px;
    }

    .lat-outline {
        border-left: 37px solid transparent;
        border-right: 37px solid transparent;
        border-top: 112px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 314px;
        left: 630px;
    }

    .lower-back {
        width: 35px;
        height: 35px;
        background:
            <?php echo $lowerback ?>
        ;
        border: solid #000;
        position: absolute;
        top: 400px;
        left: 647px;
    }

    .bottom-left-glute-outline {
        border-left: 10px solid transparent;
        border-right: 39px solid transparent;
        border-top: 22px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 445px;
        left: 627px;
    }

    .bottom-right-glute-outline {
        border-right: 10px solid transparent;
        border-left: 39px solid transparent;
        border-top: 24px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 445px;
        left: 661px;
    }

    .bottom-left-glute-outline-b {
        border-left: 10px solid transparent;
        border-right: 39px solid transparent;
        border-top: 22px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 448px;
        left: 628px;
    }

    .bottom-right-glute-outline-b {
        border-right: 0px solid transparent;
        border-left: 40px solid transparent;
        border-top: 22px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 448px;
        left: 659px;
    }

    .bottom-left-glute {
        border-left: 10px solid transparent;
        border-right: 37px solid transparent;
        border-top: 22px solid
            <?php echo $glutes ?>
        ;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 445px;
        left: 629px;
    }

    .bottom-right-glute {
        border-right: 9px solid transparent;
        border-left: 38px solid transparent;
        border-top: 22px solid
            <?php echo $glutes ?>
        ;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 445px;
        left: 660px;
    }

    .middle-glute {
        width: 78px;
        height: 17px;
        background:
            <?php echo $glutes ?>
        ;
        border: solid 2px #000;
        position: absolute;
        top: 428px;
        left: 627px;
    }

    .top-right-glute {
        border-right: 0px solid transparent;
        border-left: 42px solid transparent;
        border-bottom: 25px solid
            <?php echo $glutes ?>
        ;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 410px;
        left: 665px;
    }

    .top-left-glute {
        border-right: 42px solid transparent;
        border-left: 0px solid transparent;
        border-bottom: 25px solid
            <?php echo $glutes ?>
        ;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 410px;
        left: 629px;
    }

    .top-right-glute-outline {
        border-right: 0px solid transparent;
        border-left: 42px solid transparent;
        border-bottom: 25px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 407px;
        left: 665px;
    }

    .top-left-glute-outline {
        border-right: 42px solid transparent;
        border-left: 0px solid transparent;
        border-bottom: 25px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 407px;
        left: 629px;
    }

    .top-right-glute-outline-r {
        border-right: 0px solid transparent;
        border-left: 42px solid transparent;
        border-bottom: 25px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 407px;
        left: 666px;
    }

    .top-left-glute-outline-r {
        border-right: 42px solid transparent;
        border-left: 0px solid transparent;
        border-bottom: 25px solid black;
        width: 0px;
        rotate: 0deg;
        position: absolute;
        top: 407px;
        left: 627px;
    }

    .rear-shoulder-l {
        width: 0;
        height: 0;
        border-top: 20px solid
            <?php echo $reardeltoid ?>
        ;
        rotate: -90deg;
        border-left: 30px solid transparent;
        position: absolute;
        top: 317px;
        left: 611px;

    }


    .rear-shoulder-r {
        width: 0;
        height: 0;
        border-top: 20px solid
            <?php echo $reardeltoid ?>
        ;
        rotate: 90deg;
        border-right: 30px solid transparent;
        position: absolute;
        top: 317px;
        left: 694px;

    }

    .rshoulder-rear {
        border-bottom: 35px solid
            <?php echo $reardeltoid ?>
        ;
        border-left: 4px solid transparent;
        border-right: 2px solid transparent;
        height: 0;
        rotate: -10deg;
        width: 15px;
        position: absolute;
        top: 311px;
        left: 717px;
    }


    .lshoulder-rear {
        border-bottom: 35px solid
            <?php echo $reardeltoid ?>
        ;
        border-left: 4px solid transparent;
        border-right: 2px solid transparent;
        height: 0;
        rotate: 10deg;
        width: 15px;
        position: absolute;
        top: 311px;
        left: 597px;
    }

    .right-hamstring {

        border-left: 18px solid transparent;
        border-right: 5px solid transparent;
        border-top: 80px solid
            <?php echo $hamstrings ?>
        ;
        width: 20px;
        rotate: -3deg;
        position: absolute;
        top: 427px;
        left: 663px;
    }


    .left-hamstring {

        border-left: 5px solid transparent;
        border-right: 18px solid transparent;
        border-top: 80px solid
            <?php echo $hamstrings ?>
        ;
        width: 20px;
        rotate: 3deg;
        position: absolute;
        top: 427px;
        left: 630px;
    }

    @media(max-width:1110px) {
        .boxes {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            margin-top: 4rem;
            gap: 1rem;
        }

    }

    @media(max-width:980px) {
        .boxes {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            margin-top: 3rem;
            gap: 3rem;
            height: 100rem;
        }

        .rightbox {
            flex: 1;
            text-align: center;
            border-radius: 1rem;
            padding: 0.2rem;
            background-color: #d9d9d9;
            max-height: 30rem;
            max-width: 30rem;
            min-width: 40rem;
        }

        .leftbox {
            flex: 1;
            text-align: center;
            border-radius: 1rem;
            padding: 0.2rem;
            background-color: #d9d9d9;
            max-height: 23rem;
            max-width: 30rem;
            min-width: 40rem;
        }

        .middlebox {
            flex: 1;
            text-align: center;
            border-radius: 1rem;
            padding: 0.2rem;
            background-color: #d9d9d9;
            max-height: 30rem;
            max-width: 30rem;
            min-width: 40rem;
        }

        .pie {
            left: -12px;
            top: -49px;
            position: relative;
        }

        .body-front {
            position: absolute;
            top: -184px;
            left: -27rem;
        }

        .daily-stats {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            height: 26rem;
            justify-content: center;
            row-gap: 10px;
        }

        .daily-key1 {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: fit-content;
            justify-content: center;
            gap: 0.5rem;
            margin-left: 21rem;
            margin-bottom: 2rem;
            position: relative;
            top: -2.5rem;
        }

        .daily-key2 {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: fit-content;
            justify-content: center;
            gap: 0.5rem;
            margin-left: 5rem;
            position: relative;
            top: 12rem;
            left: 9.5rem;

        }

        .daily-key3 {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: fit-content;
            justify-content: center;
            gap: 0.5rem;
            margin-left: 5rem;
            position: relative;
            top: 0rem;
            left: 17.5rem;
        }



        .road {

            left: 134px;
            top: -380px;
            position: relative;
        }

        .boxheaders {
            font-size: 2rem;
            padding: 0.2rem;
        }

        .body-back {
            position: absolute;
            top: -184px;
            left: -15rem;
        }
    }
</style>