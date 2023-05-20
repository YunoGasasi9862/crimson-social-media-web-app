<?php
    session_start();
    include "src/post.php";
    include "src/login.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/mainpage.css">
</head>

<body>
  <div class="h-100 gradient-custom-2 ">
    <div class="main">

      <nav>
        <div class="nav-item">
          <a href="./post.php"><img src="../img/camara-icon-21.png" alt="" id="camera" ></a>
        </div>
        <div class="nav-item">
          <img src="../img/search.png" alt="" id="search">
        </div>
      </nav>

      <div class="card">

        <div class="profile">
          <img src="./../img//avatar-1.webp" id="profimg">
          <p>Avatar Surname</p>
        </div>

        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="../img/111.webp" class="img-fluid post" />
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div>

        <div class="card-body">
          <div class="reaction">
            <img src="../img/likebutn.png" alt="" id="like"><span id="like_number">4</span> 
            <img src="../img/comment.png" alt="" id="comment"><span id="comment_number">4</span> 
          </div>
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

    </div>
  </div>
</body>

</html>