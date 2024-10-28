<!DOCTYPE html>
<head>
    <title>The Climb</title>
    <link rel="stylesheet" href="../src/TheClimb.css">
    <link rel="stylesheet" href="../src/UserProfile_css.css"/>

</head>
<?php include '../src/data/userprofileBE/UserProfile_backend.php'; ?>    
<?php
require("../src/components/header.php");
?>

<body >
  <button id="edit-button">Edit Profile</button>
<div class="container1">
<div class="box1">Profile</div>
  <div class="profile-container">
    <div class="column">
    <div class="box2">Profile</div>
      <img class="profile-image" src="<?php echo $profilepic; ?>" alt="Profile Image">
      <button id="update-button">Update Profile Photo</button>
      <div id="modal1" class="modal1">
        <form id="update-form" action="../src/data/userprofileBE/UserProfile_backend.php" method="post">
          <div class="modal-content1">
            <span class="close1">&times;</span>
            <h2>Select Profile Photo</h2>
            <div class="image-grid">
              <?php generateImageOptions('../src/assets/UserProfile_images/'); ?>
            </div>
            <div class="error-message"></div>
            <button id="modal-submit" type="button">Update</button>
          </div>
        </form>
      </div>
    </div>
    <div class="profile-info">
      <div class="info">
        <span class="label1">First Name:</span>
        <input type="text" name="firstName" class="text-box" value="<?php echo $firstname; ?>">
        <div class="error-message"></div>
      </div>
      <div class="info">
        <span class="label1">Last Name:</span>
        <input type="text" name="lastName" class="text-box" value="<?php echo $lastname; ?>">
        <div class="error-message"></div>
      </div>
      <div class="info">
        <span class="label1">Email:</span>
        <input type="text" name="email" class="text-box" value="<?php echo $email; ?>">
        <div class="error-message"></div>
      </div>
    </div>
  </div>
        <div class="column">
            <div class="box3">Health Data</div>
            <div class="info">
                <span class="label1">Age:</span>
                <input type="text" name="age" class="text-box" value="<?php echo $age; ?>">
                <div class="error-message"></div>
            </div>
            <div class="info">
                <span class="label1">Gender:</span>
                <input type="text" name="gender" class="text-box" value="<?php echo $gender; ?>">
                <div class="error-message"></div>
            </div>
            <div class="info">
                <span class="label1">Birthday:</span>
                <input type="text" name="birthday" class="text-box" value="<?php echo $birthday; ?>">
                <div class="error-message"></div>
            </div>
            <div class="info">
                <span class="label1">Height:</span>
                <input type="text" name="height" class="text-box" value="<?php echo $height; ?>">
                <div class="error-message"></div>
            </div>
            <div class="info">
                <span class="label1">Weight:</span>
                <input type="text" name="weight" class="text-box" value="<?php echo $weight; ?>">
                <div class="error-message"></div>
            </div>
        </div>
    </div>
    <script src="../src/scripts/UserProfile_js.js"></script>
</body>
</html>
