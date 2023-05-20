<?php
require "../scripts/db.php";

session_start(); //starts session

if(isset($_SESSION['User']))  //checks if the user is already authenticated
{
  header("Location: Profile.php");
  exit;
}

extract($_POST);

if(!empty($_POST))
{
  filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
  filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
  $userLoggingIn= AuthenticateUser($email, $password);
  if($userLoggingIn)
  {
    $_SESSION['User']=GetUser($email);  //sets up a session for that particular user
    header("Location: Profile.php");
    exit;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../css/index.css">

    <title>Login</title>
</head>
<body>
<section class="vh-100 bg-image bg">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Sign in</h2>

    <section class="vh-100 bg-image bg">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                  <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Sign in</h2>
      
                    <form action="" method="post">
                    <div class="form-floating mb-4">
                    <input name="email" type="email" class="form-control border-1" id="floatingInput1" placeholder="name@example.com">
                    <label for="floatingInput1">Email address</label>
                  </div>

                  
                  <div class="form-floating mb-4">
                    <input name="password" type="password" class="form-control border-1" id="floatingInput1" placeholder="name@example.com">
                    <label for="floatingInput1">Password</label>
                  </div>
      
                  <div class="d-flex justify-content-center">
                    <button type="submit"
                      class="btn btn-danger btn-block btn-lg gradient-custom-4 text-body">Sign in</button>
                  </div>
                  </form>
      
                  </div>
                </div>
              </div>

              <div class="form-floating mb-4">
                <input name="password" type="password" class="form-control border-1" id="floatingInput1" placeholder="name@example.com">
                <label for="floatingInput1">Password</label>
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit"
                  class="btn btn-danger btn-block btn-lg gradient-custom-4 text-body">Sign in</button>
              </div>
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