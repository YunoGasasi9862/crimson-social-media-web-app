<?php

const DSN = "mysql:host=localhost;port=3306;dbname=crimson;charset=utf8mb4" ;
const USER="root";
const PASS="";

//creating connection
$db=new PDO(DSN, USER, PASS);
$records=$db->prepare("SELECT * FROM users");
$users=$records->execute();
$users=$records->fetchAll(PDO::FETCH_ASSOC);

var_dump($users);


?>