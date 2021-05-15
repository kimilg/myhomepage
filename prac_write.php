<?php
  $conn = mysqli_connect('localhost','root','dlfrn30');
  mysqli_select_db($conn, 'opentutorials');
  $result=mysqli_query($conn,"SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="prac_style.css">
  <title>Practice</title>
</head>
<body id='target'>
  <header>
    <h1>JavaScript</h1>
  </header>
  <nav>
    <ul>
      <?php
        while($row=mysqli_fetch_assoc($result)){
          echo '<li><a href="http://localhost/prac_index.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
        }
      ?>
    </ul>
  </nav>
  <div id="control">
    <input type="button" value="white" onclick="document.getElementById('target').className='white'">
    <input type="button" value="black" onclick="document.getElementById('target').className='black'">
    <a href="http://localhost/prac_write.php">write</a>
  </div>
  <article>
    <form action="prac_process.php" method="post">
      <p>title : <input type="text" name="title"></p>
      <p>author : <input type="text" name="author"></p>
      <p>body : <textarea name="description"></textarea></p>
      <input type="submit">
    </form>
  </article>
</body>
</html>
