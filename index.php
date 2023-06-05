<?php
if (!empty($_POST)) {
  require "scripts/db.php";
  require "Pages/PictureUpload.php";
  extract($_POST);
  extract($_FILES);
  $error = [];
  filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
  filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
  filter_var($repeatPassword, FILTER_SANITIZE_SPECIAL_CHARS);
  filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
  filter_var($surname, FILTER_SANITIZE_SPECIAL_CHARS);

  // Verification for Name
  if (empty($name)) {
    $error['name'] = "Name is required!";
  }

  // Verification for Surname
  if (empty($surname)) {
    $error['surname'] = "Surname is required!";
  }

  // Verification for Email
  if (empty($email)) {
    $error['email'] = "Email is required!";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email'] = "Invalid email format!";
  }

  // Verification for Username
  if (empty($username)) {
    $error['username'] = "Username is required!";
  }

  // Verification for Date of Birth
  if (empty($DOB)) {
    $error['DOB'] = "Date of Birth is required!";
  }

  // Verification for Password
  if (empty($password)) {
    $error['password'] = "Password is required!";
  }

  // Verification for Repeat Password
  if (empty($repeatPassword)) {
    $error['repeatPassword'] = "Repeat Password is required!";
  } elseif ($password != $repeatPassword) {
    $error['repeatPassword'] = "Passwords do not match!";
  }

  if (empty($error)) {
    $filePath = new PictureUpload("PP", "PPimages"); //they both have to be string
    Register($email, $password, $username, $name, $surname, $filePath->filename, $DOB);
    header("Location: Pages/login.php");
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
  <title>Crimson</title>
  <link rel="stylesheet" href="Bootstrap/css/mdb.min.css">

  <link rel="stylesheet" href="css/index.css">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="JS/prevent.js"></script>

  <style>
  
  ::-webkit-scrollbar {
    width: .5em;
  }

  ::-webkit-scrollbar-track {
    background: hsl(348, 75%, 30%);
  }
  
 
  </style>

</head>

<body >
  <section class="vh-100 bg-image bg">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100 ">
        <div class="row d-flex justify-content-center align-items-center h-100 " >
          <div class="col-12 col-md-9 col-lg-7 col-xl-6 " style="width: 800px;">
            <div id="scr" class="card " style="overflow-y: scroll;height:1000px;">
              <div class="card-body p-5 ">
                <h2 class="text-uppercase text-center mb-5">Welcome to Crimson!</h2>
                <form action="" method="post" enctype="multipart/form-data">

                  <div class="form-floating mb-4">
                    <input name="name" type="text" class="form-control border-1" id="floatingInput1" placeholder="Name"
                      required>
                    <label for="floatingInput1">Your Name</label>
                    <?php if (isset($error['name'])): ?>
                    <span class="text-danger">
                      <?php echo $error['name']; ?>
                    </span>
                    <?php endif; ?>
                  </div>

                  <div class="form-floating mb-4">
                    <input name="surname" type="text" class="form-control border-1" id="floatingInput2"
                      placeholder="Surname" required>
                    <label for="floatingInput2">Your Surname</label>
                    <?php if (isset($error['surname'])): ?>
                    <span class="text-danger">
                      <?php echo $error['surname']; ?>
                    </span>
                    <?php endif; ?>
                  </div>

                  <div class="form-floating mb-4">
                    <input name="email" type="email" class="form-control border-1" id="floatingInput3"
                      placeholder="name@example.com" required>
                    <label for="floatingInput3">Email address</label>
                    <?php if (isset($error['email'])): ?>
                    <span class="text-danger">
                      <?php echo $error['email']; ?>
                    </span>
                    <?php endif; ?>
                  </div>

                  <div class="form-floating mb-4">
                    <input name="username" type="text" class="form-control border-1" id="floatingInput4"
                      placeholder="xxxx" required>
                    <label for="floatingInput4">User Name</label>
                    <?php if (isset($error['username'])): ?>
                    <span class="text-danger">
                      <?php echo $error['username']; ?>
                    </span>
                    <?php endif; ?>
                  </div>

                  <div class="form-floating mb-4">
                    <input name="DOB" type="date" class="form-control border-1" id="floatingInput5"
                      placeholder="xx-xx-xxxx" required>
                    <label for="floatingInput5">Your Date of Birth</label>
                    <?php if (isset($error['DOB'])): ?>
                    <span class="text-danger">
                      <?php echo $error['DOB']; ?>
                    </span>
                    <?php endif; ?>
                  </div>

                  <div class="form-floating mb-4">
                    <input name="password" type="password" class="form-control border-1" id="floatingInput6"
                      placeholder="Password" required>
                    <label for="floatingInput6">Password</label>
                    <?php if (isset($error['password'])): ?>
                    <span class="text-danger">
                      <?php echo $error['password']; ?>
                    </span>
                    <?php endif; ?>
                  </div>

                  <div class="form-floating mb-4">
                    <input name="repeatPassword" type="password" class="form-control border-1" id="floatingInput7"
                      placeholder="Repeat Password" required>
                    <label for="floatingInput7">Repeat your password</label>
                    <?php if (isset($error['repeatPassword'])): ?>
                    <span class="text-danger">
                      <?php echo $error['repeatPassword']; ?>
                    </span>
                    <?php endif; ?>
                  </div>

                  <div class="form-floating mb-6">
                    <input name="PP" type="file" class="form-control border-1" id="floatingInput8"
                      placeholder="Upload Profile Picture" required>
                    <label for="floatingInput8">Upload Profile Picture</label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit"
                      class="btn btn-danger btn-block btn-lg gradient-custom-2 text-body">Register</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="Pages/login.php"
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

  <script>
         $(window).resize(function(){
         
            height=$(window).height();
            console.log(height);
            if(height<600)
            {
              $("#scr").css("height","600");
            }else
            {
              $("#scr").css("height","1000");

            }
      });

  </script>

</html>