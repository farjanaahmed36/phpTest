<!DOCTYPE html>
<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Generate md5 password for the administrator
-->
<html lang="en">
<head>
  <title>Encrypt password MD5</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
  <?php
  include 'menu.php';
  ?>

  <h2>Encrypt</h2>
  <p>Encrypt MD5 password</p>
  <form class="form-inline" action="md5.php" method = "POST">
    <div class="form-group">
      <label for="email">Administrator Password :</label>
      <input type="text" name = "password" id="email" placeholder="Password to Encrypt" >
    </div>

    <button type="submit" name = "submit" class="btn btn-default">MD5 Encryption</button>
  </form>
<?php
  if(isset($_POST['submit'])){
    if(!empty($_POST ['password'])){
      $password = $_POST ['password'];
      $pass = md5($password);
      echo "<p>";
      echo "MD5 Encyption done !";
      echo "<br>";
      echo "<b>";
      echo "MD5 Encryption of ".$password." is : ";
      echo "</b>";
      echo "<b><h3><font color = 'green'>";
      echo "".$pass;
      echo "</font></h3></b>";
      echo "<br>";
      echo "Go to your MySql database, edit the value of the field password to the encryted password.";
      echo "</p>";
      }else{
      echo "<font color = 'red'>";
      echo "Write the password that your want to encryt to MD5";
      echo "</font>";
      }
        }
  ?>

</div>
<?php
include 'footer.php';
?>
</body>
</html>
