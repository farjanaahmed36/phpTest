<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Sign Up script where user make posts
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PUBLISH SOMETHING</title>
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
<body onchange="myFunction()">
<div class="container">
  <?php
  include 'account_menu.php';
  ?>
  <h2>Publish</h2>

    <form class="form-horizontal" method = "POST" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data" action="">
      <input type="hidden" class="form-control" value ='<?php echo $user_id; ?>' placeholder="Title" name="user_id">

    <div class="form-group">
        <label class="control-label col-sm-2" for="type">Type :</label>
        <div class="col-sm-10">
          <select  class="form-control"  name="type">
            <option value = "">Select a type</option>
            <option value = "In mind">In mind</option>
            <option value = "Business">Business</option>
            <option value = "Politic">Politic</option>
            <option value = "Entertaiment">Entertaiment</option>
            <option value = "Event">Event</option>
            <option value = "Dating">Dating</option>
            <option value = "Accommodation">Accommodation</option>
          </select>
        </div>
        <font color = "red"><p id="type"></p></font>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="title">Title :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Title" name="title">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="description">Description :</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="picture">Picture :</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id = "picture" name="picture" onchange="myFunction()" >

        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name = "publish" class="btn btn-default">Publish</button>
        </div>
      </div>
    </form>

    <?php

    if(isset($_POST['publish'])){
      //include 'config.php';
        $user_id = addslashes($_POST ['user_id']);
        $type = addslashes($_POST ['type']);
        $title = addslashes($_POST ['title']);
        $description = addslashes($_POST ['description']);
        if(!isset($_FILES['picture'])){
            echo "<center>";
            echo "<font color = 'red'>";
            echo "Insert a picture";
            echo "</font>";
            echo "</center>";
          }else{
          //------- convert image to base64_encode------------------
          $image_path = $_FILES["picture"]["tmp_name"]; //this will be the physical path of your image
          if($image_path!=""){
          $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
          $picture = base64_encode($img_binary);
          //-------- Insert post -----------------------------------
          mysqli_query($conn, "INSERT INTO userpost (id,type,title,description,picture,datepost,user_id) VALUES ('','$type','$title','$description','$picture','$datepost','$user_id')");
          echo "<center>";
          echo "<font color = 'green'>";
          echo "Your post has been submited !";
          echo "</font>";
          echo "</center>";

          header('location:account.php');

        }
      }
    }

    include 'footer.php';
    mysqli_close($conn);
    ?>
</div>
<script>
function validateForm() {

//--------Get File Size---------------

    var p = document.getElementById("picture");
    var txt = "";
    if ('files' in p) {
        if (p.files.length == 0) {
          //  txt = "Select one or more files.";
        } else {
            for (var i = 0; i < p.files.length; i++) {
                //txt += "<br><strong>" + (i+1) + ". file</strong><br>";
                var file = p.files[i];
                if ('name' in file) {
                    //txt += "name: " + file.name + "<br>";
                }
                if ('size' in file) {
                    //txt += "size: " + file.size + " bytes <br>";
                    var x5 = file.size;
                    var x5 = x5/1000;
                }
            }
        }
    }
    else {
        if (p.value == "") {
          //  txt += "Select one or more files.";
        } else {
            //txt += "The files property is not supported by your browser!";
            //txt  += "<br>The path of the selected file: " + p.value; // If the browser does not support the files property, it will return the path of the selected file instead.
        }
    }
    //document.getElementById("demo").innerHTML = txt;

  var x1 = document.forms["myForm"]["type"].value;
  var x2 = document.forms["myForm"]["title"].value;
  var x3 = document.forms["myForm"]["description"].value;
  var x4 = document.forms["myForm"]["picture"].value;

    if (x1 == "") {
        alert("Type must be filled out");
        return false;
    }else if (x2 == "") {
        alert("Title must be filled out");
        return false;
    }else if (x3 == "") {
        alert("Description must be filled out");
        return false;
    }else if (x4 == "") {
        alert("Picture must be filled out");
        return false;
    }else if (x5 >= 514) {
        alert("Picture to big to be uploaded");
        return false;
    }

}
</script>
</body>
</html>
