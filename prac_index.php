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
    <?php
      if(!empty($_GET['id'])){
        $sql="SELECT topic.id, title, name, description FROM topic LEFT JOIN user ON topic.author=user.id WHERE topic.id=".$_GET['id'];
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        echo '<h2>'.$row['title'].'</h2>';
        echo '<p>'.$row['name'].'</p>';
        echo $row['description'];
      }
    ?>
  </article>
</body>
</html>
