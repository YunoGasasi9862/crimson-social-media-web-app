<?php
const DSN = "mysql:host=localhost;port=3306;dbname=crimson;charset=utf8mb4" ;
const USER="root";
const PASS=""; 

try {
    $db = new PDO($dsn, $user, $pass) ;
 } catch(PDOException $e) {
   echo json_encode(["error" => "API Server is down due to DB Connection"]); //gives json encoded error
   exit ;
 }

function getLikes()
{

}