<?php
date_default_timezone_set("Europe/Istanbul");
$date=new DateTime($row["date"]);
$currentDate= new DateTime();
$interval = $currentDate->diff($date);

$years = $interval->format('%y');
$months = $interval->format('%m');
$days = $interval->format('%d');
$hours = $interval->format('%h');
$minutes = $interval->format('%i');
$seconds = $interval->format('%s');
?>
<div class="card">

    <div class="profile">
        <img src="./../img//avatar-1.webp" id="profimg">
         <p><?=$row_user["name"] . " ". $row_user["surname"]?></p>
        <div class="date"><p class="card-text">
        <?php
            if ($years > 0) {
            echo $years . " year" . ($years > 1 ? "s" : "") . " ago";
            } elseif ($months > 0) {
            echo $months . " month" . ($months > 1 ? "s" : "") . " ago";
            } elseif ($days > 0) {
            echo $days . " day" . ($days > 1 ? "s" : "") . " ago";
            } elseif ($hours > 0) {
            echo $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
            } elseif ($minutes > 0) {
            echo $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
            } else {
            echo $seconds . " second" . ($seconds > 1 ? "s" : "") . " ago";
            }
        ?>    
        </p></div>
    </div>

    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
        <img src="../PostImages/<?=$row["image"]?>" class="img-fluid post" />
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
        <p class="card-text">
            <?php
                echo $row["post"]; 
            ?>
        </p>
        
    </div>
</div>