<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Account The menu script
-->

<?php
session_start();
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_SESSION['name'])){
$theuser = $_SESSION['name'];
$email = $_SESSION['email'];
$user_id = $_SESSION['id'];
 //echo ' '.$theuser;
//$queryuser = mysqli_query($conn, "SELECT * FROM user WHERE name = '$theuser'");
//$rowuser = $queryuser->fetch_assoc();

}else{
header('location:index.php');
}
?>

<div class="topnav" id="myTopnav">
  <a href="account.php">Account</a>
  <a href="publish.php">Post something</a>
  <a href="mg_account.php">Manage Account</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<?php
 echo "<b> Welcome : ".$theuser." / ".$email."</b>";
?>
