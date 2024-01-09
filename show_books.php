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
session_start();  //اضافة كوكيز هون قبل السشن

if (!isset($_SESSION['user_id'])) {
  header('Location: login_form.php'); 
}

$bokss1 = Normal_Usar2::show_bokss();
?> 
<form action="#" method="post" enctype="multipart/form-data">
<center> <p class="up">Library   
   <input type="text" placeholder="Search.." class="Search" name="Search"></p>  
</form>
 </center>

 <?php
 
if(isset($_POST['Search'])){
  if(!empty($_POST['Search'])){

    $search = $_POST['Search'];  
    $searchl = strtolower($search);   // تحول مدخلات البحث الى حروف صغيرة    من أجل البحث
    foreach ($bokss1 as $boks) {        
      $user = Books::get_user($boks['user_id']);
      $nameL = strtolower($boks['Name']);   // تحويل اسم الكتاب الى حروف صغيرة       من أجل البحث
      $WriterL =  strtolower($boks['Writer']); 
      $TypeL =  strtolower($boks['Type']); 
      $YearL = $boks['Year'];
      if ($searchl == $nameL || $searchl == $WriterL || $searchl == $YearL || $searchl == $TypeL ){  //  مقارنة مدخلات البحث ب اسماء الكتب  او النوع او العام او الكاتل
        ?>> <center> 
              <div class="boxSM"> <?php
                echo "<h2>" . $boks['Name'] . "</h2>";
                ?> <div class="show">
                    <div class="Mian">Type :</div> <div class="NMian"> <?php echo ($boks['Type']) ?> </div>
                    <div class="Mian">Year :</div> <div class="NMian"> <?php echo ($boks['Year']) ?> </div>
                    <div class="Mian">Write By :</div> <div class="NMian"> <?php echo ($boks['Writer']) ?> </div>
                  </div>
                  <div class="bbtn">
                    <a  href=" <?php echo $boks['file'];?>" target = ".blank"  class="sh-btn" > show <?php echo $boks['Name'] ?> </a>
                  </div>
              </div>
            </center>
        <?php
      }
    }

  }
  
}else {
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
            <a  href="add_order.php?id=<?php echo $boks['ID']; ?>&file=<?php echo $boks['file'];?>" class="sh-btn" > Buy  <?php echo $boks['Name'] ?> </a>
        </div>  
      </div>
    </center>
    <?php
  }
}


?>
<center>
  <a href="logout.php" class="sh-btn" >logout </a>
<a  href="show_recently_order.php" class="sh-btn" >Show  resently Buying </a>
</center>
</body>
</html>



