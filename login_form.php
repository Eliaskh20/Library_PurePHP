<?php

 if(isset($_COOKIE['password']) && isset($_COOKIE['username'])){
    $id = $_COOKIE['username'];
    $pass = $_COOKIE['password'];
 }else{
    $id = "";
    $pass = "";
 }
 
?>

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
        <p class="up">Log In </p>
        <div class="boxL">
            <form action="login.php" method="post">
                <div class="in-box">
                    <input type="text" placeholder="Username" id="username" name="username" value="<?php  echo $id  ?>" required>
                    <br><br>
                    <input type="password" placeholder="Password" id="password" name="password" value="<?php  echo $pass  ?>" required>
                </div>
                <br><br>
                <div class="Sw">
                    <h7>Manager</h7>
                    <label class="switch">
                        <input type="checkbox"  name="Manager">
                        <span class="slider round"></span>
                    </label>
                    <h7>Remember Me</h7>
                    <label class="switch">
                        <input type="checkbox" id="checkbox" name="remember_me">
                        <span class="slider round"></span>
                    </label>
                    <br>
                </div>
                <br><br>
                <input type="submit" value="Login"  class="log-btn ">
            </form>

        </div>
    </center>
</body>
</html>