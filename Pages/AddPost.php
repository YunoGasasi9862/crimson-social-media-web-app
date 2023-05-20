<?php
include "../Classes/post.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $result= Post::create_post("root2525",$_POST);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
    .gradient-custom-2 {
        background: #fbc2eb;
        background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));
        background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));
        min-height: 800px;
    }
    .main {
        background-color: white;
        border-radius: 2%;
        width: 800px;
        margin: auto;
        min-height: 800px;
    }
    .card {
    width: 600px;
    margin: auto;
    border-radius: 2%;
    }
    </style>
</head>
<body>
    <div class="h-100 gradient-custom-2 ">
        <div class="main">
            <br><br><br>
            <form action="" method="post">
            <div class="card text-center">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <h5 class="card-title">Add Post</h5>
                    <input name="image" type="file" class="form-control border-1" id="floatingInput1" placeholder="xx-xx-xxxx">
                    <br>
                    <textarea name="description" id="description" cols="74" rows="2" placeholder="Write Description"></textarea>
                    <br><br>
                    <input name="submitPost" class="btn btn-primary" type="submit" value="Post">
                </div>
                <div class="card-footer text-muted">@user</div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>