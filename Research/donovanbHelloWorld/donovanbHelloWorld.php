<!DOCTYPE html>
<html lang="en">
    <head>
        <title> HELLO WORLD 442 </title>
    </head>

    <body>
        <h2>Hello World!</h2>
        <hr>
        <p>Donovan Here!</p>
        <button onclick="changeBackgroundColor()">Change Background Color</button>



        <h2>The below content was created using php!</h2>
        <?php include 'donovanbOnlyPHP.php' ?>



    </body>
    <script>
        function changeBackgroundColor() {
            // Generate random RGB values
            const randomColor = 'rgb(' +
                Math.floor(Math.random() * 256) + ',' +
                Math.floor(Math.random() * 256) + ',' +
                Math.floor(Math.random() * 256) + ')';

            // Set the background color
            document.body.style.backgroundColor = randomColor;
        }
    </script>
</html>
