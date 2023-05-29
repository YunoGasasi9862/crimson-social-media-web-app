<?php
    require_once "../scripts/config.php";
    require_once "user.php";
    if(session_id() == ''){ session_start();}

    $username = $_SESSION['User']['username'];

    class Friends
    {

        public static function getFriends($email) //current Email
        {
            $db= new PDO(DSN, USER, PASS);
            $db= $db->prepare("SELECT * FROM friends WHERE userEmail=?");
            $db->execute([$email]);
            return $db->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getFriendMail($email) //current Email
        {
            $db= new PDO(DSN, USER, PASS);
            $db= $db->prepare("SELECT FriendEmail FROM friends WHERE userEmail=?");
            $db->execute([$email]);
            return $db->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function UserNameHelper($email)
        {
            $db= new PDO(DSN, USER, PASS);
            $db= $db->prepare("SELECT * FROM users WHERE email=?");
            $db->execute([$email]);
            return $db->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function fetchUsernames($FriendArray)
        {
            global $username;
            $Usernames=[];
             $counter=0;
             $Usernames[$counter]= $username;
             if($FriendArray!=null)
             {
                $counter++;
                foreach($FriendArray as $i)
                {
                    $record=self::UserNameHelper($i['FriendEmail']);
                    $Usernames[$counter]= $record[0]['username'];
                    $counter++;
                }
                //append the current user's email to the arra
                $counter=0;    
             }

             return $Usernames;

        }

        public static function addFriend($friendname){
            global $username;
            $user = USER::get_user($username); 
            $usermail=$user["email"];
            $friend= USER::get_user($friendname);
            $friendmail=$friend["email"];
            $db= new PDO(DSN, USER, PASS);
            $db= $db->prepare("INSERT INTO friends (userEmail, FriendEmail) VALUES (?, ?)" );
            $db->execute([$usermail, $friendmail]);
        }

        public static function removeFriend($friendname){
            global $username;
            $user = USER::get_user($username); 
            $usermail=$user["email"];
            $friend= USER::get_user($friendname);
            $friendmail=$friend["email"];
            $db= new PDO(DSN, USER, PASS);
            $db= $db->prepare("DELETE FROM friends WHERE userEmail=? AND FriendEmail=?" );
            $db->execute([$usermail, $friendmail]);

        }
    }




?>