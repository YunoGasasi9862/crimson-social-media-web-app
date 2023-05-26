<?php
const DSN = "mysql:host=localhost;port=3306;dbname=crimson;charset=utf8mb4" ;
const USER="root";
const PASS=""; 

class User {
    public static function get_user($username){
        $db=new PDO(DSN, USER, PASS);
        $query= "SELECT * FROM users where username=?"; 
        $record= $db->prepare($query);
        $record->execute([$username]);  
        return $record->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_user_like($input){
        $db=new PDO(DSN, USER, PASS);
        $query = "SELECT * FROM users WHERE username LIKE ? OR name LIKE ? OR surname LIKE ?";
        $record = $db->prepare($query);
        $record->execute([$input . '%',$input . '%',$input . '%']);
        return $record->fetchAll(PDO::FETCH_ASSOC);


    }
    
    

}


?>