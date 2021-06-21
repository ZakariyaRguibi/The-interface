<?php
   include("dbconfig.php");

    session_start();

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($dbi,$_POST['user']);
      $mypassword = mysqli_real_escape_string($dbi,$_POST['pswd']); 
      
      $sql = "SELECT `id-account` FROM  account WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($dbi,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      echo $count;
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         echo "here";
        header("location: panel.php");
      }else {
        echo "there";
         header("location: login.php");
      }
   }
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body class="img js-fullheight" style="background-image: url(media/bg.jpg)">
    <div class="container">

      <div class="row ">
        <div class="col-3 my-auto">
          <img
            src="media/ensa.png"
            class="img-fluid rounded text-center"
            alt="..."
          />
        </div>
        <div class="col-6 pt-3"></div>
        <div class="col-2 pt-3">
          <img
            src="media/uca.png"
            class="img-fluid rounded text-center"
            alt="..."
            style="max-width: 80%;"
          />
        </div>
      </div>

    </div>

    <section class="">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="text-primary-me display-4 text-white">The Interface</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Login</h3>
              <form action="login.php" method="Post" class="signin-form">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    name="user"
                    placeholder="Username"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    id="password-field"
                    type="password"
                    name="pswd"
                    class="form-control"
                    placeholder="Password"
                    required
                  />
                  <span
                    toggle="#password-field"
                    class="fa fa-fw fa-eye field-icon toggle-password"
                  ></span>
                </div>
                <div class="form-group">
                  <button
                    type="submit"
                    class="form-control btn btn-primary submit px-3"
                  >
                    Sign In
                  </button>
                </div>
                
              </form>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
