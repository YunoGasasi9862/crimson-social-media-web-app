<?php
if(session_id() == ''){ session_start();}
if(isset($_GET))
{
    extract($_GET);
    var_dump($_GET);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../css/mainpage.css">
    <title>Search</title>
</head>
<body>

    <div class="h-100 gradient-custom-2 ">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../img/avatar-1.webp" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-success">Add Friend</a>
                <a href="#" class="btn btn-danger">Delete</a>

    </div>

</div>
</div>
</body>
</html>