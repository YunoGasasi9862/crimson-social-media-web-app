<?php 

$notifications = Notifications::getNotifications($_SESSION['User']['email']); 

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

?>
<nav>
    <button type="submit" id="camera" style="border: none; background: none; padding: 0;">
        <div class="nav-item">
            <a href="./AddPost.php"><img src="../img/camara-icon-21.png" alt="" id="camera"></a>
        </div>
    </button>

    <div class="notDiv"><button type="submit" style="border: none; background: none; padding: 0;">
            <div class="nav-item">
                <img src="../img/notification.png" id="notItem" alt="">
            </div>
        </button>
        <div class="notNumber"><?=sizeof($notifications)?></div>
    </div>

    <div class="friendDiv"><button type="submit" style="border: none; background: none; padding: 0;">
        <div class="nav-item">
            <img src="../img/friend.png" id="friendItem" alt="">
        </div>
    </button>
    </div>

    <button type="submit" id="search" style="border: none; background: none; padding: 0;">
        <div class="nav-item">
            <a href="./SearchBar.php"><img src="../img/search.png" alt="" id="search"></a>
        </div>
    </button>
</nav>

<div class="notftable" id="notftable">
    <h4>Notifications</h4>
    <ul>
        <?php
        foreach ($notifications as $notificaiton) {
            $from = $notificaiton["fromUserEmail"];
            $fromUser = User::get_user_by_email($from);
            $to = $notificaiton["toUserEmail"];
            $toUser = User::get_user_by_email($to);
            $content = $notificaiton["content"];
            if($content){
        ?>
              <li class='profDiv' id="not-<?=$from?>">
                  <div style="margin-right: 5px;"><img src="../PPimages/<?= $fromUser["profile"]; ?>" class='profileImage'></img></div>
                  <div class='user-description'>
                      <a href='../Pages/profile.php?profile=<?= $fromUser["username"] ?>' style='text-decoration: none; color:inherit'><?= $fromUser["name"] . " " . $fromUser["surname"] ?></a><br>
                      <a href='../Pages/profile.php?profile=<?= $fromUser["username"] ?>' style='text-decoration: none; color:inherit'><?= $fromUser["username"] ?></a><br>
                  </div>
                  <div style="margin-left: auto;">
                      <button onclick="acceptFriend('<?=$from?>')" class="accept-button">Accept</button>
                      <button class="decline-button">Decline</button>
                  </div>
              </li>
        <?php
            }else{
        ?>
        <li class='profDiv' id="not-<?=$from?>">
        <div style="margin-right: 5px;"><img src="../PPimages/<?= $fromUser["profile"]; ?>" class='profileImage'></img></div>
        <div class='user-description'>
            <a href='../Pages/profile.php?profile=<?= $fromUser["username"] ?>' style='text-decoration: none; color:inherit'><?= $fromUser["name"] . " " . $fromUser["surname"] ?></a><br>
            <a href='../Pages/profile.php?profile=<?= $fromUser["username"] ?>' style='text-decoration: none; color:inherit'><?= $fromUser["username"] ?></a><br>
        </div>
        <div style="margin-left: auto;">
            <p><b style="color:crimson">removed from friends</b></p>
        </div>
        </li>
        <?php
         }
        }
        ?>
    </ul>
</div>

<div class="friendstable" id="friendstable">
    <h4>Friends</h4>
    <ul>
        <?php
        foreach ($usersToShow as $userToShow) {
        $username = $userToShow['username'];
        $name = $userToShow['name'];
        $surname = $userToShow['surname'];
        $picture = $userToShow["profile"] ? $userToShow["profile"] : "../img/avatar-1.webp";
        $email = $userToShow['email'];
        ?>
        <li class='profDiv' id="fri-<?=$email?>">
        <div style="margin-right: 5px;" ><img src="../PPimages/<?=$picture?>" class='profileImage'></img></div>
        <div class='user-description'>
            <a href='../Pages/profile.php?profile=<?= $username ?>' style='text-decoration: none; color:inherit'><?= $name . " " . $surname ?></a><br>
            <a href='../Pages/profile.php?profile=<?= $username ?>' style='text-decoration: none; color:inherit'><?= $username ?></a><br>
        </div>
        <div style="margin-left: auto;">
            <button onclick="removeFriend('<?=$email?>')" class="accept-button <?=$email?>">Remove</button>
        </div>
        </li>
    <?php
    }
    ?>
    </ul>
</div>

<script>
    $('#notItem').click(function() {
      $(".notftable").toggleClass('show-notftable');
      if ($(".notftable").hasClass('show-notftable')) $(".notftable").css("display", "flow-root");
      else $(".notftable").css("display", "none");
    });

    $('#friendItem').click(function() {
    $(".friendstable").toggleClass('show-friendstable');
    if ($(".friendstable").hasClass('show-friendstable')) $(".friendstable").css("display", "flow-root");
    else $(".friendstable").css("display", "none");
    });

    function removeFriend(friendEmail) {
      let userEmail = localStorage.getItem("userEmail");
      $.ajax({
        type: "DELETE",
        url: "../Api/RemoveFriend-api.php",
        data: JSON.stringify({
          "userEmail": userEmail,
           "friendEmail": friendEmail
        }),
        contentType: "application/json",
        success: function(data) {
          if (!data?.error) {
            document.getElementById("fri"+friendEmail).remove();
          }
        },
        error: function(response) {
          alert("Error connecting to the server.");
        }
      })
    }

  

    function acceptFriend(from) {
      let usermail = localStorage.getItem("userEmail");
      $.ajax({
        type: "POST",
        url: "../Api/AcceptFriend-api.php",
        data: JSON.stringify({from, usermail}),
        contentType: "application/json",
        success: function(data) {     
            user="not-"+from;
            document.getElementById(user).remove();
        },
        error: function(response) {
          console.log(response);
        }
      })
    }




</script>