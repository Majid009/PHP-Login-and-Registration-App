<?php
session_start();
require 'config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD , DB_DATABASE);
   if(!$conn){ die("Cannot connect to Database".mysqli_connect_error());}

   $message = "";

   if( isset($_POST['email']) && isset($_POST['password']) ){
     $email = $_POST['email'];
     $password = md5($_POST['password']);

     $sql = "select * from users where email='$email' and password='$password'";
     $result =mysqli_query($conn , $sql);
     $num = mysqli_num_rows($result);
     if($num==1){
       $row=mysqli_fetch_array($result);
       $_SESSION['user_logged_in'] = "ok" ;
       $_SESSION['user_name'] = $row['username'] ;
       header("location:profile.php");
     } else {
        $message = "Incorrect details ! try again";
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
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4" style="margin-top: 30px; text-align: center;">
        <h1> Login </h1>
        <form action="login.php" method="post">
         <input type="text" name="email" class="form-control" placeholder="Enter your email" required> <br>
         <input type="password" name="password" class="form-control" placeholder="Enter your password" required> <br>
         <input type="submit" name="" value="Login" class="form-control btn btn-primary"> <br>
         <h2><?php echo $message; ?></h2>
      </div>
    </div>
  </div>
</body>
</html>
