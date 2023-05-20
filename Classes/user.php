<?php
class User {
    public static function get_user($username){
        $db=new PDO(DSN, USER, PASS);
        $query= "SELECT * FROM users where username=?";

        $record= $db->prepare($query);
        $record->execute([$username]);  
        return $record->fetch(PDO::FETCH_ASSOC);
    }
}


?>