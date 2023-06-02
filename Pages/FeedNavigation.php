<?php $notifications = Notifications::getNotifications($_SESSION['User']['email']); ?>

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

    <button type="submit" class="frbutton" id="friendItem" onclick="togglefriendstable()" style="border: none; background: none; padding: 0;">
        <div class="nav-item">
            <a></a><img src="../img/friend.png" id="friend" alt="">
        </div>
    </button>

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
        ?>
            <li class='profDiv'>
                <div style="margin-right: 5px;"><img src="../PPimages/<?= $fromUser["profile"]; ?>" class='profileImage'></img></div>
                <div class='user-description'>
                    <a href='../Pages/profile.php?profile=<?= $fromUser["username"] ?>' style='text-decoration: none; color:inherit'><?= $fromUser["name"] . " " . $fromUser["surname"] ?></a><br>
                    <a href='../Pages/profile.php?profile=<?= $fromUser["username"] ?>' style='text-decoration: none; color:inherit'><?= $fromUser["username"] ?></a><br>
                </div>
                <div style="margin-left: auto;">
                    <button class="accept-button">Accept</button>
                    <button class="accept-button">Decline</button>
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
</script>