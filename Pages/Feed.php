<?php
if (session_id() == '') {
  session_start();
}

$user = $_SESSION['User'];
include "../Classes/post.php";
include "../Classes/user.php";
include "../Classes/notification.php";
include "../Classes/friends.php";

function filterCurrent($username)
{
  global $user;
  return $username !== $user;
}

$friends = Friends::getFriends($email); //returns all the friends
$usernames = Friends::fetchUsernames($friends); //returns all the emails of the friends
$usernames = array_filter($usernames, "filterCurrent");
$friendsUsers = array();
foreach ($friends as $friend) {
  array_push($friendsUsers, User::get_user_by_email($friend["FriendEmail"]));
}
$usersToShow = array();
foreach ($friendsUsers as $friend) {
  if ($friend) {
    $usersToShow[] = $friend;
  }
}

$notifications = Notifications::getNotifications($email);
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

</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" style="margin-left:10px;" href="#">Crimson</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                  <li class="nav-item active">
                      <a class="nav-link" href="Feed.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="profile.php">Profile</a>
                  </li>
                  </ul>
              </div>
              </nav>
  <div class="h-100 gradient-custom-2 ">
    <div class="main">
      <?php include "FeedNavigation.php" ?>
      <div class="friendstable">
        <div class="frmain" id="frmain">
          <ul>
            <br>
            <h4>Friends</h4>
            <div>
              <?php
              foreach ($usersToShow as $userToShow) {
                $username = $userToShow['username'];
                $name = $userToShow['name'];
                $surname = $userToShow['surname'];
                $picture = $userToShow["profile"] ? $userToShow["profile"] : "../img/avatar-1.webp";
                $email = $userToShow['email'];
                echo "
                <li id=$email>
                  <img src=\"$picture\" id=\"frpic1\" alt=\"\">
                    <div class=\"frsquare\">
                    <a href=\"#\">$name $surname</a>
                    <button onclick=\"removeFriend('$email')\" class=\"remove-button\">Remove</button>
                </li>
              ";
              }
              ?>
            </div>
          </ul>
        </div>
      </div>

      <?php
      const PAGE_SIZE = 10;
      $countTest = 0;
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
      if ($countTest != 0) //checks if there are any posts to show: If so, then shows the next button
      {
        echo "<button class='neon-button' onclick='navigateToNextPage()'>Next</button>";
      }
      ?>


    </div>

  </div>
  <script>
    localStorage.setItem("username",
      '<?php echo $_SESSION['User']['username'] ?>'); //setting the username into localstorage
    localStorage.setItem("userEmail",
      '<?php echo $_SESSION['User']['email'] ?>');
    
    function togglefriendstable() {
      var friendstable = document.querySelector(".friendstable");
      friendstable.classList.toggle("show");
    }

    function removeFriend(friendEmail) {
      let userEmail = localStorage.getItem("userEmail");
      $.ajax({
        type: "DELETE",
        url: "../Api/RemoveFriend-api.php",
        data: JSON.stringify({
          userEmail,
          friendEmail
        }),
        contentType: "application/json",
        success: function(data) {
          if (!data?.error) {
            document.getElementById(friendEmail).remove()
          }
        },
        error: function(response) {
          alert("Error connecting to the server.");
        }
      })
    }
  </script>
</body>

</html>