<?php 
   require "header.php";
?>
   <main>

   <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <strong>
         <?php 
            if(isset($_SESSION['userId'])){
               echo '<p>You are logged in!</p>' . $_SESSION['userUid'];
            }
            else{
               echo '<p>You are logged out!</p>';
            }
         ?>
      </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
   </div>

   <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-4">
               <h4>Just a LOGIN system which you can implement anywhere.</h4>
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