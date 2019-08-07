<?php 
   require "header.php";
?>

   <main>
      <div class="container-fluid">
         <div class="row justify-content-center">
         <div class=" signup col-12 col-sm-6 col-md-3">
      <h3>Signup</h3>
      <?php 
         //since we get error on url we can use get method
         if(isset($_GET['error'])){
            if($_GET['error'] == "emptyfields"){
               echo '<p>Fill in all the fields!</p>';
            }
            else if($_GET['error'] == "invaliduidmail"){
               echo '<p>Invalid username and e-mail!</p>';
            }
            else if($_GET['error'] == "invaliduid"){
               echo '<p>Invalid username!</p>';
            }
            else if($_GET['error'] == "invalidmail"){
               echo '<p>Invalid e-mail!</p>';
            }
            else if($_GET['error'] == "passwordcheck"){
               echo '<p>Your password does not match!</p>';
            }
            else if($_GET['error'] == "emailalreadyexist"){
               echo '<p>Email already exist!</p>';
            }
         }
         else if ($_GET['signup'] == "success"){
            echo '<p>Signup successful!</p>';
         }
      ?>
    
      <form action="includes/signup.inc.php" method="post">
         <div class="form-group ">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="uid"  placeholder="Username">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="mail"  placeholder="Enter email">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pwd" placeholder="Password">
            <label for="exampleInputPassword1">Repeat Password</label>
            <input type="password" name="pwd-repeat" class="form-control" placeholder="Repeat Password">
         </div>
         <button type="submit" class="btn btn-dark" name="signup-submit">Signup</button>
      </form>
      </div>
      </div>
      </div>
   </main>
   
<?php 
   require "footer.php";
?>