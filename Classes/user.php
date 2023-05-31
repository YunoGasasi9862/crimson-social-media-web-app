<?php
require_once "../scripts/config.php";
class User
{
    public static function get_user($username)
    {
        $db = new PDO(DSN, USER, PASS);
        $query = "SELECT * FROM users where username=?";
        $record = $db->prepare($query);
        $record->execute([$username]);
        return $record->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_users_by_username($usernames)
    {
        $db = new PDO(DSN, USER, PASS);
        $query = "SELECT * FROM users WHERE username IN ($usernames)";
        $record = $db->prepare($query);
        $record->execute();
        return $record->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_user_like($input)
    {
        $db = new PDO(DSN, USER, PASS);
        $query = "SELECT * FROM users WHERE username LIKE ? OR name LIKE ? OR surname LIKE ?";
        $record = $db->prepare($query);
        $record->execute([$input . '%', $input . '%', $input . '%']);
        return $record->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>