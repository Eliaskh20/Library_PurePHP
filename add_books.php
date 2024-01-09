<?php
require_once 'books.php';

session_start();

$Name = $_POST['Name'];
$Writer = $_POST['Writer'];
$Year = $_POST['Year'];
$Type = $_POST['Type'];
$user_id = $_SESSION['user_id'];


    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];

    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_exts = array('pptx', 'docx' , 'pdf');

    if (in_array($file_ext, $allowed_exts) && $file_size < 1000000) {
      $file_path = 'uploads/' . uniqid() . '.' . $file_ext;
      move_uploaded_file($file_tmp_name, $file_path);
      echo $file_path;
      $boks = new Manager_Usar2 ($Name, $Writer,$Year, $Type, $file_path, $user_id);
      $boks->add_boks();
    } else {
      echo "Invalid file format or size";
    }
  
  echo "Books is added ";

header('Location: show_booksM.php');
exit;
?>
