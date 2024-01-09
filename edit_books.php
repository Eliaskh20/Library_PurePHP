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

    $boks_id = $_GET['id'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "hi";
        $new_Name= $_POST['Name'];
        $new_Writer = $_POST['Writer'];
        $new_Year = $_POST['Year'];
        $new_Type = $_POST['Type'];
        if (isset($_GET['file'])) {

            $file_name = $_FILES['file']['name'];
            $file_tmp_name = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];

            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = array('pptx', 'docx' , 'pdf');

            if (in_array($file_ext, $allowed_exts) && $file_size < 1000000) {
                $file_path = 'uploads/' . uniqid() . '.' . $file_ext;
                move_uploaded_file($file_tmp_name, $file_path);
                $boks = Manager_Usar2::get_boks($boks_id);
                if (!$boks) {
                    echo "Invalid boks ID.";
                exit;
                }
                if ($_SESSION['user_id'] !== $boks['user_id']) {
                    echo $_SESSION['user_id']. ' ' . $boks['user_id'];
                    echo "You can't edit this Book";
                    exit;
                }
                Manager_Usar2::update_boks($boks_id, $new_Name,$new_Writer,$new_Year ,$new_Type, $file_path);

            } else {
            echo "Invalid file format or size";
            exit;
            }
        }

        echo  "<h2>"."Book is  updated ". "</h2>";
        ?> <a href="show_booksM.php?id=<?php echo $boks['ID'];?>&file=<?php echo $boks['file'];?>" class="hero-btn">Back To bokss</a> <?php  
    }else {
       
    ?>

        <p class="up">Edit  Book </p> 
        <div class="boxA">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="in-boxA">
                    <input type="text" id="Name" name="Name" placeholder="Name" required>
                    <br>
                    <input type="text" id="Writer" name="Writer" placeholder="Writer" required>
                    <br>
                    <input type="text" id="Year" name="Year" placeholder="Year" required>
                    <br>
                </div>
                <br>

                <div >
                    Choose Type 
                    <select id="Type" name="Type" required>
                    <option value="Scince">Scince</option>
                    <option value="Gografic">Gografic</option>
                    <option value="Sport">Sport</option>
                    </select>
                </div>
                <br>
                <?php
                if (isset($_GET['file'])) {
                    ?>
                    <input type="file" id="file" name="file"  class="custom-file-input">
                    <br>
                    <?php 
                }

                ?>
                <input type="submit" value="Edi Book" class="sh-btn">
            </form>
        </div>

    <?php
            }
        ?>
</center>
</body>
</html>