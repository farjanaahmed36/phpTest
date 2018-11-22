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
  <title>ACCOUNT MANAGER</title>
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
  include 'account_menu.php';
  ?>

  <div style="padding-left:16px">
    <h2>EDIT YOUR ACCOUNT INFORMATION</h2>
    <p>Change your email or your name</p>
  </div>
  <?php
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$user_id'");
  $rows = mysqli_num_rows($result);

  if($rows){
    while($user = mysqli_fetch_assoc($result)) {
      $user_name = $user['name'];
      $user_email = $user['email'];
    ?>

  <form class="form-horizontal" name="myForm" method = "POST" onsubmit="return validateForm()" enctype="multipart/form-data" action="">

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value = "<?php echo $user_name; ?>" placeholder="Enter your name" name="name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" value = "<?php echo $user_email; ?>" placeholder="Enter email" name="email">
      </div>
    </div>
    <?php
  }
}
    ?>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name = "update" class="btn btn-default">Update</button>
        <button type="submit" name = "delete" class="btn btn-default">Delete your account</button>
      </div>
    </div>
  </form>
  <?php
  //--------Update User information part-------------------
  if(isset($_POST['update'])){
        //-- Get form data---------------------
        $name = addslashes($_POST ['name']);
        $email = addslashes($_POST ['email']);
        //--------Update User informations---------------------
        if(!empty($name)&&!empty($email)){
          $UpdateQuery = "UPDATE user SET name ='$name', email = '$email' WHERE id='$user_id'";
          $conn->query($UpdateQuery);
          echo "<font color = 'green'>";
          echo "Yours informations has been updated, The update will take affect after a new login .";
          echo "</font>";
        }else{
          echo "<font color = 'red'>";
          echo "Bank field detected !";
          echo "</font>";
        }
      }
      //------------Delete Account script ------------------
      if(isset($_POST['delete'])){
        $DeleteQuery = "DELETE FROM user WHERE id='$user_id'";
        $conn->query($DeleteQuery);
        header('location:index.php');
      }

  ?>
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
        $query = mysqli_query($conn, "SELECT * FROM user WHERE password ='$password1' AND id ='$user_id' ");
        $rows = mysqli_num_rows($query);
        if($rows==1){
        $UpdateQuery = "UPDATE user SET password ='$password2' WHERE id='$user_id'";
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
