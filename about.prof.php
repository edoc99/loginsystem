<?php 
   require "header.php";
?>
<?php 
   if(isset($_SESSION['userId'])){
      //connecting to database   
      require 'includes/dbh.inc.php';

      $userId = $_SESSION['userId'];

      //sql querry for the login user
      $sql ="SELECT uidUsers, emailUsers FROM users WHERE idUsers = '$userId';";

      //make querry & get result
      $result = mysqli_query($conn, $sql);

      //fetch the result
      $profile = mysqli_fetch_assoc($result);

      //free result from the memory
      mysqli_free_result($result);

      //clode the connection
      mysqli_close($conn);
   }
   else{
      header("Location: index.php?error=nouser");
      exit();
   }
?>
   <main>
   <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3">
               <h1>Welcome</h1>
               <h2><?php echo htmlspecialchars($profile['uidUsers']); ?></h2>
               <div><?php echo htmlspecialchars($profile['emailUsers']); ?></div>
            </div>
      </div>
      </div>
   </main>

   <style>
      .justify-content-center {
         text-align: center;
         padding: 10%;
      }
   </style>
   <?php 
   require "footer.php";
   ?>
