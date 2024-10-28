<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">

<head>
    <title> Friends </title>
    <link rel="stylesheet" href="../src/TheClimb.css">

</head>
<?php include '../src/data/friendsBE/friends_backend.php'; ?>

<body>
    <?php
    include ("../src/data/betrial.php");
    require ("../src/components/header.php");
    require ("../src/scripts/following_list.php");
    // $updatet = "This is sample text for an update to The Climb. aidan posted a new pr, etc..<br> <br> ";
    $updatesPlaceholder = "";
    // $postman = "Aidan O'Donnell";
    // $userdisp = "Posted By: " . $postman;
    // $quedia = "3/31/24<br>";
    


    $updatesPlaceholder = "";
    // all updates doesnt exist yet so it wont work yet.
    foreach ($allUpdates as $update) {
        $updText = $update['text'];
        $postman = $update['username'];
        $userdisp = "Posted By: " . $postman;
        $quedia = date("m/d/y", strtotime($update['date']));

        $namewrap = wordwrap($updText, 40, "<br>", true);
        $namewrap = "<br>" . $namewrap;
        $updatesPlaceholder = $updatesPlaceholder . "<tr class = 'boxymcboxface'><td><pu>" . $userdisp . "</pu><br><pd>" . $quedia . "</pd>" . $namewrap . "<br></td></tr>";
    }

    $postsPlaceholder = "";
    foreach ($allPosts as $post) {
        $postText = $post['text'];
        $postman = $post['username'];
        $userdisp = "Posted By: " . $postman;
        $quedia = date("m/d/y", strtotime($post['date']));
        $namewrap = wordwrap($postText, 40, "<br>", true);
        $namewrap = "<br>" . $namewrap . "<br><br>";
        $postsPlaceholder .= "<tr class='boxymcboxface'><td><pu>" . $userdisp . "</pu><br><pd>" . $quedia . "</pd><br>" . $namewrap . "<br></td></tr>";
    }

    $friendt = "Friend ";
    $postman = "Aidan O'Donnell";
    $userdisp = "Posted By: " . $postman;
    $quedia = "3/31/24<br>";



    ?>
    <div class="friends-container">
        <div class="leftbox-friends">
            <leftbox-friends-header>Workout Updates </leftbox-friends-header>
            <div class="updatestable-cont">
                <table class="scroll">

                    <tbody>

                        <?php echo $updatesPlaceholder ?>

                    </tbody>
                </table>

            </div>
        </div>
        <div class="rightbox-friends">
            <rightbox-friends-header>Posts </rightbox-friends-header>
            <div class="updatestable-cont">
                <table class="scroll">

                    <tbody>

                        <?php echo $postsPlaceholder ?>

                    </tbody>
                </table>

            </div>
        </div>
        <div class='statusbuttons'>
            <div class='friendsbuttons'>
                <button class='view-friends' id='viewfriendsbtn'>
                    <div>View Followers</div>
                    <!-- <div>Friends</div> -->
                </button>
                <button class='add-friends' id='addfriendsbtn'>
                    <div>Add Friends</div>
                    <!-- <div>Friends</div> -->
                </button>
                <button class='view-friends' id='viewfollowingbtn' >
                    <div>View Following</div>
                    <!-- <div>Friends</div> -->
                </button>
            </div>
            <button class="updatebtn" id="updbtn">
                <div>Add an</div>
                <div>Update</div>
            </button>
            <button class="postbtn" id='postsbtn'>
                <div>Make a</div>
                <div>Post</div>
            </button>

        </div>

    </div>

    <div class="modalForms">
        <!--    Updates modal-->
        <div id="addupd" class="formModal">
            <!-- Trigger/Open The Modal -->

            <div id="updatesModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="updClose" class="close">&times;</span>
                    <form action="../src/data/friendsBE/getupdates.php" method="get">
                        <p>Add an Update:</p>
                        <p>Currently Updating <?php echo $currchecked ?></p>
                        Cardio: <input type="checkbox" name="updatecheck[]" value='cardio'><br>
                        Strength: <input type="checkbox" name="updatecheck[]" value='strength'><br>
                        <input type="submit" value="Confirm" name="submit" id="submit" class='friendmodalsub'>
                    </form>


                    <p style="display: none;" id="updateNotification">Update Posted!</p>
                </div>

            </div>
        </div>
        <!--    Posts modal-->
        <div id="addposts" class="formModal">
            <!-- Trigger/Open The Modal -->

            <div id="postsModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="postsClose" class="close">&times;</span>
                    <form id="postsForm" action="../src/data/friendsBE/posts.php" method="post">
                        <label for="calories">Make a Post:</label>
                        <textarea type="text" class='poststxtbox' id="calories" name="postsfrom"
                            placeholder="Enter the text for your post" required></textarea>
                        <input type="submit" value="Post" name="submit" id="submit" class='friendmodalsub'>
                    </form>


                    <p style="display: none;" id="postsNotification">Posted!</p>
                </div>

            </div>
        </div>

        <!--   view friends modal-->
        <div id="viewfriends" class="formModal">
            <!-- Trigger/Open The Modal -->

            <div id="viewfriendsModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="viewfriendsClose" class="close">&times;</span>
                    <form class='vff' id="viewfriendsForm" action="../src/scripts/follow_list.php" method="post">


                        <div class="mealInfo">
                            <div class='modaltextvf'>Your Friends:</div>
                            <div class="mupdatestable-cont">
                                <mtable class="scroll">

                                    <mbody>

                                        <?php echo $friendsPlaceholder; ?>

                                    </mbody>
                                </mtable>

                            </div>


                        </div>

                    </form>


                    <p style="display: none;" id="viewfriendsNotification">Calorie goal set!</p>
                </div>

            </div>
        </div>

        <!--   view following modal-->
        <div id="viewfollowing" class="formModal">
            <!-- Trigger/Open The Modal -->

            <div id="viewfollowingModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="viewfollowingClose" class="close">&times;</span>
                    <form class='vff' id="viewfollowingForm" action="../src/scripts/following_list.php" method="post">


                        <div class="mealInfo">
                            <div class='modaltextvf'>Your Friends:</div>
                            <div class="mupdatestable-cont">
                                <mtable class="scroll">

                                    <mbody>

                                        <?php echo $followingPlaceholder; ?>

                                    </mbody>
                                </mtable>

                            </div>


                        </div>

                    </form>


                    <p style="display: none;" id="viewfriendsNotification">Calorie goal set!</p>
                </div>

            </div>
        </div>

        <!--   add friends modal-->
        <div id="addfriends" class="formModal">
            <!-- Trigger/Open The Modal -->

            <div id="addfriendsModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="addfriendsClose" class="close">&times;</span>
                    <form id="addfriendsForm" action="../src/scripts/follow.php" method="post">
                        <div class="mealInfo">
                            <label for="addUsername">Enter Username of the Friend you would like to add: </label>
                            <input type="text" id="addUsername" name="addUsername" required>

                        </div>
                        <input type="submit" value="Add Friend" name="submit" id="submit" class='friendmodalsub'>
                    </form>


                    <p style="display: none;" id="addfriendsNotification">Friend Added!</p>
                </div>

            </div>
        </div>

    </div>
    <script src="../src/scripts/friends.js"></script>

</body>


<style>
    .friends-container {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        gap: 3rem;
        flex-direction: row;
        margin-top: 3rem;
        height: 100%;
        width: 100%;
        margin-bottom: 3rem;
        font-size: 1.7rem;

    }



    .poststxtbox {
        width: 91%;
        height: 9rem;
        margin-left: 3rem;
    }

    .friendsbuttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: column;
        height: 100%;
        width: 100%;
        gap: 1rem;
    }

    .view-friends {
        background-color: #163f8c;
        /* border: 5px #d9d9d9 solid; */
        /* width: 9rem; */

        color: white;
        padding: .5rem .7rem;
        text-align: center;
        /* word-spacing: 999999px; */
        /* white-space: break-space; */
        /* text-decoration: none; */
        display: inline-block;
        font-size: 1rem;
        border-radius: 5px;
    }

    .add-friends {
        background-color: #163f8c;
        /* border: 5px #d9d9d9 solid; */
        /* width: 9rem; */

        color: white;
        padding: .5rem .9rem;
        text-align: center;
        /* word-spacing: 999999px; */
        /* white-space: break-space; */
        /* text-decoration: none; */
        display: inline-block;
        font-size: 1rem;
        border-radius: 5px;
    }

    .leftbox-friends {
        flex: 1;
        text-align: center;
        border-radius: 1rem;
        /* Adjust the border-radius as needed */
        /* Background color of the rounded box */
        padding: 0.2rem;
        background-color: #d9d9d9;

        /* width: 200px; */
        height: 30rem;
        margin-left: 3rem;
        /* margin-bottom: 100%; */
        max-width: 40rem;

    }

    pu {
        color: white;
        font-size: 0.7rem;
        margin-right: 20rem;
    }

    pd {
        color: white;
        font-size: 0.7rem;
        margin-right: 20rem;
    }

    .updatestable-cont {
        display: flex;
        justify-content: center;
        gap: 3rem;
        flex-direction: row;
        /* margin-right: 3rem; */
        height: 90%;
    }

    .mupdatestable-cont {
        display: flex;
        justify-content: center;
        gap: 3rem;

        /* margin-right: 3rem; */
        height: 90%;
    }

    table.scroll {
        /* width: 100%; */
        /* Optional */
        border-collapse: collapse;
        border-spacing: 0;
        height: 100%;
        /* border: 2px solid yellow; */
        display: inline-block;
        width: 21rem;
        white-space: nowrap;

        /* width: fit-content; */
        border-radius: 30px;

    }

    table {
        width: 80%;
        height: 100%;
    }

    table.scroll tbody,
    table.scroll thead {
        display: block;
    }

    thead tr th {
        height: 30px;
        line-height: 30px;
    }

    table.scroll tbody {
        height: 95%;
        overflow-y: auto;
        overflow-x: hidden;
    }

    tbody {
        border-top: 1rem solid #d9d9d9;
        display: flex;
        justify-content: space-between;
        /* align-items: center; */
        gap: 3rem;
        flex-direction: row;
        height: 100%;
        display: block;
        height: 50px;
        overflow: auto
    }

    tbody td,
    thead th {
        height: fit-content;
        border-right: 1px solid black;
        display: inline-block;
        word-break: break-word;
        padding: 0.6rem;
        width: 19rem;

    }

    tbody td:last-child,
    thead th:last-child {
        border-right: none;
    }

    tr {

        color: white;
        font-size: 1rem;
        background-color: #163f8c;
        border-radius: 1rem;
        border-top: 2rem solid #d9d9d9;
        /* Adjust the border-radius as needed */
        /* background-color: #d9d9d9; */
        /* Background color of the rounded box */
        /* border-radius: 25px; */
        margin-bottom: 1rem;
        margin-top: 4rem;
        padding: 3rem;
        /* width: 200px; */
        height: 3rem;
        width: 250px;
        word-wrap: break-word;

    }



    .boxymcboxface {
        width: 20000px;
    }

    mtable.scroll {
        /* width: 100%; */
        /* Optional */
        border-collapse: collapse;
        border-spacing: 0;
        height: 100%;
        /* border: 2px solid yellow; */
        display: inline-block;
        width: 33rem;
        /* white-space: nowrap; */

        /* width: fit-content; */
        border-radius: 30px;

    }

    mtable {
        width: 80%;
        height: 100%;
    }

    mtable.scroll mtbody,
    mtable.scroll mthead {
        display: block;
    }

    mhead mtr mth {
        height: 30px;
        line-height: 30px;
    }

    mtable.scroll tbody {
        height: 95%;
        overflow-y: auto;
        overflow-x: hidden;
    }

    mbody {
        /* border-top: 1rem solid #d9d9d9; */
        display: flex;
        justify-content: space-between;
        /* align-items: center; */
        gap: 3rem;
        flex-direction: row;
        height: 15rem;
        display: block;
        overflow: auto;
        max-height: 15rem;
    }

    mbody md,
    mhead mh {
        height: fit-content;

        display: inline-block;
        word-break: break-word;
        padding: 0.6rem;
        width: 30rem;
        border-bottom: 2px solid black;

    }

    mbody md:last-child,
    mhead mh:last-child {
        border-right: none;
    }

    mr {

        color: white;
        font-size: 1rem;
        background-color: #163f8c;
        border-radius: 1rem;
        border-top: 2rem solid #d9d9d9;
        /* Adjust the border-radius as needed */
        /* background-color: #d9d9d9; */
        /* Background color of the rounded box */
        /* border-radius: 25px; */
        margin-bottom: 1rem;
        margin-top: 4rem;
        padding: 3rem;
        /* width: 200px; */
        height: 3rem;
        width: 250px;
        word-wrap: break-word;

    }

    .rightbox-friends {
        flex: 1;
        text-align: center;
        border-radius: 1rem;
        /* Adjust the border-radius as needed */
        background-color: #d9d9d9;
        /* Background color of the rounded box */
        /* border-radius: 25px; */
        padding: 0.2rem;
        /* width: 200px; */
        height: 30rem;
        /* margin-left: 3rem; */
        /* Set the width of the rounded box */
        /* margin: 1.5% 5%; */

        /* margin-right: 3rem; */
        /* margin-bottom: 0%; */
    }

    /* .rightbox-friends-header {
        color: white;
    } */

    .statusbuttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 2rem;
        flex-direction: column;
        margin-right: 3rem;
    }

    .add-friends:hover,
    .view-friends:hover {
        background-color: #d9d9d9;
        color: black;
    }

    .updatebtn:hover,
    .postbtn:hover {
        background-color: #163f8c;
        color: white;
    }

    .updatebtn {
        background-color: #d9d9d9;
        /* border: 5px #d9d9d9 solid; */
        /* width: 9rem; */

        color: black;
        padding: 3.5rem 2.0rem;
        text-align: center;
        /* word-spacing: 999999px; */
        white-space: break-space;
        text-decoration: none;
        display: inline-block;
        font-size: 1rem;
        border-radius: 12px;
    }

    .postbtn {
        background-color: #d9d9d9;
        /* border: 5px #163F8C solid; */

        /* width: 9rem; */
        display: flex;
        justify-content: space-around;
        /* align-items: center; */
        gap: 2rem;
        flex-direction: column;
        color: black;
        padding: 3.5rem 2rem;
        text-align: center;
        /* word-spacing: 999999px; */
        white-space: break-space;
        text-decoration: none;
        display: inline-block;
        font-size: 1rem;
        border-radius: 12px;

    }

    .friendmodalsub {
        background-color: #163f8c;
        display: flex;
        justify-content: space-around;
        gap: 2rem;
        flex-direction: column;
        color: white;
        padding: 0rem 1rem;
        text-align: center;

        text-decoration: none;
        display: inline-block;
        font-size: 0.9rem;
        border-radius: 8px;
        margin-left: 90%;
    }


    @media(max-width: 980px) {
        .friends-container {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            gap: 5rem;
            flex-direction: column-reverse;
            margin-top: 3rem;
            height: 100%;
            width: 100%;
            margin-bottom: 3rem;
            font-size: 2.7rem;

        }



        .poststxtbox {
            width: 91%;
            height: 9rem;
            margin-left: 3rem;
        }

        .friendsbuttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
            height: 100%;
            width: 100%;
            gap: 3rem;
        }

        .view-friends {
            background-color: #163f8c;
            /* border: 5px #d9d9d9 solid; */
            /* width: 9rem; */

            color: white;
            padding: .5rem .7rem;
            text-align: center;
            /* word-spacing: 999999px; */
            /* white-space: break-space; */
            /* text-decoration: none; */
            display: inline-block;
            font-size: 2.3rem;
            border-radius: 5px;
        }

        .add-friends {
            background-color: #163f8c;
            /* border: 5px #d9d9d9 solid; */
            /* width: 9rem; */

            color: white;
            padding: .5rem .9rem;
            text-align: center;
            /* word-spacing: 999999px; */
            /* white-space: break-space; */
            /* text-decoration: none; */
            display: inline-block;
            font-size: 2.3rem;
            border-radius: 5px;
        }

        .leftbox-friends {
            flex: 1;
            text-align: center;
            border-radius: 1rem;
            /* Adjust the border-radius as needed */
            /* Background color of the rounded box */
            padding: 0.2rem;
            background-color: #d9d9d9;
            width: 49rem;
            /* width: 200px; */
            height: 30rem;
            margin-left: 0rem;
            /* margin-bottom: 100%; */
            max-width: 49rem;

        }

        pu {
            color: white;
            font-size: 1.7rem;
            margin-right: 20rem;
        }

        pd {
            color: white;
            font-size: 1.7rem;
            margin-right: 20rem;
        }

        .updatestable-cont {
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex-direction: row;
            /* margin-right: 3rem; */
            height: 30rem;
        }

        .mupdatestable-cont {
            display: flex;
            justify-content: center;
            gap: 3rem;

            /* margin-right: 3rem; */
            height: 90%;
        }

        table.scroll {
            /* width: 100%; */
            /* Optional */
            border-collapse: collapse;
            border-spacing: 0;
            height: 100%;
            /* border: 2px solid yellow; */
            display: inline-block;
            width: 48rem;
            white-space: nowrap;

            /* width: fit-content; */
            border-radius: 30px;

        }

        table {
            width: 80%;
            height: 100%;
        }

        table.scroll tbody,
        table.scroll thead {
            display: block;
        }

        thead tr th {
            height: 30px;
            line-height: 30px;
        }

        table.scroll tbody {
            height: 95%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        tbody {
            border-top: 1rem solid #d9d9d9;
            display: flex;
            justify-content: space-between;
            /* align-items: center; */
            gap: 3rem;
            flex-direction: row;
            height: 100%;
            display: block;
            height: 50px;
            overflow: auto
        }

        tbody td,
        thead th {
            height: fit-content;
            border-right: 1px solid black;
            display: inline-block;
            word-break: break-word;
            padding: 0.6rem;
            width: 47rem;

        }

        tbody td:last-child,
        thead th:last-child {
            border-right: none;
        }

        tr {

            color: white;
            font-size: 2.3rem;
            background-color: #163f8c;
            border-radius: 1rem;
            border-top: 2rem solid #d9d9d9;
            /* Adjust the border-radius as needed */
            /* background-color: #d9d9d9; */
            /* Background color of the rounded box */
            /* border-radius: 25px; */
            margin-bottom: 1rem;
            margin-top: 4rem;
            padding: 3rem;
            /* width: 200px; */
            height: 3rem;
            width: 250px;
            word-wrap: break-word;

        }



        .boxymcboxface {
            width: 20000px;
        }

        mtable.scroll {
            /* width: 100%; */
            /* Optional */
            border-collapse: collapse;
            border-spacing: 0;
            height: 100%;
            /* border: 2px solid yellow; */
            display: inline-block;
            width: 33rem;
            /* white-space: nowrap; */

            /* width: fit-content; */
            border-radius: 30px;

        }

        mtable {
            width: 80%;
            height: 100%;
        }

        mtable.scroll mtbody,
        mtable.scroll mthead {
            display: block;
        }

        mhead mtr mth {
            height: 30px;
            line-height: 30px;
        }

        mtable.scroll tbody {
            height: 95%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        mbody {
            /* border-top: 1rem solid #d9d9d9; */
            display: flex;
            justify-content: space-between;
            /* align-items: center; */
            gap: 3rem;
            flex-direction: row;
            height: 15rem;
            display: block;
            overflow: auto;
            max-height: 15rem;
        }

        mbody md,
        mhead mh {
            height: fit-content;

            display: inline-block;
            word-break: break-word;
            padding: 0.6rem;
            width: 30rem;
            border-bottom: 2px solid black;

        }

        mbody md:last-child,
        mhead mh:last-child {
            border-right: none;
        }

        mr {

            color: white;
            font-size: 1rem;
            background-color: #163f8c;
            border-radius: 1rem;
            border-top: 2rem solid #d9d9d9;
            /* Adjust the border-radius as needed */
            /* background-color: #d9d9d9; */
            /* Background color of the rounded box */
            /* border-radius: 25px; */
            margin-bottom: 1rem;
            margin-top: 4rem;
            padding: 3rem;
            /* width: 200px; */
            height: 3rem;
            width: 250px;
            word-wrap: break-word;

        }

        .rightbox-friends {
            flex: 1;
            text-align: center;
            border-radius: 1rem;
            /* Adjust the border-radius as needed */
            background-color: #d9d9d9;
            /* Background color of the rounded box */
            /* border-radius: 25px; */
            padding: 0.2rem;
            /* width: 200px; */
            height: 30rem;
            /* margin-left: 3rem; */
            /* Set the width of the rounded box */
            /* margin: 1.5% 5%; */

            /* margin-right: 3rem; */
            /* margin-bottom: 0%; */
            width: 49rem;
        }

        /* .rightbox-friends-header {
        color: white;
    } */

        .statusbuttons {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 2rem;
            flex-direction: row-reverse;
            margin-right: 0rem;

        }

        .add-friends:hover,
        .view-friends:hover {
            background-color: #d9d9d9;
            color: black;
        }

        .updatebtn:hover,
        .postbtn:hover {
            background-color: #163f8c;
            color: white;
            font-size: 2.3rem;
        }

        .updatebtn {
            background-color: #d9d9d9;
            /* border: 5px #d9d9d9 solid; */
            /* width: 9rem; */

            color: black;
            padding: 3.9rem 3.0rem;
            text-align: center;
            /* word-spacing: 999999px; */
            white-space: break-space;
            text-decoration: none;
            display: inline-block;
            font-size: 2.3rem;
            border-radius: 12px;
        }

        .postbtn {
            background-color: #d9d9d9;
            /* border: 5px #163F8C solid; */

            /* width: 9rem; */
            display: flex;
            justify-content: space-around;
            /* align-items: center; */
            gap: 2rem;
            flex-direction: column;
            color: black;
            padding: 2.5rem 4rem;
            text-align: center;
            /* word-spacing: 999999px; */
            white-space: break-space;
            text-decoration: none;
            display: inline-block;
            font-size: 2.3rem;
            border-radius: 12px;

        }

        .friendmodalsub {
            background-color: #163f8c;
            display: flex;
            justify-content: space-around;
            gap: 2rem;
            flex-direction: column;
            color: white;
            padding: 0rem 1rem;
            text-align: center;

            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
            border-radius: 8px;
            margin-left: 85%;
        }
    }
</style>