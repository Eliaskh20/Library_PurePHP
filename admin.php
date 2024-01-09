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
 require_once 'user.php' ;

session_start();
   
$user = User2::chooseAd();
?>
<center>
<p class="up">Admin   </p>
</center>
<?php
  foreach ($user as $usd){

      ?>
      <center>
     
              <div class="boxADe">
                   <div class="show">
                      <div class="Mian">Name :</div> <div class="NMian"> <?php echo ($usd['Name']) ?> </div>
                      <div class="Mian">Email :</div> <div class="NMian"> <?php echo ($usd['Email']) ?> </div>
                      <div class="Mian">Phone :</div> <div class="NMian"> <?php echo ($usd['Phone']) ?> </div>
                      <div class="Mian">password :</div> <div class="NMian"> <?php echo ($usd['password']) ?> </div>
                  </div>
                  <div class="bbtn">
                  <a  href="updateAdmin.php?ID=<?php echo ($usd['ID']) ;  ?>   "   class="sh-btn" >  Choose  </a> 
                  </div>

      </center>
     <?php
     
  }

?>
</body>
</html>