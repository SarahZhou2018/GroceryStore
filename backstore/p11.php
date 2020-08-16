<?php
require("require.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" href="../css/p7-p12.css">
    <script src="../scripts/backstore-user.js"></script>
</head>
<body>
    <div id="main-container">
        <header id="main-header">
            
            Back Store - Order List
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
            <h2>Order List</h2>
            Select a order:
            <br><br>
            <form action="p12.php" method="GET">
                <div class="table-overflow">
                    <table>
                        <tr>
                            <th>Order Number</th>
                            <th>Customer ID</th>
                            <th>Date created</th>
                            <th>Date modified </th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email </th>
                            <th>Phone number</th>
                        </tr>
                        <?php
                            $orderlist=simplexml_load_file("orderlist.xml") or die("Error: cannot load orderlist.xml");

                            foreach($orderlist->children() as $order){
                                echo "<tr>";
                                echo "<td><label for=\"$order->id\"><input type=\"radio\" name=\"selectedUser\" id=\"$order->id\" value=\"$order->id\" onclick=\"enableBtns()\" />$order->id</label></td>";
                                //echo "<td>$order->id</td>";
                                echo "<td>$order->customerid</td>";
                                //echo "<td>$order->ordernum</td>";
                                
                                echo "<td>$order->datec</td>";
                                echo "<td>$order->datem</td>";
                                echo "<td>$order->fname</td>";
                                echo "<td>$order->lname</td>";
                                echo "<td>$order->email</td>";
                                echo "<td>$order->phonenum</td>";
                                
                                echo "</tr>";

                            }
                        ?>
                        
                    </table>
                </div>
                <br>
                <input type="submit" value="Add" name="add" class="button">
                <input type="submit" value="Delete" name="delete" class="button" id="deleteButton" formaction="deleteorder.php" disabled>
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
