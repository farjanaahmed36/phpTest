<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
This script generate update and send a new password
via email to the user.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GET NEW PASSWORD</title>
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

  <h2>GET NEW PASSWORD</h2>

  <form class="form-inline" action="md5.php" method = "POST">
    <div class="form-group">
      <label for="email">Your Email :</label>
      <input type="text" name = "email" id="email" placeholder="Enter your Email" >
    </div>

    <button type="submit" name = "submit" class="btn btn-default">NEW PASSWORD</button>
  </form>
<?php
function randStrGen($len){
    $result = "";
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < 5; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}
$randstr = randStrGen(200);

include 'config.php';
  if(isset($_POST['submit'])){
    if(!empty($_POST ['email'])){
      $email = $_POST ['email'];
      $query = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
      $rows = mysqli_num_rows($query);
      //----------- IF EMAIL EXIST-------------------------
      if($rows==1){
      $array = $query->fetch_assoc();
      $UID = $array['email'];
      $sql = "UPDATE user SET password ='$randstr' WHERE id='$UID'";
  	  $conn->query($sql);

      //---- Send Email---------------------------
      // the message
      $msg = "Your new password is : \n ".$randstr;
      // use wordwrap() if lines are longer than 70 characters
      $msg = wordwrap($msg,70);
      // send email
      mail($email,"Your password has been Changed",$msg);
      //-------End sending Email-----------------

      echo "<p>";
      echo "A new password has been sent to your email !";
      echo "<br>";
      }else{
        //-----------IF NO EMAIL--------------
      echo "<font color = 'red'>";
      echo "No email like this in our database .";
      echo "</font>";
      }
        }
      }
  ?>

</div>
<?php
include 'footer.php';
mysqli_close($conn);
?>
</body>
</html>
