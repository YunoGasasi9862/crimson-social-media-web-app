<?php
if(session_id() == ''){ session_start();}

$user = $_SESSION['User']['username'];
$email = $_SESSION['User']['email'];
include "../Classes/post.php";
include "../Classes/user.php";
include "../Classes/friends.php";

//collect posts
// 
$friends = Friends::getFriends($email); //returns all the friends
$usernames = Friends::fetchUsernames($friends); //returns all the emails of the friends


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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
  <script src="../JS/post.js"></script>

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

    .button {
    background-color: transparent; /* Buton arka plan rengi */
    border: none;
    color: white; /* Buton metin rengi */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    padding: 10px 20px; /* Buton boyutu */
    position: absolute; /* Pozisyon ayarı */
    margin-left: -190px;
    margin-top: -45px;
  }

.button:hover {
  animation: shake 0.8s;
}

@keyframes shake {
  0% { transform: rotate(0deg); }
  25% { transform: rotate(15deg); }
  75% { transform: rotate(-15deg); }
  100% { transform: rotate(0deg); }
}

#notf {
  
    width: 40px;
    margin-top: 17px;
    
  }
  

.notftable {
  position: relative;

  
    z-index: 2;
  }

  

  .notftable:hover .submain,
  .notftable.show .submain {
    display: block;
  }

  .submain {
    position: absolute;
    margin-left: -170px ;
    margin-top: 25px;
    display: none;
    background-color: #f5e8ff;
    
    width:400px;
    height:400px;
    border: 2px solid #d98cff;
    border-radius: 5px;
    box-shadow: 0 0 2px #d98cff, 0 0 2px #d98cff, 0 0 3px #d98cff, 0 0 4px #d98cff, 0 0 5px #d98cff, 0 0 6px #d98cff, 0 0 7px #d98cff;

  }

  .submain ul {
    list-style: none;
    padding: 0;
  }

  .submain li {
    padding: 5px 10px;
    
  }

  

  .submain li a {
    text-decoration: none;
  color: #333;

  font-size:15px;
  position: absolute;
      left: 10px; /* Sağa hizalama miktarı */
      top: 50%; /* Dikey ortalamak için */
      transform: translateY(-50%); /* Dikey ortalamak için */
      list-style: none;
  
}

  .submain li h1 {
    border-bottom: 2px solid #d98cff;
    box-shadow:   2px #d98cff;

    padding: 3px;
    text-align: right; /* Align the text to the right */
    
    margin-right: 30px; /* Adjust the right margin */
    margin-left: 30px; /* Set the left margin to auto for center alignment */
  }
    .submain li a:hover {
    color: #9966FF;
  }
  
      .circle {
        width: 20px;
      height: 20px;
      background-color: #9966FF;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      font-size: 10px;
      margin-left: -150px;
      z-index: 9999;
      position: absolute;
      margin-top: -45px;
      margin-top: -20px;
      }

    .square {
      width: 300px;
      height: 60px;
      background-color: #f5e8ff;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      z-index: 0;
      margin-top: -47px;
      margin-left: 60px;
    }
    #pic1 {
      width: 50px;
      border: 2px dashed #d98cff; /* Çizgili kenarlık */
      border-radius: 50%; /* Yuvarlak köşeler */
      width: 50px;
      border: 2px dashed #d98cff;
      border-radius: 50%;
      position: relative;
      z-index: 1;

    }
    h4{
      padding-left: 20px;
      text-decoration-line:underline;
      color:#9966FF;
    }
  
  </style>


<script>
  function toggleNotftable() {
    var notftable = document.querySelector(".notftable");
    notftable.classList.toggle("show");
  }
</script>

</head>

<body>
  <div class="h-100 gradient-custom-2 ">
    <div class="main">

      <nav>
        <button type="submit" id="camera" style="border: none; background: none; padding: 0;">
          <div class="nav-item">
            <a href="./AddPost.php"><img src="../img/camara-icon-21.png" alt="" id="camera"></a>
          </div>

        </button>

              <div class="notftable">
              
                <div class="circle">3</div>
        <button class="button" onclick="toggleNotftable()">

          <img src="../img/notification.png" id="notf" alt="">
        </button>
      
        <div class="submain" id="submain">
          <ul>
            <br><h4>Notifications</h4>
            <li><img src="../img/avatar-1.webp" id="pic1" alt=""><div class="square"><a href="#">Subsddddddddddddddddddddddddddd dddddddddd dddddddddddmenu wtrtÖğesi iiii </a></div><p></p> <h1></h1></li>
            <li><img src="../img/avatar-1.webp" id="pic1"alt=""><div class="square"><a href="#">Subsddddddddddddddddddddddddddd dddddddddd dddddddddddmenu wtrtÖğesi iiii </a></div> <h1></h1></li>
            <li><img src="../img/avatar-1.webp" id="pic1"alt=""><div class="square"><a href="#">Subsddddddddddddddddddddddddddd dddddddddd dddddddddddmenu wtrtÖğesi iiii </a></div></li>
          </ul>
          
        </div>
      
      </div>


        <div class="nav-item">
          <a href="./SearchBar.php"><img src="../img/search.png" alt="" id="search"></a>
        </div>
      </nav>




      <?php
      const PAGE_SIZE = 10;
      $countTest=0;
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
          $countTest++;
          include "../HTML/post.php";
        }
      }
         if($countTest!=0) //checks if there are any posts to show: If so, then shows the next button
         {
          echo "<button class='neon-button' onclick='navigateToNextPage()'>Next</button>";
         }
      ?>
      
    </div>
  </div>

</body>

</html>