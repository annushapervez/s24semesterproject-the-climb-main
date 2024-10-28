
<!DOCTYPE html>
<html>
    <head><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-3974203-1', 'auto'); ga('send', 'pageview');</script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Climb</title>
        <link rel="stylesheet" href="../src/loginStyle.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="pageContainer">

            <div id ="splashLogo">
                <h1> The Climb </h1>
                <img src="../src/assets/Logo.png" />
            </div>

            <div id="infoContainer">
                <h1>Sign into Account</h1>
                <form method="POST" action="../src/scripts/login.php" id="test">
                    <ul class="form-fields">
                        <label for="Email">Email: </label>
                        <input type="text" id="Email" name="Email" placeholder="example@email.com" required>

                        <label for="Password">Password: </label>
                        <input type="password" id="Password" name="Password" placeholder="Password" required>
                        <input type="submit" value="Sign in" class="submit">
                        <p> or </p>
                    </ul>
                </form>
                <button class="submit" onclick="document.location='register_page.php'">Create an Account</button>
            </div>

</div>

        </div>
    </body>
</html>