<?php

require "Pages/PictureUpload.php";  //including the picture upload class
const DSN = "mysql:host=localhost;port=3306;dbname=crimson;charset=utf8mb4" ;
const USER="root";
const PASS="";

//creating connection
$db=new PDO(DSN, USER, PASS);
$records=$db->prepare("SELECT * FROM users");
$users=$records->execute();
$users=$records->fetchAll(PDO::FETCH_ASSOC);


function AuthenticateUser($email, $password)
{
    global $db;
    $records=$db->prepare("SELECT * FROM users WHERE email = ?");
    $records->execute([$email]);
    if($records->rowCount())  //has a record with that name
    {
        $user=$records->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $user['password'])) //then verifies the name
        {
            return true;
        }
    }

    return false;
}
function GetUser($email)
{
    global $db;
    $record=$db->prepare("SELECT * FROM users WHERE email= ?");
    $record->execute([$email]);
    return $record->fetch(PDO::FETCH_ASSOC);
}

function Register($email, $name, $password, $file, $DOB)
{
    global $db;
    $statement= $db->prepare("INSERT INTO users (email, name, password, profilePic, DOB) VALUES (?, ?, ?, ?, ?)");
    $filePath= new PictureUpload($file);
    $statement->execute([$email, $name, $password, $file, $DOB]);  
}

?>