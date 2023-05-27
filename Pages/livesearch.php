<link rel="stylesheet" href="../css/livesearch.css">
<?php
include "../Classes/user.php";
include "../Classes/friends.php";
if(session_id() == ''){ session_start();}

$currentUser = $_SESSION['User']['email'];

$friends = array();
$getfriends = Friends::getFriendMail($currentUser);
foreach ($getfriends as $friend) {
    array_push($friends, $friend["FriendEmail"]);
}

$input = $_POST["input"];
$users = User::get_user_like($input);

if (isset($users)) {
    echo "<ul class='list-group list-group-flush result-container'>";
    foreach ($users as $user) {
        if($user["email"]!=$currentUser){
            $username = $user["username"];
            $name = $user["name"];
            $surname = $user["surname"];
            $mail = $user["email"];
            $profile = $user["profile"];
            
            echo "<li class='list-group-item result'>
            <div class='profile'><a href='../Pages/profile.php?profile=$username' >
            <img src='../PPimages/$profile'></img></a>
            </div>
            <div class='user-description'>
            <div><a href='../Pages/profile.php?profile=$username' style='text-decoration: none; color:inherit'>{$username}</a> </div>
            <div id='description'><a href='../Pages/profile.php?profile=$username' style='text-decoration: none; color:inherit'>$name $surname</a></div>
            </div>";
            if (in_array($mail, $friends)) {
                echo "<div class='follow-button'><button type='button' class='btn btn-outline-primary'>Following</button></div>";
            } else {
                echo "<div class='follow-button'><button type='button' class='btn btn-outline-primary'>Follow</button></div>";
            }
            echo "</li>";
        }   
    }
    echo "</ul>";
} else {
    echo "No ";
}
?>