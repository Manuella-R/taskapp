<?php

include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `User` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `User`(Username ,Name, email, Password, image) VALUES('$username', '$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
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

    <div class="title">
        <h2 class="heading">Register</h2>
    </div>
    <div class="inpc">
    <div class="input">
        <input type="text" name="username" placeholder="enter username" class="box" required>
        </div>
        <div class="input">
        <input type="text" name="name" placeholder="enter full name" class="box" required>
        </div>
        <div class="input">
        <input type="email" name="email" placeholder="enter email" class="box" required>
        </div>
        <div class="input">
        <input type="password" name="password" placeholder="enter password" class="box" required>
        </div>
        <div class="input">
        <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
        </div>
        <div class="input">
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
        </div>
        <div class="input">
            <input type="submit" name="submit" value="register now" class="btn1">
            <p>already have an account? <a href="login.php">login now</a></p>
        </div>
      </div>

    </form>
</body>
</html>