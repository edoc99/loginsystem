<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!--basic styling-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <style>
      body
      {
      color: #c0c0c0 !important;
      background: #000000;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #220202, #000000);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #220202, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      }

      .navbar-brand {
      color: #c0c0c0 !important;
      font-size: 1.5em;  
      padding-right: 20px;
      padding-left: 10px;
      }

      ul a{
      color: #c0c0c0 !important;
      font-size: 1.2em;
      }

      form .btn{
      margin: 10px;
      }
      .form-control{
      background-color: #080101;
      border: unset;
      }

      .fa{
      color: #c0c0c0;
      font-size: 1.5rem;
      }

      .alert p {
      margin-bottom: 0rem;
      }
      .signup h3 {
      text-align: center;
      padding: 2.5rem 0 1.8rem;
      font-size: 2rem;
      }

   </style>
   <title>Document</title>
</head>
<body>
   
   <header>
      <nav class="navbar navbar-expand-lg ">
         <a class="navbar-brand" href="index.php">LOGO</a>
         
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-align-center"></i></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
               <li class="nav-item active">
               <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
               <a class="nav-link" href="#">About</a>
               </li>
               <li class="nav-item">
               <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact us</a>
               </li>
            </ul>
            
            <?php 
               if(isset($_SESSION['userId'])){
                  echo '<form action="includes/logout.inc.php" method="post" class="form-inline my-2 my-lg-0">
                           <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="logout-submit">Logout</button>
                        </form>';
               }
               else{
                  echo '<form action="includes/login.inc.php" method="post" class="form-inline my-2 my-lg-0">
                           <input class="form-control mr-sm-2" type="text" name="mailuid" placeholder="Username/E-mail..">
                           <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password..">
                           <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="login-submit">SignIn</button>
                        </form>
                        <a class="btn btn-outline-light my-2 my-sm-0" href="signup.php">SignUp</a>';
               }
            ?>

         </div>
      </nav>
   </header>