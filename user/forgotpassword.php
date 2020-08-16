<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log In to Online Grocery Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/forgotpassword.css">
  </head>
  <body>

    <?php
    if (isset($_POST['email'])) {

      $passwordDontMatch = false;
      $emailExists = false;
      $email = $_POST['email'];
      $newPassword = $_POST['newPassword'];
      $newConfirmPassword = $_POST['newConfirmPassword'];
      $emailFieldIsEmpty = true;

      $userlist=simplexml_load_file("../backstore/userlist.xml") or die("Error: cannot load userlist.xml");

      foreach ($userlist->children() as $user) {
        if($user->email == $email) {
          $emailFieldIsEmpty = false;
        }
      }

      if($newPassword == $newConfirmPassword) {
        $passwordDontMatch = false;
        foreach ($userlist->children() as $user) {
          if($user->email == $email) {
            $emailExists = true;
            $user->password=$newPassword;
            echo "<script type='text/javascript'>document.location.href='./login.php';</script>";
          }
        }
      } else {
        $passwordDontMatch = true;
      }
    }

    //save user list to file//save user list to file
    $userlist_file=fopen("../backstore/userlist.xml","w") or die ("Error: cannot load userlist.xml");
    fwrite($userlist_file,$userlist->asXML());
    fclose($userlist_file);
    file_put_contents("../backstore/userlist.xml", $userlist->saveXML());
     ?>


    <div class="row logo">
      <div class="images">
        <img src="../images/logo.png" width="80px" height="80px">
        <img src="../images/slogan.png" width="550px" height="80px">
      </div>
    </div>

    <div class="navbar">
      <h3>Forgot Password</h3>
      <a href="../index.html">Home Page</a>
      <a href="#"></a>
    </div>

    <div class="container-fluid">
      <form action="forgotpassword.php" method="post">

        <label for="email">Email</label>
        <input required class="form-control" type="text" name="email" placeholder="Ex: John.Michael@gmail.com" email>

        <label for="newPassword">New Password</label>
        <input required class="form-control" type="password" name="newPassword" placeholder="New Password" password>

        <label for="newConfirmPassword">Confirm New Password</label>
        <input required class="form-control" type="password" name="newConfirmPassword" placeholder="Confirm New Password" password>

        <button class="btn btn-primary" type="submit">Log In</button>

      </form>
      <?php
        if (!$emailExists && $emailFieldIsEmpty) {
          echo '<div id="error" class="alert alert-danger" role="alert"><strong>ERROR: </strong> Email does not exist.</div>';
        }
        if ($passwordDontMatch) {
          echo '<div id="error" class="alert alert-danger" role="alert"><strong>ERROR: </strong> Passwords do not match.</div>';
        }
     ?>
    </div>
  </body>
</html>
