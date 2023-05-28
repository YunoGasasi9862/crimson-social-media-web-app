<?php

header("Content-Type: application/json");
require "../DB/db.php";

$method= $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input'); //to get the payload
$input= json_decode($json); //converts into php object

if($method=== "GET")
{
    $result = getLikes();
}

if($method=== "PUT")
{
    $result= updateLikes($input->postId, $input->newLikes);
}

if($method === "POST")
{
    $result= insertLikesIntoULikesTable($input->username, $input->postId, $input->YesNo);
}

if($method === "REMOVE")
{
    $result = removeLikes($input->postId, $input->username, $input->newLikes);
}


echo json_encode($result); //create json encoding