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
  <?php
require_once 'orders.php';

session_start();
$user_id = $_SESSION['user_id'];
$book_id = $_GET['id'];



$order = Orders::getorder($user_id,$book_id);
if($order){
  ?> 
  <center>
        <h1> <?php echo ( "Sorry...  you buy it recently"); ?> </h1>
        <center><a href="show_books.php" class="sh-btn">show Books </a>
        <a  href="show_recently_order.php" class="sh-btn" >Show  resently Buying </a></center>

</center>
  <?php
}else{
    $addorder = new neworder($user_id,$book_id);
    $addorder->addorder();
    if($addorder){
        ?> 
  <center>
        <h1> <?php echo ( "you buy it "); ?> </h1>
        <center><a href="show_books.php" class="sh-btn">show Books </a>
        <a  href="show_recently_order.php" class="sh-btn" >Show  resently Buying </a></center>

</center>
  <?php
   }
}



?>

</body>
</html>

