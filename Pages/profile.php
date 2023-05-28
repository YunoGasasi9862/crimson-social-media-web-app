<?php
require "../scripts/db.php";
include_once "../Classes/user.php";
if(session_id() == ''){ session_start();}

$username = $_GET["profile"] ?? $_SESSION['User']['username'] ;
$user = USER::get_user($username);
if(!$user)$user=$_SESSION['User'];
$profile=$user["profile"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/profile.css">
    <title>Document</title>
</head>


<body>

<section class="h-100 gradient-custom-2" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-image: url('../img/profilebackground.jpg'); height:200px;">
            
          <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
           <a href="Feed.php"> <img src="../img/home.png" alt="" id="home"></a>

              <img src= <?=isset($profile)? "../PPimages/$profile" : "../img/home.png" ?>
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5><?=$user["name"]." ".$user["surname"]?></h5>
              <p>New York</p>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
              <div>
                <p class="mb-1 h5">253</p>
                <p class="small text-muted mb-0">Photos</p>
              </div>
    <div class="px-3 follow">
        <p class="mb-1 h5">1026</p>
        <p class="small text-muted mb-0">Followers</p>
    
    </div>
    <div class="follow">
        <p class="mb-1 h5">478</p>
        <p class="small text-muted mb-0">Following</p>
      
    </div>
          </div>
          <div class="submain" style="width: 18rem;">
  <ul class="list-group list-group-light">
    <li class="list-group-item px-3">Cras justo odio</li>
    <li class="list-group-item px-3">Dapibus ac facilisis in</li>
    <li class="list-group-item px-3">Vestibulum at eros</li>
  </ul>
</div>
          <div class="card-body p-4 text-black">  
              <a href="logout.php" class="btn btn-danger w-bold text-body">Logout</a>
                 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>