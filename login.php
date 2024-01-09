<?php
// require_once 'User.php';
include "user.php";
require_once "conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['Manager'])){
    if ($_POST['Manager'] >0){
      echo "yes";
      $user = User2::loginM($username, $password);   
      if ($user) {      
        echo "Login successful!";
        if(isset($_POST['remember_me'])){
          setcookie('username',$_POST['username'],time()+600 );
          setcookie('password',$_POST['password'],time()+600 );
        }
        header('Location: show_booksM.php'); 
      } else {
        echo "Invalid username or password.";
      }
    }
}
else { echo "no";
    $user = User2::login($username, $password);   
    if ($user) {
        if(isset($_POST['remember_me'])){
          setcookie('username',$_POST['username'],time()+60 );
          setcookie('password',$_POST['password'],time()+60 );
        }
        header('Location: show_books.php'); 
    } else {
      echo "Invalid username or password.";
    }
}
}
?>
