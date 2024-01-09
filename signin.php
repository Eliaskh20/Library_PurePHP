<?php
include "books.php";
include "user.php";
// include_once  "conn.php";
echo "signin ";
if(isset($_POST['Register'])){
    echo "hi";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $user = new User2($username, $email,$phone,$password);
    if($user->register()) 
    {
        header('Location: login_form.php'); 
        exit;
    }else {
        echo "Error Registrition";
        exit;
    }
}
else echo "be";

