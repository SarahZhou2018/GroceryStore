<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log In to Online Grocery Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register.css">
  </head>
  <body>

    <div class="row logo">
      <div class="images">
        <img src="../images/logo.png" width="80px" height="80px">
        <img src="../images/slogan.png" width="550px" height="80px">
      </div>
    </div>

    <div class="navbar">
      <h3>Register</h3>
      <a href="../index.php">Home Page</a>
      <a href="#"></a>
    </div>

    <div class="container-fluid">
      <form class="" action="../backstore/adduser.php" method="post">
        <div class="row">

          <div class="col-xl-6 col-sm-12">
            <label for="fname">First Name</label>
            <input required class="form-control" type="text" name="fname" placeholder="First Name">

            <label for="phone">Phone Number</label>
            <input required class="form-control" type="text" name="phone" placeholder="(999)-999-9999" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">

            <label for="password">Password</label>
            <input required class="form-control" type="password" name="password" placeholder="Password" password>

            <label for="postalcode">Postal Code</label>
            <input required class="form-control" type="text" name="postalcode" placeholder="A9A 9A9" pattern="[a-zA-Z][0-9][a-zA-Z] *[0-9][a-zA-Z][0-9]">

          </div>

          <div class="col-xl-6 col-sm-12">
            <label for="lname">Last Name</label>
            <input required class="form-control" type="text" name="lname" placeholder="Last Name">

            <label for="email">Email</label>
            <input required class="form-control" type="text" name="email" placeholder="Ex: John.Michael@gmail.com" email>

            <label for="confirmpassword">Confirm Password</label>
            <input required class="form-control" type="password" name="confirmpassword" placeholder="Password" password>

            <label for="subscribeToMailingList">Subscribe To Mailing List?</label>
            <br>
            <input type="checkbox" name="marketinglist" id="marketinglist">
            <!-- <select class="form-control" name="">
              <option value="true">Yes</option>
              <option value="false">No</option>
            </select> -->

          </div>

          <div class="col-xl-12 col-sm-12">
            <a href="../index.php"><button class="btn btn-primary" type="submit" name="button">Register</button></a>
          </div>

        </div>
      </form>
    </div>

  </body>
</html>
