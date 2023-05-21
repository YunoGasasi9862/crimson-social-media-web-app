<?php
const DSN = "mysql:host=localhost;port=3306;dbname=crimson;charset=utf8mb4" ;
const USER="root";
const PASS=""; 

class Post{

    public static function create_post($username, $data){ //initial creation of post, if no image is provided, write null, and for likes and dislikes zero
        $db=new PDO(DSN, USER, PASS);
        $error = "";
        if(!empty($data['description'])){
            $description= $data['description'];
            $postid=Post::create_postid();
            if(empty($data['image']))
            {
                  $image=NULL;
            }
            $statement=$db->prepare ("INSERT INTO posts (postid,username,post,image, comments, likes, date) VALUES (?,?,?,?,?,?,?)");
            $statement->execute([$postid,$username,$description, $image,0,0, date("Y-m-d H:i:s")]);  

        }else{
            $error="Please Type Something to Post <br>";
        }
        return $error;
    }
    public static function get_posts($username){
        $db=new PDO(DSN, USER, PASS);
        $query="SELECT * FROM posts where username=?";
        $record=$db->prepare($query); 
        $record->execute([$username]);  
        return $record->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create_postid(){
        $length= rand(4,19);
        $number="";
        for($i=0;$i<$length;$i++){
            $new_rand= rand(0,9);
            $number=$number . $new_rand;
        }
        return $number;
    }

}

?>