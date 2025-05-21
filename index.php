    <?php

    session_start();
    session_unset();
    session_destroy();


 $emailmsg="";
 $pasdmsg="";
 $msg="";

 $ademailmsg="";
 $adpasdmsg="";


 if(!empty($_REQUEST['ademailmsg'])){
    $ademailmsg=$_REQUEST['ademailmsg'];
 }

 if(!empty($_REQUEST['adpasdmsg'])){
    $adpasdmsg=$_REQUEST['adpasdmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $pasdmsg=$_REQUEST['pasdmsg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {
    background-image: url('images/5.webp')
}

.headquote{

    padding: 1px;
    width: 10;


}
.login-form-3 .btnSubmit {
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}



.container,
.row,
.h2 {
    text-align: center;
}

.login-container {
    margin-top: 5%;
    margin-bottom: 5%;
}

.login-form-1 {
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}

.login-form-1 h3 {
    text-align: center;
    color: #333;
}

.login-container form {
    padding: 10%;
}

.btnSubmit {
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}

.login-form-1 .btnSubmit {
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}

.login-form-2 .ForgetPwd {
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}

.login-form-1 .ForgetPwd {
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}


.login-form-3 h3 {
    text-align: center;
    color: #fff;
}

.login-form-1 h3 {
    text-align: center;
    color: #fff;
}

.login-form-3 {
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
header{
    height: 55px;
}

</style>

<body>
<header class="text-center  bg-primary text-white">
   <div class="container">
         <marquee class="headquote">
            <h4>LIBRARY OPEN 10:00 AM AND CLOSE 4:00 PM</h4>
         </marquee>
      </div>

  </header>

  <!--nav bar start
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">HOME</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="contact us.php">CONTACT</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="course.php" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              COURSE
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="information_technology.php">Information Technology IT</a></li>
              <li><a class="dropdown-item" href="civil.php">civil engineering</a></li>
              <li><a class="dropdown-item" href="plant.php">plant Science </a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="animal.php"> Animal Science</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="contact us.php" tabindex="-1" aria-disabled="true"></a>
          </li>
        </ul>
        <a class="nav-link active" class="d-flex justify-content-center justify-lg-right p-2 border-bottom"
          class="btn btn-white px-2 pl-2 mt-3" aria-current="page" href="login.php" type="login"><button>login
            page</button></a>
      </div>
    </div>
  </nav>
navbar end-->





    <div class="container login-container">
        <div class="row">
            <h4><?php echo $msg?></h4>
        </div>
        <div class="row">

            <div class="col-md-6 login-form-3">
                <h3>ADMIN LOGIN</h3>
                <form action="loginadmin_server_page.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $ademailmsg?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $adpasdmsg?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <!-- <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                        </div> -->
                </form>
            </div>
            <div class="col-md-6 login-form-1">
                <h3>STUDENT LOGIN</h3>
                <form action="login_server_page.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $emailmsg?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $pasdmsg?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>