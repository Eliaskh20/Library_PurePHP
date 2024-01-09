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
    <p class="up">Add Book </p> 
    <div class="boxA">
      <form action="add_books.php" method="post" enctype="multipart/form-data">
        <div class="in-boxA">
          <input type="text" id="Name" name="Name" placeholder="Name" required>
          <br>
          <input type="text" id="Writer" name="Writer" placeholder="Writer" required>
          <br>
          <input type="text" id="Year" name="Year" placeholder="Year" required>
          <br>
        </div>
        <br>
        <div>
          Choose Type 
          <select id="Type" name="Type" required>
            <option value="Scince">Scince</option>
            <option value="Gografic">Gografic</option>
            <option value="Sport">Sport</option>
          </select>
        </div>
        <br>
        <input type="file" id="file" name="file"  class="custom-file-input">
        <br>
        <input type="submit" value="Add boks" class="sh-btn">
      </form>
    </div>
  </center>
</body>
</html>
