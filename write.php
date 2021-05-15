<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
 <link href="http://localhost/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="target">
  <div class="container">
   <header class="jumbotron text-center">
    <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" class="img-circle" id="logo" />
    <h1><a href="http://localhost/index.php">JavaScript</a></h1>
   </header>
  <div class="row">
    <nav class="col-md-3">
     <ol class="nav nav-pills nav-stacked">
       <?php
         while($row = mysqli_fetch_assoc($result)){
           echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
         }
       ?>
     </ol>
    </nav>
    <div class="col-md-9">
      <article>
          <form action="process.php" method="post">
            <div class="form-group">
              <label for="form-title">Title</label>
              <input type="text" class="form-control" name="title" id="form-title" placeholder="Enter title">
            </div>

            <div class="form-group">
              <label for="form-title">Author</label>
              <input type="text" class="form-control" name="author" id="form-author" placeholder="Enter author">
            </div>

            <div class="form-group">
              <label for="form-title">Body</label>
              <textarea class="form-control" rows=10 name="description" id="form-control" placeholder="Enter body"></textarea>
            </div>

            <input type="hidden" role="uploadcare-uploader" class="btn btn-default btn-lg"/>
            <input type="submit" name="name" class="btn btn-default btn-lg">
          </form>
        </article>
        <script>
          UPLOADCARE_PUBLIC_KEY = 'd023d72b0a37d3dc0020';
        </script>
        <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
        <script>
          var singleWidget=uploadcare.SingleWidget('[role=uploadcare-uploader]');
          singleWidget.onUploadComplete(function(info){
            document.getElementById('description').value=document.getElementById('description').value+'<img src="'+info.cdnUrl+'">';
          });
        </script>
      <hr>
      <div id="control">
        <div class="btn-group" role="group" aria-label="..">
          <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-default btn-lg" />
          <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-default btn-lg" />
        </div>
        <a href="http://localhost/write.php" class="btn btn-success btn-lg">write</a>
      </div>
  </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://localhost/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>
