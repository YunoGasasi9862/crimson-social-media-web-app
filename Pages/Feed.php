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
  <link rel="stylesheet" href="../css/extracss.css">

<script>
  localStorage.setItem("username", '<?php echo $_SESSION['User']['username'] ?>'); //setting the username into localstorage

  function toggleNotftable() {
    var notftable = document.querySelector(".notftable");
    notftable.classList.toggle("show");
  }

  
  function togglefriendstable() {
    var friendstable = document.querySelector(".friendstable");
    friendstable.classList.toggle("show");
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
      <div class="friendstable">
        
        
      <button class="frbutton" onclick="togglefriendstable()" style="border:none">
        <img src="../img/friend.png" id="friend" alt="">
      </button>
      <div class="frmain" id="frmain">
        <ul>
          <br><h4>Friends</h4>
          <li><img src="../img/avatar-1.webp" id="frpic1" alt=""><div class="frsquare"><a href="#">DEfne ersungur bilmemne </a><button class="remove-button">Remove</button></div> <h1></h1></li>
          <li><img src="../img/avatar-1.webp" id="frpic1"alt=""><div class="frsquare"><a href="#">Subsdd iiii </a><button class="remove-button">Remove</button></div> <h1></h1></li>
          <li><img src="../img/avatar-1.webp" id="frpic1"alt=""><div class="frsquare"><a href="#">Subsdddd iiii </a><button class="remove-button">Remove</button></div></li>
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