<?php
require_once "../scripts/config.php";

try {
    $db = new PDO($dsn, $user, $pass) ;
 } catch(PDOException $e) {
   echo json_encode(["error" => "API Server is down due to DB Connection"]); //gives json encoded error
   exit ;
 }

function getLikes()
{

}