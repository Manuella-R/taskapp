<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `User` WHERE email = '$email' AND Password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['UserID'] = $row['UserID'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/login.css">
   
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
<div class="container">
    <div class="title">
        <h2 class="heading">Login</h2>
        <p>Welcome to taskapp</p>
    </div>
    <div class="inpc">
        <div class="input">
        <input type="email" name="email" placeholder="enter email" class="box" required>
        </div>
        <div class="input">
        <input type="password" name="password" placeholder="enter password" class="box" required>
        </div>
        <div class="for">
           
          </div>
        <div>
            <input type="submit" name="submit" value="login now" class="btn">
            <button onclick="Register()"class="btn">Sign up</button>
            <a href="index.html">return to home page</a>
        </div>
    </div>
</div>
    </form>
    <script>
      function Register() {
            // Redirect to Readmore.html
            window.location.href = 'register1.php';
        }
    </script>
</body>
</html>