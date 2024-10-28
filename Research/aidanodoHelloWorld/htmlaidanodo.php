<html>

<?php
include("backendfile.php");


echo '<span class="label-' . $globe1 . '" style="color:#0;text-align:center; font-size: 75px;">' . $globe1 . '</span>';

echo '<span class="label-' . $hello . '"  style="color:#FFFFFF;text-align:center; font-size: 50px;">' . $hello . '</span>';

echo '<span class="label-' . $globe2 . '" style="color:#FFF;text-align:center; font-size: 75px;">' . $globe2 . '</span>';

echo '<body style="background-color:grey";>';

?>

<h1 style="color:#163F8C;text-align:center; font-size: 75px;">Click below to rotate the world!</h1>
<p id="change-text" style="font-size: 200px;text-align:center;">&#127758</p>

<script>

    const changeText = document.querySelector("#change-text");

    changeText.addEventListener("click", function () {
        if (changeText.textContent == String.fromCodePoint(0x1F30E)) {
            changeText.textContent = String.fromCodePoint(0x1F30D);
        } else if (changeText.textContent == String.fromCodePoint(0x1F30D)) {
            changeText.textContent = String.fromCodePoint(0x1F30F);
        } else {
            changeText.textContent = String.fromCodePoint(0x1F30E);
        }
    });


</script>

</body>

</html>