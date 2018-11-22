
<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Administrator page where Administrator can Delete
user post or delete user account Script
-->
<?php
include 'config.php';

if(isset($_POST['delete_post'])){
//-- Get form data---------------------
$post_id = $_POST ['postid'];
$DeleteQuery = "DELETE FROM userpost WHERE id='$post_id'";
$conn->query($DeleteQuery);
header('location:admin.php');
}

if(isset($_POST['delete_user'])){
//-- Get form data---------------------
$theuser_id = $_POST ['userid'];
$DeleteQuery = "DELETE FROM user WHERE id='$theuser_id'";
$conn->query($DeleteQuery);
header('location:admin.php');
}
  mysqli_close($conn);
?>
