// I will continue do not change anything PLEASE!!
<link rel="stylesheet" href="../css/livesearch.css">

<?php
include "../Classes/user.php";
include "../Classes/friends.php";
session_start();
$currentUser= $_SESSION['User']['email'];
$friends= Friends::getFriends($currentUser);
var_dump($friends);


$input = $_POST["input"];
$users = User::get_user_like($input);

if (isset($users)) {
    echo "<ul class='list-group list-group-flush result-container'>";
    foreach ($users as $user) {
        $username = $user["username"];
        $name = $user["name"];
        $surname = $user["surname"];
        $mail= $user["email"];
        $profile = $user["profile"];

        echo "
                <li class='list-group-item result'>
                    <div class='profile'>
                    <img src='../PPimages/$profile'></img>
                    </div>
                    <div class='user-description'>
                        <div>{$username}</div>
                        <div id='description'>$name $surname</div>
                    </div>
                    <div class='follow-button'>
                        <button type='button' class='btn btn-outline-primary'>Follow</button>
                    </div>
                </li>
        ";
        foreach($friends as $friend){
            if($mail == $friend["FriendEmail"]){
                echo "deleley";
            }
        }
    }
    echo "</ul>";
} else {
    echo "No ";
}
?>