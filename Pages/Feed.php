<?php
    session_start();
    $user=$_SESSION['User']['username'];
    $email=$_SESSION['User']['email'];
  
    include "../Classes/post.php";
    include "../Classes/user.php";
    include "../Classes/friends.php";

    //collect posts
   // 
    $posts=Friends::getFriends($email); //returns all the friends 
    $list=Friends::fetchUsernames($posts); //returns all the emails of the friends
    
     
    //now we need their usernames

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
          <a href="./AddPost.php"><img src="../img/camara-icon-21.png" alt="" id="camera" ></a>
        </div>
        <div class="nav-item">
          <img src="../img/search.png" alt="" id="search">
        </div>
      </nav>

      <?php
      if($posts){
        foreach($list as $perUser)
        {
          $posts= Post::get_posts($perUser);
          foreach($posts as $row){
            $row_user=User::get_user($row["username"]);
            include "../HTML/post.php";
          }
        }
        
      }
      ?>
      
    </div>
  </div>
</body>

</html>