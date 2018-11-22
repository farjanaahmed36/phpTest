<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Account manager script where user can change his
informations
-->
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN ACCOUNT MANAGER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/gallery.css">
  <link rel="stylesheet" href="css/pagination.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body >
<div class="container">
  <?php
  include 'admin_menu.php';
  ?>

  <div style="padding-left:16px">
    <h2>EDIT ADMINISTRATOR PASSWORD</h2>

  <p>Change your password</p>

<form class="form-horizontal" name="myForm2" method = "POST" onsubmit="return validateForm()" enctype="multipart/form-data" action="">

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Old Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password1">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">New Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password2" placeholder="Enter password" name="password2">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name = "changepass" class="btn btn-default">Change Password</button>
    </div>
  </div>
</form>


<?php
if(isset($_POST['changepass'])){
      //-- Get form data---------------------
      $password1 = addslashes(md5($_POST ['password1']));
      $password2 = addslashes(md5($_POST ['password2']));

      //--------Update Password---------------------
      if(!empty($password1)&&!empty($password2)){
        $query = mysqli_query($conn, "SELECT * FROM administrator WHERE password ='$password1' AND id ='$user_id' ");
        $rows = mysqli_num_rows($query);
        if($rows==1){
        $UpdateQuery = "UPDATE administrator SET password ='$password2' WHERE id='$user_id'";
        $conn->query($UpdateQuery);
        echo "<font color = 'green'>";
        echo "Your password has been updated .";
        echo "</font>";
      }else{
        echo "<font color = 'red'>";
        echo "Old password is wrong";
        echo "</font>";
      }
    }else{
      echo "<font color = 'red'>";
      echo "Enter your old password and the new one !";
      echo "</font>";
    }
  }

?>




  <?php
    include 'footer.php';
    mysqli_close($conn);
  ?>
</div>

</body>
</html>
