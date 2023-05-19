<?php
session_start();

if(!empty($_POST))
{
  extract($_POST);
  require "Pages/Register.php";

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crimson</title>
    <link rel="stylesheet" href="Bootstrap/css/mdb.min.css">

    <link rel="stylesheet" href="css/index.css">
    <script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
  <script src="JS/prevent.js"></script>

</head>
<body>
    <section class="vh-100 bg-image bg">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Welcome to Crimson!</h2>

              
              <form action="" method="post">
      
             
              <div class="form-floating mb-4">
          <input name="userName" type="text" class="form-control border-1" id="floatingInput1" placeholder="Name">
          <label for="floatingInput1">Your Name</label>
        </div>
        
        <div class="form-floating mb-4">
          <input name="email" type="email" class="form-control border-1" id="floatingInput1" placeholder="name@example.com">
          <label for="floatingInput1">Email address</label>
        </div>
             
                <div class="form-floating mb-4">
          <input name="DOB" type="date" class="form-control border-1" id="floatingInput1" placeholder="xx-xx-xxxx">
          <label for="floatingInput1">Your Date of Birth</label>
        </div>
             
        <div class="form-floating mb-4">
          <input name="password" type="password" class="form-control border-1" id="floatingInput1" placeholder="xx-xx-xxxx">
          <label for="floatingInput1">Password</label>
        </div>

        <div class="form-floating mb-4">
          <input type="password" class="form-control border-1" id="floatingInput1" placeholder="xx-xx-xxxx">
          <label for="floatingInput1">Repeat your password</label>
        </div>

        <div class="form-floating mb-6">
          <input name="ProfilePicture" type="file" class="form-control border-1" id="floatingInput1" placeholder="xx-xx-xxxx">
          <label for="floatingInput1">Upload Profile Picture</label>
        </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-danger btn-block btn-lg gradient-custom-2 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="Pages/login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>