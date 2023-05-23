<?php
    class Friends
    {

        public static function getFriends($email) //current Email
        {
            $db= new PDO(DSN, USER, PASS);
            $db= $db->prepare("SELECT * FROM friends WHERE userEmail=?");
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
            $Usernames=[];
             $counter=0;
            foreach($FriendArray as $i)
            {
                $record=self::UserNameHelper($i['FriendEmail']);
                $Usernames[$counter]= $record[0]['username'];
                $counter++;
            }
            //append the current user's email to the array
            $record=self::UserNameHelper($FriendArray[0]['userEmail']);
            $Usernames[$counter]= $record[0]['username'];
            return $Usernames;
        }

    }



?>