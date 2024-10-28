<?php 
require 'connection.php';
    $email = $_POST["Email"];
    $pass = $_POST["Password"];

    $sql = "SELECT username, email, password,token FROM climberdb WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if(password_verify($pass,$row["password"])){
                $token = bin2hex(random_bytes(8));
                setcookie("token",$token,time()+60*60*24*30,"/");
                $hashToken = sha1($token);
                $tokenQuery = 
                "UPDATE climberdb
                SET token='$hashToken'
                WHERE email='$email'";
                $conn->query($tokenQuery);
                header("Location: ../../public/TheClimbMainPageFrontend.php");
            }else{
echo '<script type="text/javascript">'; 
        echo 'alert("No user with this information");';
        echo 'window.location.href = "../../public/login_page.php";';
        echo '</script>';
}
        }
      } else {

        echo '<script type="text/javascript">'; 
        echo 'alert("No user with this information");';
        echo 'window.location.href = "../../public/login_page.php";';
        echo '</script>';
      }

?>