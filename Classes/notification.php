<?php
require_once "../scripts/config.php";
require_once "sanitize.php";
require_once "user.php";
if (session_id() == '') {session_start();}


class Notifications
{

    public static function getNotifications($email) //current Email
    {
        $email=Sanitize::sqlSanitize($email);
        $db = new PDO(DSN, USER, PASS);
        $db = $db->prepare("SELECT * FROM notifications WHERE toUserEmail=?");
        $db->execute([$email]);
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function setNotifications($toUserName, $content){
        $username = $_SESSION['User']['username'];;
        $username=Sanitize::sqlSanitize($username);
        $user = USER::get_user($username); 
        $fromUserEmail=$user["email"];
        $toUserName=Sanitize::sqlSanitize($toUserName);
        $toUser= USER::get_user($toUserName);
        $toUserEmail=$toUser["email"];
        $query = new PDO(DSN, USER, PASS);
        $db= $query->prepare("DELETE FROM notifications WHERE fromUserEmail=? AND toUserEmail=?");
        $db->execute([$fromUserEmail, $toUserEmail]);
        $db= $query->prepare("INSERT INTO notifications (fromUserEmail,toUserEmail, content) VALUES (?,?,?)");
        $db->execute([$fromUserEmail, $toUserEmail, $content]);
    }
    
    public static function removeNotifications($fromemail) {
    
        $usermail = $_SESSION['User']["email"];
        $usermail=Sanitize::sqlSanitize($usermail);
        $fromemail=Sanitize::sqlSanitize($fromemail);
        $db = new PDO(DSN, USER, PASS);
        $db = $db->prepare("DELETE FROM notifications WHERE (fromUserEmail=? AND toUserEmail=?) OR (fromUserEmail=? AND toUserEmail=?)");
        $db->execute([$usermail, $fromemail, $fromemail, $usermail]);
    }
}
?>