<?php

header("Content-Type: application/json");
require "../DB/db.php";

$method= $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input'); //to get the payload
$input= json_decode($json); //converts into object

if($method=== "GET")
{
    $result = getLikes();
}



echo json_encode($out); //create json encoding