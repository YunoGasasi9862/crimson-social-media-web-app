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
$postId=$row["postid"];



?>

<div class="card">

    <div class="profile">
        <img src=<?= isset($row_user["image"])? "/PPimages/$row_user[image]" : "../img/home.png"?> id="profimg">
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
       
    <p class="card-text">
            <?php
                echo $row["post"]; 
            ?>
        </p>
       
       
             <div class="likeclass small d-flex justify-content-start">
              <a id="<?=$postId?>" style="text-decoration:none" href="#!" class="d-flex align-items-center me-3">
                <i style="color:red" class="far fa-thumbs-up me-2"></i>
                <p style="color:purple" class="mb-0">0</p>
              </a>
              <a  style="text-decoration:none"  href="#!" class="d-flex align-items-center me-3 comment">
                <i  style="color:red" class="far fa-comment-dots me-2"></i>
                <p style="color:purple" class="mb-0">Comment</p>
              </a>
            </div>

            
            <div style="display:none" class="PostComment">
              <div style="margin-top:10px" class="form-outline w-100">
                <textarea name="comment" class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;"></textarea>  
               
              </div>
       
                <div  class="float-end mt-2 pt-1">
                    <button id="<?=$postId ?>" type="button" class="btn btn-danger btn-sm ">Post comment</button>
                    <button type="button" class="btn btn-outline-primary btn-sm cancel">Cancel</button>
                </div>

              
                <div class="commentContainer mt-5">



                </div>


                
        
            </div>
      

    </div>
</div>