<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
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


#home {

    width:30px;

    position:absolute;
    top:20px;

}
#notif{
    width:30px;

    position:absolute;
    top:20px;
    right:20px;

}
.follow:hover .submain {
  display: block;
}

.submain {
  position: absolute;
  right: 20px;
  top: 280px;
  display: none;
}

.submain ul {
  list-style: none;
  padding: 0;
}

.submain li {
  padding: 5px 0;
}

.submain li a {
  text-decoration: none;
  color: #333;
}

.submain li a:hover {
  color: #ff0000;
}
</style>

<body>

<section class="h-100 gradient-custom-2" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-image: url('../img/profilebackground.jpg'); height:200px;">
            
          <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
           <a href=""> <img src="../../img/home.png" alt="" id="home"></a>
            <a href=""><img src="../img/notification.png" alt="" id="notif"></a>
              <img src="../img/avatar-1.webp"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
              <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                style="z-index: 1;">
                Edit profile
              </button>
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5>Andy Horwitz</h5>
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
        <div class="submain">
            <ul>
            <li><a href="#">Submenu Öğesi 1</a></li>
            <li><a href="#">Submenu Öğesi 2</a></li>
            <li><a href="#">Submenu Öğesi 3</a></li>
            </ul>
        </div>
    </div>
    <div class="follow">
        <p class="mb-1 h5">478</p>
        <p class="small text-muted mb-0">Following</p>
        <div class="submain">
            <ul>
            <li><a href="#">Submenu Öğesi 1</a></li>
            <li><a href="#">Submenu Öğesi 2</a></li>
            <li><a href="#">Submenu Öğesi 3</a></li>
            </ul>
        </div>
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
            
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent photos</p>
            </div>
            <div class="row g-2">
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
            <div class="row g-2">
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>