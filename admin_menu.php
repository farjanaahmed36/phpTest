<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Administrator Account menu script
-->

<?php
//------ If the adminstrator is logged in
//-----display the menu or return to the index----------
session_start();
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_SESSION['administrator'])){
$theuser = $_SESSION['administrator'];
$user_id = $_SESSION['id'];

}else{
header('location:index.php');
}
?>

<div class="topnav" id="myTopnav">
  <a href="adminpass.php">Change password</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<?php
 echo "<b> Welcome : ".$theuser."</b>";
?>
