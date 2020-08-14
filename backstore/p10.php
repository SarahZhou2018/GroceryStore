<!--
    P10 - Edit/add user page
    Georges Grondin - 40034160
-->

<?php
global $edit_mode, $id, $fname, $lname, $email, $phone,  $postalcode, $marketinglist;
$edit_mode = false;
if(isset($_GET['edit'])){
    $edit_mode=true;
    $id=$_GET["selectedUser"];
    $userlist=simplexml_load_file("userlist.xml") or die("Error: cannot load userlist.xml");

    foreach($userlist->children() as $user){
        if($user->id == $id){
            $fname = $user->fname;
            $lname = $user->lname;
            $email = $user->email;
            $phone = $user->phone;
            $postalcode = $user->postalcode;
            $marketinglist = $user->marketinglist;
            break;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit user</title>
    <link rel="stylesheet" href="../css/p7-p12.css">
</head>
<body>
    <div id="main-container">

        <header id="main-header">
            Back Store - Add/Edit User
        </header>

        <nav>
            <ul>
                <li><a href="p7.php">Product list</a></li>
                <li><a href="p9.php">User list</a></li>
                <li><a href="p11.html">Order list</a></li>
                <li><a href="../index.html">Main site</a></li>
            </ul>
            <a href="../index.html"><button class="logout-button" type="button" title="logout">Log out</button></a>
        </nav>
        
        <div id="main-block">
            <h2>Add/Edit User</h2>
            Enter user information below:<br>

            <form action="adduser.php" method="POST" class="form-large">
                <div class="required-fields">
                    <i>* required fields</i>
                </div>
                <?php
                if ($edit_mode){
                    echo "<div class=\"form-container\">
                    <label for=\"id\">ID:</label><br>
                    <input type=\"text\" name=\"id\" id=\"id\" class=\"inputbox\" size=\"6\" value=\"$id\" readonly><br>
                </div>
                <div class=\"clr\"></div>";
                }
                
                ?>
                <div class="form-container">
                    <label for="fname">*First name</label><br>
                    <input type="text" name="fname" id="fname" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$fname\""); ?> required><br>
                </div>
                <div class="form-container">
                    <label for="lname">*Last name</label><br>
                    <input type="text" name="lname" id="lname" class="inputbox" size="30"  <?php if ($edit_mode) echo("value=\"$lname\""); ?> required><br>
                </div>
                <div class="clr"></div>
                <div class="form-container">
                    <label for="email">*E-mail</label><br>
                    <input type="email" name="email" id="email" placeholder="abc@abc.com" size="30"  class="inputbox" <?php if ($edit_mode) echo("value=\"$email\""); ?>  required><br>
                </div>
                <div class="form-container">
                    <label for="phone"></label>Phone number</label><br>
                    <input type="tel" name="phone" id="phone" class="inputbox" maxlength=12 size="12" placeholder="999-999-9999" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" <?php if ($edit_mode) echo("value=\"$phone\""); ?>><br>
                </div>
                <div class="form-container">
                    <label for="postalcode">*Postal code</label><br>
                    <input type="text" name="postalcode" id="postalcode" class="inputbox" maxlength=7 size="7"  placeholder="A9A 9A9" pattern="[a-zA-Z][0-9][a-zA-Z] *[0-9][a-zA-Z][0-9]" <?php if ($edit_mode) echo("value=\"$postalcode\""); ?> required><br>
                </div>

                <div class="clr"></div>
                <div class="form-container">
                    <input type="checkbox" name="marketinglist" id="marketinglist" <?php if ($marketinglist==1 && $edit_mode) echo "checked"; ?>>
                    <label for="marketinglist">Subscribed to special offers</label>
                </div>
                <div class="clr"></div>
                
                
                <input type="submit" value="Save" class="button"> 
            </form>

            <div class="clr"></div>

            <a href="p9.php">Return to user list without saving</a>

        </div>


        <footer>
            <a href="#main-header">Back to top</a>
        </footer>

    </div>
    
</body>
</html>

