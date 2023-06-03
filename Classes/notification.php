<?php
require_once "../scripts/config.php";
require_once "user.php";
if (session_id() == '') {session_start();}


class Notifications
{

    public static function getNotifications($email) //current Email
    {
        $db = new PDO(DSN, USER, PASS);
        $db = $db->prepare("SELECT * FROM notifications WHERE toUserEmail=?");
        $db->execute([$email]);
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function setNotifications($toUserName, $content){
        $username = $_SESSION['User']['username'];;
        $user = USER::get_user($username); 
        $fromUserEmail=$user["email"];
        $toUser= USER::get_user($toUserName);
        $toUserEmail=$toUser["email"];
        $db = new PDO(DSN, USER, PASS);
        $db= $db->prepare("INSERT INTO notifications (fromUserEmail,toUserEmail, content) VALUES (?,?,?)");
        $db->execute([$fromUserEmail, $toUserEmail, $content]);
    }
}
?>