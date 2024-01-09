<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body class="body">
<center>
<?php
require_once  "user.php";

session_start();


$ID = $_GET['ID'];

$user = User2::deluser($ID);
if($user){ 
    echo "Admin  is Add ".'<br>';
    $userd = User2::addmanager($ID);

      echo  "User is Deleted";
      header('Location:admin.php'); 

}

?>
</center>
</body>
</html>