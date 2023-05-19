<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<style>
  .gradient-custom-2 {
    /* fallback for old browsers */
    background: #fbc2eb;


    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1))
  }

  img {
    width: 400px;
    height: auto;

  }

  .card {

    width: 500px;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
  }

  .post {
    width: 600px;
    height: 350px;
    border: solid 1px #f5e1fa;
    border-radius: 2%;
  }

  .main {
    width: 800px;
    margin: auto;
    padding-top: 100px;
  }

  #like {
    width: 50px;
    padding: 0;
    margin-left: 10px;
  }

  #comment {
    width: 50px;
    padding: 0;
    margin-left: 20px;
  }

  .number {
    display: flex;
    flex-direction: row;
    text-align: center;
    align-items: center;

  }

  .number p {
    margin-top: 12px;
    margin-left: 4px;
  }

  nav img {
    width: 50px;
  }

  #camera {
    position: absolute;
    top: 10px;
    left: 400px;

  }

  #search {
    position: absolute;
    top: 10px;
    right: 400px;

  }

  #profimg{
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }
  .profile{
    position: relative;
    right: 150px;
    top:5px;
    display: flex;
    flex-direction: row;
  }
  .profile p{
    margin-top: 20px;
    margin-left: 10px;
  }
</style>

<body>
  <div class="h-100 gradient-custom-2 main">

    <nav>
      <img src="../img/camara-icon-21.png" alt="" id="camera">
      <img src="../img/search.png" alt="" id="search">
    </nav>
    <div class="card">
      <div class="profile">
        <img src="./../img//avatar-1.webp" id="profimg">
        <p>Avatar Surname</p>
      </div>
      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
        <img src="../img/111.webp" class="img-fluid post" />
        <a href="#!">
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
      </div>
      <div class="card-body">
        <div class="number">
          <img src="../img/likebutn.png" alt="" id="like">
          <p>4</p>
          <img src="../img/comment.png" alt="" id="comment">
          <p>4</p>
        </div>
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

      </div>
    </div>

    <div class="card">
      <div class="profile">
        <img src="./../img//avatar-1.webp" id="profimg">
        <p>Avatar Surname</p>
      </div>
      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
        <img src="../img/111.webp" class="img-fluid post" />
        <a href="#!">
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
      </div>
      <div class="card-body">
        <div class=number>
          <img src="../img/likebutn.png" alt="" id="like">
          <p>4</p>
          <img src="../img/comment.png" alt="" id="comment">
          <p>4</p>
        </div>
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>

    <div class="card">
      <div class="profile">
        <img src="../img//avatar-1.webp" id="profimg">
        <p>Avatar Surname</p>
      </div>
      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
        <img src="../img/111.webp" class="img-fluid post" />
        <a href="#!">
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
      </div>
      <div class="card-body">
        <div class="number">

          <img src="../img/likebutn.png" alt="" id="like">
          <p>4</p>
          <img src="../img/comment.png" alt="" id="comment">
          <p>4</p>
        </div>
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

      </div>
    </div>
  </div>
</body>

</html>