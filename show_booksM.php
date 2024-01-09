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
  include 'books.php';
  session_start();


  if (!isset($_SESSION['user_id'])) {
    header('Location: login_form.php'); 
  }
  $bokss1 = Manager_Usar2::show_bokss();
  ?> 
  <center> <p class="up">Library   Management </p>  </center> 
  <?php
  foreach ($bokss1 as $boks) {
    ?>
    <center> 
      <div class="boxSM"> <?php
        $user = Books::get_user($boks['user_id']);
        echo "<h2>" . $boks['Name'] . "</h2>";
        ?> 
        <div class="show">
            <div class="Mian">Type :</div> <div class="NMian"> <?php echo ($boks['Type']) ?> </div>
            <div class="Mian">Year :</div> <div class="NMian"> <?php echo ($boks['Year']) ?> </div>
            <div class="Mian">Write By :</div> <div class="NMian"> <?php echo ($boks['Writer']) ?> </div>
        </div>
        <div class="bbtn">
          <a  href=" <?php echo $boks['file'];?>" target = ".blank"  class="sh-btn" > show <?php echo $boks['Name'] ?> </a> 
          <a href="edit_books.php?id=<?php echo $boks['ID'];?>&file=<?php echo $boks['file'];?>"  class="sh-btn">Edit</a>
          <a href="delete_books.php?id=<?php echo $boks['ID']; ?>&file=<?php echo $boks['file'];?>"  class="sh-btn">delete</a>
        </div>
      </div> 
    </center>
    <?php 
    
  }
  ?>
  <center><a href="addbooks_form2.php" class="sh-btn">add Book </a></center>
  <center><a href="logout.php" class="sh-btn" >logout </a></center>


</body>
</html>


