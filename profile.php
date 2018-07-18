<?php
session_start();
if( !isset($_SESSION['user_logged_in']) ){
  header("location:access-denied.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>profile</title>
</head>
<body>
  <h2 style="margin-top: 20px;">Hello , <?php echo $_SESSION['user_name']; ?></h2>
  <h2><a href="logout.php">Logout</a></h2>
</body>
</html>
