<?php

header("Content-Type: application/json");
require "../DB/db.php";

$method = $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input'); //to get the payload
$input = json_decode($json); //converts into php object



if ($method === "DELETE") {
  $result = removeFriend($input->userEmail, $input->friendEmail);
}

echo json_encode($result); //create json encoding