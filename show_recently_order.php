

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
include 'orders.php';
session_start();  //اضافة كوكيز هون قبل السشن

if (!isset($_SESSION['user_id'])) {
  header('Location: login_form.php'); 
}
$user_id = $_SESSION['user_id'];
?> 
 <center> 
 <p class="up">MY BOOKS   </p>
</center> 
 <?php
$order = Orders::show_order($user_id);


 foreach ($order as $orderN) {
    ?>
    <center> 
      <div class="boxSM"> <?php
        echo "<h2>" . $orderN['Name'] . "</h2>";
        ?> 
        <div class="show">
          <div class="Mian">ID BOOK:</div> <div class="NMian"> <?php echo ($orderN['ID']) ?> </div>
          <div class="Mian">Writer BY :</div> <div class="NMian"> <?php echo ($orderN['Writer']) ?> </div>
          <div class="Mian">Year :</div> <div class="NMian"> <?php echo ($orderN['Year']) ?> </div>
          <div class="Mian">Type :</div> <div class="NMian"> <?php echo ($orderN['Type']) ?> </div>
        </div>
        <div class="bbtn">
            <a  href=" <?php echo $orderN['file'];?>" target = ".blank"  class="sh-btn" > show <?php echo $orderN['Name'] ?> </a>
           
        </div>  
      </div>
    </center>
    <?php
  }
  ?>
      <center>
  <a href="logout.php" class="sh-btn" >logout </a>
<a  href="show_books.php" class="sh-btn" >Show Book </a>
</center>
</body>
</html>




