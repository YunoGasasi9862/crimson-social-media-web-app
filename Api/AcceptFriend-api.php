<?php

header("Content-Type: application/json");
require_once "../Classes/friends.php";
require_once "../Classes/user.php";
require_once "../Classes/notification.php";

$method = $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input'); //to get the payload
$input = json_decode($json); //converts into php object
$result =[];
if ($method === "POST") {
    $fromUser= User::get_user_by_email($input->from);
    $result = Friends::addFriend($fromUser["username"], $input->usermail);
    Notifications::removeNotifications($input->from, $input->usermail);
}
echo json_encode($result);