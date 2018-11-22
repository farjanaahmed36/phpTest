<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Login and Sign up script
-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/gallery.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class = "container">
  <?php
  //error_reporting(E_ALL);
  //ini_set('display_errors', 1);
  //- Check if someone click on Login or Sign Up to display the page
  include 'menu.php';
  if(!isset($_POST['login'])&&!isset($_POST['signup'])&&!isset($_POST['admin_login'])){
    header('location:index.php');
  }else{
  include 'config.php';

//--- if User Login ----------------------------------
if(isset($_POST['login'])){
  echo "<center><h2><b>";
  echo "You are trying to log into your account";
  echo "</b></h2>";
  echo "<br>";
  echo "<br>";
    $email = addslashes($_POST ['email']);
    $password = md5($_POST ['password']);
    $query = mysqli_query($conn, "SELECT * FROM user WHERE password='$password' AND email ='$email'");
        $rows = mysqli_num_rows($query);
        if($rows==1){
        $array = $query->fetch_assoc();
        session_start();
        $_SESSION['logged_in']= true;
        $_SESSION['id'] = $array['id'];
        $_SESSION['name'] = $array['name'];
        $_SESSION['email'] = $array['email'];
        header('location:account.php');
        }else{
        echo "<font color = 'red'>";
	      echo "Wrong Email or Wrong Password click";
        echo "</font>";
        echo "<br>";
        echo "<font color = 'green'><b>";
        echo "<a href = 'forget.php'>";
        echo "Here";
        echo "</a>";
        echo "</b></font>";
        echo "<font color = 'red'>";
        echo " to get a new password .";
        echo "</font>";
        }
        echo "</center>";
}

//--- if Administrator Login ----------------------------------
if(isset($_POST['admin_login'])){
  echo "<center><h2><b>";
  echo "You are trying to log into your account";
  echo "</b></h2>";
  echo "<br>";
  echo "<br>";
    $admin = addslashes($_POST ['admin']);
    $password = md5($_POST ['password']);
    $query = mysqli_query($conn, "SELECT * FROM administrator WHERE password='$password' AND administrator ='$admin'");
        $rows = mysqli_num_rows($query);
        if($rows==1){
        $array = $query->fetch_assoc();
        session_start();
        $_SESSION['logged_in']= true;
        $_SESSION['id'] = $array['id'];
        $_SESSION['administrator'] = $array['administrator'];

        header('location:admin.php');
        }else{
        echo "<font color = 'red'>";
	      echo "Wrong name or Wrong Password click";
        echo "</font>";

        }
        echo "</center>";
}

//--------------- If user Sign Up-------------------------
if(isset($_POST['signup'])){
  echo "<center>";
  echo "You are trying to create an account";
  echo "<br>";
  echo "<br>";
    $email = addslashes($_POST ['email']);
    $password = md5($_POST ['password']);
    $name = addslashes($_POST ['name']);
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
    $rows = mysqli_num_rows($query);
    if($rows!=1){
    $array = $query->fetch_assoc();
    mysqli_query($conn, "INSERT INTO user (id,email,name,password,datesignup) VALUES ('','$email','$name','$password','$datepost')");


    //---- Send Email---------------------------
        /*
    // the message
    $msg = "Welcome to phpTest: \n Your login informations : \n Email = ".$email." Password = ".$password." \n Now you can log into your account. ";
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    // send email
    mail($email,"Welcome to phpTest",$msg);
    //-------End sending Email-----------------
    */

    echo "Congratulation now you have an account";
    echo "<br>";
    echo "Now you can log into your account";

    }else{
	      echo "Email already exists click";
        echo "<br><b>";
        echo "<font color = 'green'>";
        echo "<a href = 'login.php'>";
        echo "Here";
        echo "</b></a>";
        echo "</font>";
        echo " to log into your account.";
    }
  }
  echo "</center>";
}

?>
<?php
include 'footer.php';
mysqli_close($conn);
?>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>
