<!--
    P9 - User list page
    Georges Grondin - 40034160
-->

<?php
require("require.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="../css/p7-p12.css">
    <script src="../scripts/backstore-user.js"></script>
</head>
<body>
    <div id="main-container">
        <header id="main-header">
            <!--<img src="pear.png"  style="float: left; padding-right: 1em;">-->
            Back Store - User List
        </header>

        <nav>
            <ul>
                <li><a href="p7.php">Product list</a></li>
                <li><a href="p9.php">User list</a></li>
                <li><a href="p11.html">Order list</a></li>
                <li><a href="../index.html">Main site</a></li>
            </ul>
            <form method="post">
                <input type="submit" name="logout" value="Log out" class="logout-button" />
            </form>
        </nav>
        
        

        <div id="main-block">
            <h2>User List</h2>
            Select a user:
            <br><br>
            <form action="p10.php" method="GET">
                <div class="table-overflow">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone #</th>
                            <th>Email</th>
                        </tr>
                        <?php
                            $userlist=simplexml_load_file("userlist.xml") or die("Error: cannot load userlist.xml");
                            foreach($userlist->children() as $user){
                                echo "<tr>";
                                echo "<td><label for=\"$user->id\"><input type=\"radio\" name=\"selectedUser\" id=\"$user->id\" value=\"$user->id\" onclick=\"enableBtns()\" />$user->id</label></td>";
                                echo "<td>$user->fname</td>";
                                echo "<td>$user->lname</td>";
                                echo "<td>$user->phone</td>";
                                echo "<td>$user->email</td>";
                                echo "</tr>";

                            }
                        ?>
                        
                    </table>
                </div>
                <br>
                <input type="submit" value="Add" name="add" class="button">
                <input type="submit" value="Delete" name="delete" class="button" id="deleteButton" formaction="deleteuser.php" disabled>
                <input type="submit" value="Edit" name="edit" id="editButton" class="button" disabled> 
                
            </form>
            <br>

        </div>
        <footer>
            <a href="#main-header">Back to top</a>
        </footer>
    </div>

</body>
</html>
