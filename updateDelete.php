<?php
//-------- Check if player click on update or delete button -------------------
if(!isset($_POST['update'])&&!isset($_POST['delete'])){
  header('location:account.php');
}else{
include 'config.php'; //----- Connection to database---------------
//-------------Update Post---------------------------------------
if(isset($_POST['update'])){
      //-- Get form data---------------------
      $post_id = $_POST ['post_id'];
      $type = addslashes($_POST ['type']);
      $title = addslashes($_POST ['title']);
      $description = addslashes($_POST ['description']);

      //-------- Update post with a new picture -------------------
      if(isset($_FILES['picture'])){
      //------- convert image to base64_encode-------
      $image_path = $_FILES["picture"]["tmp_name"]; //this will be the physical path of your image
      if($image_path!=""){
      $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
      $picture = base64_encode($img_binary);
      $UpdateQuery = "UPDATE userpost SET type ='$type', title = '$title', description = '$description',picture = '$picture' WHERE id='$post_id'";
      $conn->query($UpdateQuery);
      header('location:account.php');
      }else{
      //-------- Update post without a new picture -------------------
      $UpdateQuery = "UPDATE userpost SET type ='$type', title = '$title', description = '$description' WHERE id='$post_id'";
      $conn->query($UpdateQuery);
      header('location:account.php');
      }
    }
  }

  //---------------- Delete Post ------------------------------------
    if(isset($_POST['delete'])){
    //-- Get form data---------------------
    $post_id = $_POST ['post_id'];
    $DeleteQuery = "DELETE FROM userpost WHERE id='$post_id'";
    $conn->query($DeleteQuery);
    header('location:account.php');
    }
  //-------------------------------------------------------------------
}
  mysqli_close($conn);
?>
