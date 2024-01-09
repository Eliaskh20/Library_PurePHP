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
require_once 'books.php';

session_start();

$id = $_GET['id'];
if (isset($_GET['file'])) {
    $boks = Manager_Usar2::get_boks($id);

    if (!$boks) {
        echo "<h2>"."Invalid ID" . "</h2>";
        exit;
    }


    if ($_SESSION['user_id'] !== $boks['user_id']) {
        echo "<h2>"."You can't delete this Books." . "</h2>";
        exit;
    }

    Manager_Usar2::delete_boks($id);  
    echo "<h2>"."Books is deleted ". "</h2>";
    ?> <a href="show_booksM.php?id=<?php echo $boks['ID'];?>&file=<?php echo $boks['file'];?>" class="sh-btn">Back To bokss</a> <?php
}

?>
</center>
</body>
</html>