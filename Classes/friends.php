<?php
require_once "../scripts/config.php";
require_once "user.php";
require_once "sanitize.php";
if (session_id() == '') {
    session_start();
}


class Friends
{

    public static function getFriends($email) //current Email
    {
        $email=Sanitize::sqlSanitize($email);
        $db = new PDO(DSN, USER, PASS);
        $db = $db->prepare("SELECT * FROM friends WHERE userEmail=?");
        $db->execute([$email]);
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getFriendMail($email) //current Email
    {
        $email=Sanitize::sqlSanitize($email);
        $db = new PDO(DSN, USER, PASS);
        $db = $db->prepare("SELECT FriendEmail FROM friends WHERE userEmail=?");
        $db->execute([$email]);
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function UserNameHelper($email)
    {
        $email=Sanitize::sqlSanitize($email);
        $db = new PDO(DSN, USER, PASS);
        $db = $db->prepare("SELECT * FROM users WHERE email=?");
        $db->execute([$email]);
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetchUsernames($FriendArray)
    {
        $username = $_SESSION['User']['username'];
        $Usernames = [];
        $counter = 0;
        $Usernames[$counter] = $username;
        if ($FriendArray != null) {
            $counter++;
            foreach ($FriendArray as $i) {
                $record = self::UserNameHelper($i['FriendEmail']);
                $Usernames[$counter] = $record[0]['username'];
                $counter++;
            }
            //append the current user's email to the arra
            $counter = 0;
        }

        return $Usernames;
    }

 
    public static function addFriend($friendname, $usermail)
    {
        try{
            $friend = USER::get_user($friendname);
            $friendmail = $friend["email"];
            $db = new PDO(DSN, USER, PASS);
            $db = $db->prepare("INSERT INTO friends (userEmail, FriendEmail) VALUES (?, ?)");
            $db->execute([$usermail, $friendmail]);
            $db->execute([$friendmail, $usermail]);
            return ["success" => "Friend Added"];
        }catch (PDOEXCEPTION $e) {
            return ["error" => "API Error: Add Friend Error"];
        }
    }

    public static function removeFriend($friendname)
    {
        $usermail = $_SESSION['User']["email"];
        $usermail=Sanitize::sqlSanitize($usermail);
        $friendname=Sanitize::sqlSanitize($friendname);
        $friend = USER::get_user($friendname);
        $friendmail = $friend["email"];
        $db = new PDO(DSN, USER, PASS);
        $db = $db->prepare("DELETE FROM friends WHERE (userEmail=? AND FriendEmail=?) OR (userEmail=? AND FriendEmail=?)");
        $db->execute([$usermail, $friendmail, $friendmail, $usermail]);
    }


    public static function isFriend($friendmail)
    {
        $usermail = $_SESSION['User']["email"];
        $usermail=Sanitize::sqlSanitize($usermail);
        $db = new PDO(DSN, USER, PASS);
        $db = $db->prepare("SELECT * FROM friends WHERE userEmail=? AND FriendEmail=?");
        $db->execute([$friendmail, $usermail]);
        $row = $db->fetch(PDO::FETCH_ASSOC);
        return !(!$row);
    }

  
}
