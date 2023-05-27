<?php
require_once "../scripts/config.php";

try {
  $db=new PDO(DSN, USER, PASS);
  } catch(PDOException $e) {
   echo json_encode(["error" => "API Server is down due to DB Connection"]); //gives json encoded error
   exit ;
 }

function getLikes()
{
     global $db;
     $query = "select * from posts";
     $record= $db->prepare($query);
     $record->execute();
     return $record->fetchAll(PDO::FETCH_ASSOC);
}
function updateLikes($postId, $newLikes)
{
      global $db;
      try{
      $query = "update posts set likes = ? where postid = ?";
      $record=$db->prepare($query);
      $record->execute([$newLikes, $postId]);
      return ["newLikes" => $newLikes] ; //returns an object
    } catch(PDOException $e) {

      return ["error" => "API Error: Update Likes Error"] ;
    }
}

?>