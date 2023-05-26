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
  .main {
    background-color: white;
    border-radius: 2%;
    width: 800px;
    margin: auto;
    min-height: 800px;
  }

  .gradient-custom-2 {
    /* fallback for old browsers */
    background: #fbc2eb;
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));
    min-height: 800px;
  }

  nav {
    border-bottom: 1px solid #EBEBEB;
    box-shadow: 0px 2px 0.5px rgba(0, 0, 0, 0.1);
    border-radius: 2%;
    height: 100px;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
  }

  nav img {
    width: 50px;
    
    border-radius: 50%;
  }

  img {
    width: 400px;
    height: auto;
  }

  .card {
    width: 600px;
    margin: auto;
    margin-bottom: 10px;
    border-radius: 2%;
  }

  .post {
    width: 600px;
    height: 350px;
    border: solid 1px #f5e1fa;
  }
  
  
  .profile {
    display: flex;
    flex-direction: row;
    margin: 5px;
  }
  
  #profimg {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }
  .profile p {
    margin-top: 20px;
    margin-left: 10px;
  }
  .reaction{
    display: flex;
    align-items: flex-start;
  }

  #like {
    width: 40px;
  }

  #comment {
    width: 40px;
    margin-left: 10px;
  }

  #like_number, #comment_number{
    padding: 8px;
  }

  #inp {
  width: 300px; 
  height: 40px; 
  border-radius: 20px; 
  border: white;
  padding: 10px;
  
  color: grey; 
  box-shadow: 0 0 10px #6c00ff; 
}
#inp:focus {
  outline: none; 
  background-color: white; 
  color: black; 
}
#btn:hover {
  transform: scale(1.1); 
 
}
#camera:hover {
  
  transform: scale(1.1);
 
 
}
/*coppy paste starting there for notifications tables etc*/
.button {
  background-color: transparent; /* Buton arka plan rengi */
  border: none;
  color: white; /* Buton metin rengi */
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  padding: 10px 20px; /* Buton boyutu */
  position: absolute; /* Pozisyon ayarı */
  margin-left: -190px;
  margin-top: -45px;
}

.button:hover {
  animation: shake 0.8s;
}

@keyframes shake {
  0% { transform: rotate(0deg); }
  25% { transform: rotate(15deg); }
  75% { transform: rotate(-15deg); }
  100% { transform: rotate(0deg); }
}

#notf {
  
    width: 40px;
    margin-top: 17px;
    
  }
  

.notftable {
  position: relative;

  
    z-index: 1;
  }

  

  .notftable:hover .submain,
  .notftable.show .submain {
    display: block;
  }

  .submain {
    position: absolute;
    margin-left: -170px ;
    margin-top: 25px;
    display: none;
    background-color: #fff;
    
    width:400px;
    height:400px;
    border: 2px solid #bcbce5;
    border-radius: 5px;
  }

  .submain ul {
    list-style: none;
    padding: 0;
  }

  .submain li {
    padding: 5px 10px;
    
  }

  

  .submain li a {
  text-decoration: none;
  color: #333;
  text-align: right; /* Align the text to the right */
  margin-right: 30px; /* Adjust the right margin */
  margin-left: auto; /* Set the left margin to auto for center alignment */
}

.submain li p {
  border-bottom: 2px solid #bcbce5;
  padding: 5px;
  text-align: right; /* Align the text to the right */
  margin-right: 30px; /* Adjust the right margin */
  margin-left: auto; /* Set the left margin to auto for center alignment */
}




  .submain li a:hover {
    color: #ff0000;
  }
  #pic1{
    width:50px;
    border-radius: 170px;
  }
</style>
<script>
  function toggleNotftable() {
    var notftable = document.querySelector(".notftable");
    notftable.classList.toggle("show");
  }
</script>
<body>
  <div class="h-100 gradient-custom-2 ">
    <div class="main">

     <nav>
        <button type="submit" id="camera" style="border: none; background: none; padding: 0;">
          <div class="nav-item"><img src="../img/camara-icon-21.png" alt="" id="camera" ></div>
        </button>

        
        <div class="notftable">
  <button class="button" onclick="toggleNotftable()">
    <img src="../img/notification.png" id="notf" alt="">
  </button>
  <div class="submain" id="submain">
    <ul>
      <li><br><img src="../img/avatar-1.webp" id="pic1"alt=""><a href="#">Submenu Öğesi 1 Submenu Öğesi 1 Submenu Öğesi 1 <p></p></a></li>
      <li><img src="../img/avatar-1.webp" id="pic1"alt=""><a href="#">Submenu Öğesi 1 Submenu Öğesi 1 Submenu Öğesi 1 <p></p></a></li>
      <li><a href="#">Submenu Öğesi 3 </a></li>
    </ul>
  </div>
</div>

      
        <form>
          <input type="text" name="search" id="inp" placeholder="Search...">
          <button type="submit" id="btn" style="border: none; background: none; padding: 0;">
            <div class="nav-item"><img src="../img/search.png" alt="" id="search"></div>
          </button>
        </form>
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
          <div class="reaction">
            <img src="../img/likebutn.png" alt="" id="like"><span id="like_number">4</span> 
            <img src="../img/comment.png" alt="" id="comment"><span id="comment_number">4</span> 
          </div>
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
