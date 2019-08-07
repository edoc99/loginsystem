<?php 
//checking whether the user pressed the signup button or not
if(isset($_POST['signup-submit'])){

   //creating connection to the server
   require 'dbh.inc.php';

   //storing the user inputs to a variable
   $username = $_POST['uid'];
   $email = $_POST['mail'];
   $password = $_POST['pwd'];
   $passwordRepeat = $_POST['pwd-repeat'];

   //checking whether any field is empty
   if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
      header("Location: ../signup.php?error=emptyfields&uid=".$username. "&mail=".$email);
      //stop the below script
      exit();
   }
   elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/", $username)){
      header("Location: ../signup.php?error=invalidmailuid");
      //stop the below script
      exit();
   }
   elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: ../signup.php?error=invalidmail&uid=".$username);
      //stop the below script
      exit();
   }
   elseif(!preg_match("/^[a-zA-Z]*$/", $username)){
      header("Location: ../signup.php?error=invaliduid&mail=".$email);
      //stop the below script
      exit();
   }
   elseif($password !== $passwordRepeat){
      header("Location: ../signup.php?error=passwordcheck&uid=".$username. "&mail=".$email);
      //stop the below script
      exit(); 
   }
   else {

      $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
         header("Location: ../signup.php?error=sqlerror");
         //stop the below script
         exit();
      }
      else{
         mysqli_stmt_bind_param($stmt, "s", $email);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0){
            header("Location: ../signup.php?error=emailalreadyexist&uid=".$username);
            //stop the below script
            exit();
         }
         else {

            $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
               header("Location: ../signup.php?error=sqlerror");
               //stop the below script
               exit();
            }
            else {
               //hassing password
               $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

               mysqli_stmt_bind_param($stmt, "sss",$username, $email, $hashedPwd);
               mysqli_stmt_execute($stmt);
               header("Location: ../signup.php?signup=success");
               exit();
            }
         }
      }

   }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
      
}

else {
   header("Location: ../signup.php");
    //stop the below script
   exit();
}