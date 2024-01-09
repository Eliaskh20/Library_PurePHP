
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="body">
  <center>
    <p class="up"> Sign In </p>
    <div class="box">
      <form action="signin.php" method="POST">
        <div class="in-box">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <br>
            
            <input type="text" id="email" name="email" placeholder="email" required>
            <br>
            
            <input type="text" id="phone" name="phone" placeholder="phone" required>
            <br>
            
            <input type="password" id="password" name="password" placeholder="password" required>
        </div>
            <br>
            <input type="submit" value="Register" name="Register" class="log-btn ">
      </form>
    
    </div>
    
  </center>
</body>
</html>
