<!--
AUTHOR : AMANI A. SAINT-CLAIR
EMAIL : aymeric@zgamesoft.com
Administrator page where Administrator can Delete
user post or delete user account
-->
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMINISTRATOR PAGE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/gallery.css">
  <link rel="stylesheet" href="css/pagination.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body >
<div class="container">
  <?php
  include 'admin_menu.php';
  ?>

  <div style="padding-left:16px">
    <h2></h2>
    <?php
      //----- Select all  posts from userpost table -------
      include 'config.php';
      $perpage = 6; //------ display 6 posts per page------------
      if(isset($_GET["page"])){
      $page = intval($_GET["page"]);
      }else {
      $page = 1;
      }
      $calc = $perpage * $page;
      $start = $calc - $perpage;
      $result = mysqli_query($conn, "SELECT * FROM userpost  ORDER BY id DESC Limit $start, $perpage");
      $rows = mysqli_num_rows($result);
      ?>

    <p>List of (<?php echo $rows; ?>) posts</p>
  </div>
  <table class="table table-striped">
      <tbody>
        <?php

            if($rows){
            $i = 0;
          while($post = mysqli_fetch_assoc($result)) {
              //--------- Each time we get a value from userpost table ------------
            $id= $post["id"];
    	       $picture= $post["picture"];
             $type = $post["type"];
             $title = $post['title'];
             $description = $post['description'];
             $datepost = $post['datepost'];
             $theuser_id= $post["user_id"];
    ?>

      <tr>
      <td>
        <div class="gallery">
        <a  href="img.jpg">
        <?php echo "<img src=data:image/jpg;base64,$picture width='20%' height='20%'>";?>
        <div class="desc">
        <?php echo $type; ?>
        </div>
        </a>
          </div>
          </td>
          <td>
          <font size="2">
          <h3><b><u><?php echo $title; ?></u></b></h3>
          <?php echo $description; ?>
          <br>
          <?php
          echo "<b>";
          echo "Posted : ".$datepost."";
          echo "</b>";

           ?>
           <br><b><h3>
             <form class="form-inline" method = "POST" action="admin_mg.php">
              <input type="hidden" name="postid" value = "<?php echo $id; ?>">
              <input type="hidden" name="userid" value = "<?php echo $theuser_id; ?>">
               <button type="submit" name = "delete_post" class="btn btn-default">DELETE THIS POST</button>
               <button type="submit" name = "delete_user" class="btn btn-default">DELETE THE AUTHOR OF THIS POST</button>
             </form>

         </h3></b>
          </font>
        </td>
        </tr>
        <?php
               }
        }else{
          //----- If there are no post to display----------
                echo "<center>";
                echo "<font color = 'red'>";
                echo "NO POST YET !";
                echo "</font>";
                echo "</center>";
            }
                 ?>


      </tbody>
  </table>
  <div class="w3-container">
   <div class="w3-panel w3-card">
   <div class="pagination">
     <center>
  <?php
//------------- Display the numbre of pages as button at the Bottom
      if(isset($page)){
      $result = mysqli_query($conn,"select Count(*) As Total from userpost ");
      $rows = mysqli_num_rows($result);
      if($rows){
      $rs = mysqli_fetch_assoc($result);
      $total = $rs["Total"];
      }
      $totalPages = ceil($total / $perpage);
      if($page <=1 ){
      //echo "<span id='page_links' style='font-weight: bold;'>&laquo;</span>";
      }else{
      $j = $page - 1;
      echo "<a href='account.php?page=$j'>&laquo;</a>";
      }
      for($i=1; $i <= $totalPages; $i++){
      if($i<>$page){
        echo "<a href='account.php?page=$i'>$i</a>";
      }
      else
      {
        echo "<a href='account.php?page=$i' class='active'>$i</a>";
      }
    }
    if($page == $totalPages )
    {
  //echo "<span id='page_links' style='font-weight: bold;'>&raquo;</span>";
    }else{
      $j = $page + 1;
      echo "<a href='account.php?page=$j'>&raquo;</a>";
      }
      }
      ?>
    </center>
   </div>
   </div>



  <?php

    include 'footer.php';
    mysqli_close($conn);
  ?>
</div>

</body>
</html>
