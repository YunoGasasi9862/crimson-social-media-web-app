<?php
require_once "../scripts/config.php";
require_once "sanitize.php";

class User
{
    public static function get_user($username)
    {
        $db = new PDO(DSN, USER, PASS);
        $username=Sanitize::sqlSanitize($username);
        $query = "SELECT * FROM users where username=?";
        $record = $db->prepare($query);
        $record->execute([$username]);
        return $record->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_user_by_email($email)
    {
        $db = new PDO(DSN, USER, PASS);
        $email=Sanitize::sqlSanitize($email);
        $query = "SELECT * FROM users where email=?";
        $record = $db->prepare($query);
        $record->execute([$email]);
        return $record->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_user_like($input)
    {
        $db = new PDO(DSN, USER, PASS);
        $input= Sanitize::sqlSanitize($input);
        $query = "SELECT * FROM users WHERE username LIKE ? OR name LIKE ? OR surname LIKE ?";
        $record = $db->prepare($query);
        $record->execute([$input . '%', $input . '%', $input . '%']);
        return $record->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>