<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Climb header</title>
    <link rel="stylesheet" href="/CSE442-542/2024-Spring/cse-442s/TheClimb/src/TheClimb1.css">
</head>

<body>
    <div class="header">
        <div class="title-container">
            <h1 class="title"><a
                    href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/TheClimbMainPageFrontend.php">The Climb</a>
            </h1>
        </div>
        <div class="container">
            <a class="imgLink" href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/TheClimbMainPageFrontend.php">
                <img src="/CSE442-542/2024-Spring/cse-442s/TheClimb/src/assets/Logo.png" alt="The Climb logo"
                    class="logo_image"
                    href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/TheClimbMainPageFrontend.php">
            </a>
        </div>
        <div class="page-name">
            <h1>[[Current page]]</h1>
        </div>
        <button class="accordion" type="button" onclick="toggleAccordion()"></button>
    </div>



    <nav class="navigation">
        <ul>
            <li><a href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/exercise_page.php">Exercise</a></li>
            <li><a href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/nutrition.php">Nutrition</a></li>
            <li><a href="#">Friends</a></li>
            <li><a href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/UserProfile_frontend.php">Profile</a></li>
            <li><a href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/TheClimbMainPageFrontend.php">Logout</a></li>
        </ul>
    </nav>

    <ul class="accordionList">
        <li class="accordionItem">
            <div class="accordionHeader" onclick="toggleItem(this)">
                <div class="accordionContent">
                    <ul class="navLinks">
                        <li><a href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/exercise_page.php">Exercise</a>
                        </li>
                        <li><a href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/nutrition.php">Nutrition</a></li>
                        <li><a href="#">Friends</a></li>
                        <li><a
                                href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/UserProfile_frontend.php">Profile</a>
                        </li>
                        <li><a
                                href="/CSE442-542/2024-Spring/cse-442s/TheClimb/public/TheClimbMainPageFrontend.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>



</body>
<script src="/CSE442-542/2024-Spring/cse-442s/TheClimb/src/scripts/header.js"></script>



</html>