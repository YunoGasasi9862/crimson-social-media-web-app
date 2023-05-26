<?php

session_start();

//$user=$_SESSION['User']['username'];
//$email=$_SESSION['User']['email'];
$user = $_SESSION['User']['username'];
$email = $_SESSION['User']['email'];
include "../Classes/post.php";
include "../Classes/user.php";
include "../Classes/friends.php";

//collect posts
// 
$friends = Friends::getFriends($email); //returns all the friends
$usernames = Friends::fetchUsernames($friends); //returns all the emails of the friends

if (!empty($_POST)) {
  extract($_POST);
  $exist = true;
  if (isset($searchuser)) {

    if (user::findUserfromName($searchuser)) {
      $searchuser = user::findUserfromName($searchuser);

    } else if (user::findUserfromSurname($searchuser)) {
      $searchuser = user::findUserfromSurname($searchuser);

    } else if (user::findUserfromEmail($searchuser)) {
      $searchuser = user::findUserfromEmail($searchuser);

    } else {
      $exist = false;
    }

    //first check whether the user exists or not
    if ($exist) {
      header("Location: ShowPerson.php?searchuser=$searchuser");
      exit;
    }

  }
}

//now we need their usernames

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
  <script>
    function navigateToNextPage() {
      const currentURL = window.location.href;
      const url = new URL(currentURL);
      let currentPage = parseInt(url.searchParams.get("page")) || 1;
      const nextPage = currentPage + 1;
      url.searchParams.set("page", nextPage);
      window.location.href = url.toString();
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/mainpage.css">

  <style>
    #inp {
      width: 300px;
      height: 40px;
      border-radius: 20px;
      border: white;
      padding: 10px;

      color: grey;
      box-shadow: 0 0 10px #6c00ff;
    }

    #btn {
      margin-left: 30px;
    }

    #inp:focus {
      outline: none;
      background-color: white;
      color: black;
    }

    #btn:hover {
      transform: scale(1.1);

    }

    #camera:hover {

      transform: scale(1.1);

    }

    .neon-button {
      background-color: #6c00ff;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      box-shadow: 0px 0px 10px #37268E;
      margin-left: 610px;
    }

    .neon-button:hover {
      background: linear-gradient(135deg, #ff00ff, #6c00ff);
      color: white;
      box-shadow: 0px 0px 15px #5B3DA8;
    }

    .neon-button:active {
      background-color: #37268E;
      box-shadow: none;
    }

    .Align {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
  </style>


</head>

<body>
  <div class="h-100 gradient-custom-2 ">
    <div class="main">

      <nav>
        <button type="submit" id="camera" style="border: none; background: none; padding: 0;">
          <div class="nav-item">
            <a href="./AddPost.php"><img src="../img/camara-icon-21.png" alt="" id="camera">
          </div></a>

        </button>

        <form action="" method="post">
          <div class="Align">
            <input type="text" name="searchuser" id="inp" placeholder="Search...">
            <button id="btn" style="border: none; background: none; padding: 0;">
              <div class="nav-item"><img src="../img/search.png" alt="" id="search"></div>
            </button>
            <div>
        </form>
      </nav>

      <?php
      const PAGE_SIZE = 10;
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      if ($usernames) {
        $posts = array();
        foreach ($usernames as $username) {
          array_push($posts, ...Post::get_posts($username));
        }
        $numOfPosts = count($posts);
        $totalPages = ceil($numOfPosts / PAGE_SIZE);
        $requestedPage = $page > $totalPages || $page < 1 ? 1 : $page;
        // $start = ($page - 1) * PAGE_SIZE;
        // $end = min($start + PAGE_SIZE, $count);
        $paginatedPosts = array_slice($posts, ($requestedPage - 1) * PAGE_SIZE, PAGE_SIZE);
        foreach ($paginatedPosts as $row) {
          $row_user = User::get_user($row["username"]);
          include "../HTML/post.php";
        }
      }
      ?>

      <button class="neon-button" onclick="navigateToNextPage()">Next</button>
    </div>
  </div>
</body>

</html>