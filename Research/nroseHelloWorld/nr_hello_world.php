<!DOCTYPE html>
<html>
    <head>
        <title>Hello World</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body style="background-color:SlateBlue;">
    <?php 
    include("backend.php"); 
        echo '<p>Hello World! I have added an effect to this page.</p>'; 
        echo 'This variable comes from my backend(lol).';
        echo $class;
        ?>
        <p> This text is generated in HTML and modified in CSS.
    </body>
</html>