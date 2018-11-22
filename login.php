<!DOCTYPE html>
<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
-->
<html lang="en">
<head>
  <title>LOGIN</title>
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
  <h2>Login</h2>
  <p>Login and Publish</p>
  <form class="form-inline" method = "POST" action="logreg.php">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>Forgot your password ?<font color = "#00cc7a"><a href ="forget.php">click here</a></font></label>
      </div>
    </div>
    <button type="submit" name = "login" class="btn btn-default">Sign in</button>
  </form>
</div>
<?php
include 'footer.php';
?>
</body>
</html>
