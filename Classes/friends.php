<?php
    $username = $_SESSION['User']['username'];

    class Friends
    {

        public static function getFriends($email) //current Email
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
             if($FriendArray!=null)
             {
                $Usernames[$counter]= $username;
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

    }



?>