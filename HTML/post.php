<div class="card">

    <div class="profile">
        <img src="./../img//avatar-1.webp" id="profimg">
        <p><?=$row_user["name"] . " ". $row_user["surname"]?></p>
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
        <p class="card-text">
            <?php
                echo $row["post"]; 
            ?>
        </p>
    </div>
</div>