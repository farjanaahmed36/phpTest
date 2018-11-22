<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Sign Up script where user create an account
-->


<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIGN UP</title>
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
  <h2>Sign Up</h2>
    <form class="form-horizontal" name="myForm" method = "POST" onsubmit="return validateForm()" enctype="multipart/form-data" action="logreg.php">

      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label><input type="checkbox" id = "terms" name="terms" > I Accept the <font color = "#00cc7a"><a href ="terms.php">Terms and Condition</a></font></label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name = "signup" class="btn btn-default">Sign Up</button>
        </div>
      </div>
    </form>
    <?php
    include 'footer.php';
    //mysqli_close($conn);
    ?>
</div>
<script>
function validateForm() {
  var checkBox = document.getElementById("terms");
    var x = document.forms["myForm"]["email"].value;
    var x1 = document.forms["myForm"]["password"].value;
    var x2 = document.forms["myForm"]["name"].value;


    if (x == ""||x1 == ""||x2 == ""||checkBox.checked == false) {
        alert("All the fields are required !");
        return false;
    }
}
</script>
</body>
</html>
