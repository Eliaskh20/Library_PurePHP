<?php
//namespace Blog;

require_once "conn.php";


class User2 {
  private $Name;
  private $Email;
  private $Phone;
  private $password;
    
  public function __construct($Name,$Email,$Phone,$password) {
        
    $this->Name = $Name;
    $this->Email = $Email;
    $this->Phone = $Phone;
    $this->password = $password;
 
}
  
    
public function register() {
  $db = DBL4::getInstance(); 
  $connection = $db->getConnection();   
  $query = "INSERT INTO users (Name,Email,Phone, password) VALUES ('$this->Name','$this->Email','$this->Phone','$this->password')";  
  $stmt = mysqli_query($connection,$query);
  if ($stmt) {
      return true;
  }else return false;
}


public static function login($Name, $password) {
  $db = DBL4::getInstance();
  $connection = $db->getConnection();
  $query = "SELECT * FROM users WHERE Name = '$Name' AND password ='$password'";    
  $stmt = mysqli_query($connection,$query);
  $user = mysqli_fetch_assoc($stmt);

  if ($user) {
    session_start();
    $_SESSION['user_id'] = $user['ID'];
    $_SESSION['Name'] = $user['Name'];
    return true;
  } else {
    return false;
  }
}

public static function loginM($Name, $password) {
  $db = DBL4::getInstance();
  $connection = $db->getConnection();
  $query = "SELECT * FROM managers WHERE Name = '$Name' AND password ='$password'";    
  $stmt = mysqli_query($connection,$query);
  $user = mysqli_fetch_assoc($stmt);
  if ($user) {
    session_start();
    $_SESSION['user_id'] = $user['ID'];
    $_SESSION['Name'] = $user['Name'];
    return true;
  } else {
    return false;
  }
}

public static function chooseAd () {
  $db = DBL4::getInstance();
  $connection = $db->getConnection();
  $query = "SELECT * FROM users ";    
  $stmt = mysqli_query($connection,$query);
  $user = mysqli_fetch_all($stmt,MYSQLI_ASSOC );
  return $user;

  
}

public static function addmanager ($ID) {
  $db = DBL4::getInstance();
  $connection = $db->getConnection();

  $AUser = "SELECT `Name`, `Email`, `Phone`, `password` FROM `users` WHERE ID = '$ID' ";
  $stmt1 = mysqli_query($connection,$AUser);
  $user1 = mysqli_fetch_all($stmt1,MYSQLI_ASSOC);

      if($user1){
              $Name = $user1[0]['Name'];
              $password = $user1[0]['password'];
              $Phone = $user1[0]['Phone'];
              $Email = $user1[0]['Email'];

              $query = "INSERT INTO `managers`( `Name`, `Email`, `phone`, `password`) VALUES ('$Name','$Email','$Phone','$password')"; 
              
              $stmt = mysqli_query($connection,$query);
              print_r ($stmt);

              if ($stmt) {
                  return true;
              } else {
                return false;
              }
}
else {
  return false;
}
  
}

public static function deluser ($ID) {
  $db = DBL4::getInstance();
  $connection = $db->getConnection();
  $query = "DELETE from users WHERE ID ='$ID'  "; 
  $stmt = mysqli_query($connection,$query);
  if($stmt>0){
      return 1;
    } else {
      return 0;
    }

  
}



public static function logout() {
session_start();
session_destroy();
}
}



