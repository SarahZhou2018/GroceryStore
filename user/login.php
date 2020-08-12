<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log In to Online Grocery Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
  </head>
  <body>

    <?php

      if (isset($_POST['email'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $validEntry = false;

        $userlist=simplexml_load_file("../backstore/userlist.xml") or die("Error: cannot load userlist.xml");

        foreach ($userlist->children() as $user) {
          // Checking for username
          if($user->email == $email) {
            // Checking for password
            if($user->password == $password) {
              $validEntry = true;
            }
          }
        }

        if(!$validEntry) {
          echo '<div id="error" class="alert alert-danger" role="alert"><strong>ERROR: </strong> Email or Password is/are incorrect.</div>';
        } else {
          echo '<div id="error" class="alert alert-success" role="alert"><strong>SUCCESS: </strong> You are now logged in.</div>';
          echo "<script type='text/javascript'>document.location.href='../index.html';</script>";
        }

      }

     ?>


    <div class="row logo">
      <div class="images">
        <img src="../images/logo.png" width="80px" height="80px">
        <img src="../images/slogan.png" width="550px" height="80px">
      </div>
    </div>

    <div class="navbar">
      <h3>Log In</h3>
      <a href="../index.html">Home Page</a>
      <a href="#"></a>
    </div>

    <div class="container-fluid">
      <form action="login.php" method="post">

        <label for="email">Email</label>
        <input required class="form-control" type="text" name="email" placeholder="Ex: John.Michael@gmail.com" email>

        <label for="password">Password</label>
        <input required class="form-control" type="password" name="password" placeholder="Password" password>

        <button class="btn btn-primary" type="submit">Log In</button>
        <a class="forgotPassword" href="#">Forgot password</a>

      </form>
    </div>

  </body>
</html>
