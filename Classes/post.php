<?php
require_once "../scripts/config.php";
require_once "sanitize.php";
class Post{
    public static function create_post($username, $file, $data){
        $db=new PDO(DSN, USER, PASS);
        $error = "";
        if(!empty($data['description'])){
            $data=Sanitize::sqlSanitize($data);
            $description= $data['description'];
            $postid=Post::create_postid();
            $username=Sanitize::sqlSanitize($username);
            $statement=$db->prepare ("INSERT INTO posts (postid,username,post,image,comments, likes, date) VALUES (?,?,?,?,?,?,?)"); //you cant insert partial data, you have to give all the fields
            if($file!=null)
            {
                $statement->execute([$postid,$username,$description, $file, 0, 0, date("Y-m-d H:i:s")]);
            }else
            {
                $statement->execute([$postid,$username,$description, NULL, 0, 0, date("Y-m-d H:i:s")]);
            }
         
        }else{
            $error="Please Type Something to Post <br>";
        }
        return $error;
    }
    public static function get_posts($username){
        $db=new PDO(DSN, USER, PASS);
        $username=Sanitize::sqlSanitize($username);
        $query="SELECT * FROM posts where username=?";
        $record=$db->prepare($query); 
        $record->execute([$username]);  
        return $record->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create_postid(){
        $length= rand(4,10);
        $number="";
        for($i=0;$i<$length;$i++){
            $new_rand= rand(0,9);
            $number=$number . $new_rand;
        }
        return $number;
    }



}

?>