<?php
session_start();
include "../Classes/post.php";

$username=$_SESSION['User']['username'];
if($_SERVER['REQUEST_METHOD']=="POST"){
    require "../Pages/PictureUpload.php";

    extract($_POST);
    extract($_FILES);
    $filePath = new PictureUpload("postimage", "../PostImages"); //they both have to be string
    $result= Post::create_post($username,$filePath->filename, $_POST);
    
    if($result==""){
        header("Location: Feed.php");
        die;
    }else{
        echo "ERROR OCCURED";
        echo $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
    body {
        background-color: #f5f5f5;
    }
    .gradient-custom-2 {
        background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));
        min-height: 800px;
    }
    .main {
        background-color: white;
        border-radius: 2%;
        width: 800px;
        margin: auto;
        min-height: 800px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .card {
        width: 600px;
        margin: auto;
        border-radius: 2%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background: linear-gradient(135deg, #ff00ff,#6c00ff );    
        font-weight: bold;
        color: white;
        font-size: ;
    }
    .card-body {
        padding: 30px;
    }
    .card-title {
        font-size: 24px;
        margin-bottom: 20px;
    }
    .form-control {
        border-radius: 20px;
        padding: 15px;
        background-color: #f0f0f0;
        border: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    textarea {
        resize: none;
        height: 100px;
        border-radius: 5px;
        border: 2px #f2f2f2;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        background-color: #f2f2f2;
        transition: border-color 0.3s;
        width:500px;
    }
    textarea:focus {
       outline: none; 
    background-color: white; 
    color: black; 
    border-color: #99CCFF;
    border-width: 3px;
    border-style: solid;
    }
    .btn-primary {
        background-color: #6c00ff;
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #ff00ff,#6c00ff );    

    }
    .card-footer {
        background-color: #f0f0f0;
        font-weight: bold;
    }
    .icons {
  display: flex;
  justify-content: flex-start; /* İmajları sola hizalar */
  margin-left: 35px;
}

.icons img {
  margin-right: 30px; /* İstenilen boşluk miktarını ayarlayabilirsiniz */
}

.icons img:last-child {
  margin-right: -10px; /* Son resimden sonra boşluk olmasını engeller */
}
    </style>
</head>
<body>
    <div class="h-100 gradient-custom-2">
        <div class="main">
            <br><br><br>
            <form action="" method="post"  enctype="multipart/form-data">
            <div class="card text-center">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <h5 class="card-title">Add Post</h5>
                    <input type="file" name="postimage" class="form-control border-1" id="floatingInput1" placeholder="xx-xx-xxxx">
                    <br>
                    <textarea name="description" id="description" cols="74" rows="2" placeholder="Write Description"></textarea>
                    <br><br>
                    <input name="submitPost" class="btn btn-primary" type="submit" value="Post">
                </div>
                <div class="card-footer text-muted"><?=$username?></div>
                <div class="icons">

                <img src="../img/icons8-upload.gif" alt="">
                    <img src="../img/video.png" alt="" id="video">
                    <img src="../img/gallery.png" alt="">
                    <img src="../img/place.png" alt="">
                    <img src="../img/filmsound.png" alt="">
                    <img src="../img/selfies.png" alt="">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
