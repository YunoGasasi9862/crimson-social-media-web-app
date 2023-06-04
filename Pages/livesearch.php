<?php
include_once "../Classes/user.php";
include_once "../Classes/friends.php";
include_once "../Classes/notification.php";
if (session_id() == '') {
    session_start();
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["type"])){
    $pemail= USER::get_user($_POST["username"])["email"];
    if($_POST["type"]==="add"){
        Notifications::setNotifications($_POST["username"],true);
        Friends::addFriend($_POST["username"]);
    }
    elseif($_POST["type"]==="remove"){
        Notifications::setNotifications($_POST["username"],false);
        Friends::removeFriend($_POST["username"]);
    }
    elseif($_POST["type"]==="decline"){
        Notifications::removeNotifications($pemail);
        Friends::removeFriend($_POST["username"]);
    }
    elseif($_POST["type"]==="accept"){
        Notifications::removeNotifications($pemail);
        Friends::addFriend($_POST["username"]);
    }
    elseif($_POST["type"]==="unrequest"){
        Notifications::removeNotifications($pemail);
        Friends::removeFriend($_POST["username"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["input"])) {
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
            if ($user["email"] != $currentUser) {
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
                    //if they both follow each other
                    if (Friends::isFriend($mail)) {
                        echo "<div class='follow-button'>
                            <button type='submit' class='btn btn-outline-primary followButton' id='followButton-$username' data-username=$username>Remove</button>
                        </div>";
                    }
                    //if only request is sent
                    else {
                        echo "<div class='follow-button'>
                                <button type='submit' class='btn btn-outline-primary followButton' id='followButton-$username' data-username=$username>Requested</button>
                            </div>";
                    }
                } else {
                    //request is sent from friend
                    if (Friends::isFriend($mail)) {

                        echo "<div class='follow-button'>
                            <button type='submit' class='btn btn-outline-primary followButton' id='followButton-$username-accept' data-username=$username>Accept</button>
                            <button type='submit' class='btn btn-outline-primary followButton' id='followButton-$username' data-username=$username>Decline</button>
                        </div>";
                    }
                    //no relation
                    else {
                        echo "<div class='follow-button'>
                                <button type='submit' class='btn btn-outline-primary followButton' id='followButton-$username' data-username=$username>Add Friend</button>
                            </div>";
                    }
                }
                echo "</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "No results found";
    }
    echo '<script>
            $(document).ready(function() {
                $(".followButton").on("click", function() {
                    var username = $(this).data("username");
                    var buttonText = $(this).text();
                    if (buttonText === "Add Friend") {
                        $.ajax({
                            url: "LiveSearch.php",
                            type: "POST",
                            data: {
                                type: "add",
                                username: username
                            },
                            success: function(response) {
                                $("#followButton-" + username).text("Requested");
                            }
                        });
                    } else if(buttonText === "Remove"){
                        $.ajax({
                            url: "LiveSearch.php",
                            type: "POST",
                            data: {
                                type: "remove",
                                username: username
                            },
                            success: function(response) {
                                $("#followButton-" + username).text("Add Friend");
                                
                            }
                        });
                    } else if(buttonText === "Decline"){
                        $.ajax({
                            url: "LiveSearch.php",
                            type: "POST",
                            data: {
                                type: "decline",
                                username: username
                            },
                            success: function(response) {
                                $("#followButton-" + username + "-accept").css("display","none");
                                $("#followButton-" + username).text("Add Friend");
                            }
                        });
                    } else if(buttonText === "Accept"){
                        $.ajax({
                            url: "LiveSearch.php",
                            type: "POST",
                            data: {
                                type: "accept",
                                username: username
                            },
                            success: function(response) {
                                $("#followButton-" + username + "-accept").css("display","none");
                                $("#followButton-" + username).text("Remove");
                            }
                        });
                    }
                    else {
                        $.ajax({
                        url: "LiveSearch.php",
                        type: "POST",
                        data: {
                            type: "unrequest",
                            username: username
                        },
                        success: function(response) {
                            $("#followButton-" + username).text("Add Friend");
                        }});
                    }
                });
            });
          </script>';
}
