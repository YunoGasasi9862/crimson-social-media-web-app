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
      $array=$record->fetchAll(PDO::FETCH_ASSOC);
      return ["newLikes" => $newLikes] ; //returns an object
    } catch(PDOException $e) {

      return ["error" => "API Error: Update Likes Error"] ;
    }
}

function insertLikesIntoULikesTable($username, $postId, $YesNo)
{
  global $db;
    try{
        $query="INSERT INTO luikes (username, postid, liked) VALUES (?,?,?)";
        $record=$db->prepare($query);
        $record->execute([$username, $postId, $YesNo]);
        return ["username" => $username, "postId" => $postId, "YesNo" => $YesNo] ;
    }catch(PDOEXCEPTION $e)
    {
      return ["error" => "API Error: Update Likes Error", "YesNo" => $YesNo] ;

    }
  
}

function removeLikes($postId, $username, $newLikes)
{
  global $db;
  try{
    $query="DELETE FROM luikes WHERE username=? AND postid=?";
    $record=$db->prepare($query);
    $record->execute([$username, $postId]);
    $query = "update posts set likes = ? where postid = ?";
    $record=$db->prepare($query);
    $record->execute([$newLikes, $postId]);
    return ["postId" => $postId, "username" => $username, "newLikes" => $newLikes] ;

  }catch(PDOEXCEPTION $e)
  {
    return ["error" => "API Error: Update Likes Error"] ;

  }
}

function insertIntoComments($username, $postid, $comment)
{
  global $db;
  try{
    $query= "INSERT INTO comments (username, postid, comment) VALUES (?,?,?)";
    $record= $db->prepare($query);
    $record->execute([$username, $postid, $comment]);
    return ["username" => $username, "postid" => $postid, "comment" => $comment] ;

  }catch(PDOEXCEPTION $e)
  {
    return ["error" => "API Error: Update Comment Error"] ;
  }
}

function GetCommentsForEachPost()
{
  global $db;
  try{
    $query= "SELECT * FROM comments";
    $record= $db->prepare($query);
    $record->execute();
    return $record->fetchAll(PDO::FETCH_ASSOC);
  }catch(PDOEXCEPTION $e)
  {
    return ["error" => "API Error: Get Comments Error"] ;
  }
}



?>