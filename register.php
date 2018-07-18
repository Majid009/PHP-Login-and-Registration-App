<?php
require 'config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD , DB_DATABASE);
   if(!$conn){ die("Cannot connect to Database".mysqli_connect_error());}

   $message = "";

   if( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) ){
     $email = $_POST['email'];
     $password = md5($_POST['password']);
     $username = $_POST['username'];

     $sql = "select * from users where email='$email'";
     $result =mysqli_query($conn , $sql);
     $num = mysqli_num_rows($result);
     if($num==1){
       $message = "email exists already !";
     } else {
       $sql = "insert into users (username , email , password) values ('$username' , '$email' , '$password')";
       $result =mysqli_query($conn , $sql);
       if($result){
         $message = "Your are registered Now !";
       }
     }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Register</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4" style="margin-top: 30px; text-align: center;">
        <h1> Register </h1>
        <form action="register.php" method="post">
         <input type="text" name="username" class="form-control" placeholder="Enter Username" required> <br>
         <input type="text" name="email" class="form-control" placeholder="Enter your email" required> <br>
         <input type="password" name="password" class="form-control" placeholder="Enter your password" required> <br>
         <input type="submit" name="" value="Register" class="form-control btn btn-primary"> <br>
         <h2><?php echo $message; ?></h2>
      </div>
    </div>
  </div>
</body>
</html>
