<?php
require("require.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backstore Home</title>
    <link rel="stylesheet" href="../css/p7-p12.css">
    <script src="../scripts/backstore-user.js"></script>
</head>
<body>
    <div id="main-container">
        <header id="main-header">
            <!--<img src="pear.png"  style="float: left; padding-right: 1em;">-->
            Back Store - Home
        </header>

        <nav>
            <ul>
                <li><a href="p7.php">Product list</a></li>
                <li><a href="p9.php">User list</a></li>
                <li><a href="p11.php">Order list</a></li>
                <li><a href="../index.php">Main site</a></li>
            </ul>
            <form method="post">
                <input type="submit" name="logout" value="Log out" class="logout-button" />
            </form>
        </nav>
        
        

        <div id="main-block">
            <br/>
            Welcome to the backstore. What do you want to do?
            <br/><br/>
            <a href="p7.php">Go to product list</a><br/><br/>
            <a href="p9.php">Go to user list</a><br/><br/>
            <a href="p11.php">Go to order list</a><br/><br/>
            <a href="../index.php">Return to main site</a><br/><br/>
        </div>
        <footer>
            <a href="#main-header">Back to top</a>
        </footer>
    </div>

</body>
</html>