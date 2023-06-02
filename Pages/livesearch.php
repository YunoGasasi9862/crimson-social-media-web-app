<?php
include_once "../Classes/user.php";
include_once "../Classes/friends.php";
include_once "../Classes/notification.php";
if(session_id() == ''){ session_start();}


if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["type"])){
    if($_POST["type"]==="add"){
        Notifications::setNotifications($_POST["username"],"add");
        Friends::addFriend($_POST["username"]);
    }elseif($_POST["type"]==="remove"){
        Friends::removeFriend($_POST["username"]);
    }
}


if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["input"])){
    //add or remove friend with ajax
    $input = $_POST["input"];
    $users = User::get_user_like($input);



    //check input for search

    $currentUser = $_SESSION['User']['email'];

    //getting friends of the current user
    $friends = array();
    $getfriends = Friends::getFriendMail($currentUser);
    foreach ($getfriends as $friend) {
        array_push($friends, $friend["FriendEmail"]);
    }

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
                //if the user is one of the following
                if (in_array($mail, $friends)) {
                    echo "<div class='follow-button'>
                            <button type='submit' class='btn btn-outline-primary followButton' id='followButton-$username' data-username=$username>Following</button>
                        </div>";
                }else{
                    echo "<div class='follow-button'>
                            <button type='submit' class='btn btn-outline-primary followButton' id='followButton-$username' data-username=$username>Follow</button>
                        </div>";
                }
                echo "</li>";
            }
        }
        echo "</ul>";
    }
    else {
        echo "No results found";
    }
    echo '<script>
            $(document).ready(function() {
                $(".followButton").on("click", function() {
                    var username = $(this).data("username");
                    var buttonText = $(this).text();
                    if (buttonText === "Follow") {
                        $.ajax({
                            url: "LiveSearch.php",
                            type: "POST",
                            data: {
                                type: "add",
                                username: username
                            },
                            success: function(response) {
                                $("#followButton-" + username).text("Following");
                            }
                        });
                    } else {
                        $.ajax({
                        url: "LiveSearch.php",
                        type: "POST",
                        data: {
                            type: "remove",
                            username: username
                        },
                        success: function(response) {
                            $("#followButton-" + username).text("Follow");
                        }});
                    }
                });
            });
        </script>';
}
