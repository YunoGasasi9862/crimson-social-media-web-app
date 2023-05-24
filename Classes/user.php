<?php
class User {
    public static function get_user($username){
        $db=new PDO(DSN, USER, PASS);
        $query= "SELECT * FROM users where username=?"; 
        $record= $db->prepare($query);
        $record->execute([$username]);  
        return $record->fetch(PDO::FETCH_ASSOC);
    }

    public static function findUserfromName($name)
    {
        $db=new PDO(DSN, USER, PASS);
        $query= "SELECT * FROM users where name=?"; 
        $record= $db->prepare($query);
        $record->execute([$name]);  
        return $record->fetch(PDO::FETCH_ASSOC);
    }

    
    public static function findUserfromSurname($surname)
    {
        $db=new PDO(DSN, USER, PASS);
        $query= "SELECT * FROM users where surname=?"; 
        $record= $db->prepare($query);
        $record->execute([$name]);  
        return $record->fetch(PDO::FETCH_ASSOC);
    }

    public static function findUserfromEmail($email)
    {
        $db=new PDO(DSN, USER, PASS);
        $query= "SELECT * FROM users where email=?"; 
        $record= $db->prepare($query);
        $record->execute([$name]);  
        return $record->fetch(PDO::FETCH_ASSOC);
    }
}


?>