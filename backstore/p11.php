<!--
    P11 -  order list  profile
    Noor Hammodi - 40061760
-->
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
                <li><a href="p7.html">Product list</a></li>
                <li><a href="p9.php">User list</a></li>
                <li><a href="p11.html">Order list</a></li>
                <li><a href="../index.html">Main site</a></li>
            </ul>
            <a href="../index.html"><button class="logout-button" type="button" title="logout">Log out</button></a>
        </nav>
        
        

        <div id="main-block">
            <h2>Order List</h2>
            Select an order:
            <br><br>
            <form action="p12.php" method="GET">
                <div class="table-overflow">
                    <table>
                        <tr>
                            <th>Order Number</th>
                            <th>Customer's id</th>
                            <th>Date created</th>
                            <th>Date modified</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Order note </th>
                        </tr>
                        <?php
                        $orderlist=simplexml_load_file("orderlist.xml") or die("Error: cannot load orderlist.xml");
                        foreach($orderlist->children() as $order){
                            echo "<tr>";
                            echo "<td><label for=\"$order->id\"><input type=\"radio\" name=\"selectedOrder\" id=\"$order->id\" value=\"$order->id\" onclick=\"enableBtns()\" />$order->id</label></td>";
                            echo "<td>$order->ordernum</td>";
                            echo "<td>$order->customerid</td>";
                            echo "<td>$order->datec</td>";
                            echo "<td>$order->datem</td>";
                            echo "<td>$order->fname</td>";
                            echo "<td>$order->lname</td>";
                            echo "<td>$order->email</td>";
                            echo "<td>$order->phonenum</td>";
                            echo "<td>$order->orderdesc</td>";
                            echo "</tr>";
                        ?></table>
                       <!-- 
                        <tr>
                            <td>
                                <label for="row1"><input type="radio" name="selectedOrder" id="row1" /> 000123</label>
                            </td>
                            <td>John Smith</td>
                            <td><ul>
                                <li>2 Lettuces</li>
                                <li>1 FireCracker Popsicle</li>
                            </ul></td>
                            <td> deliver to shipping address </td>
                            <td><em> **Please drop off at the door</em></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="row2"><input type="radio" name="selectedUser" id="row2" /> 000456</label>
                            </td>
                            <td>Jane Doe</td>
                            <td><ul>
                                <li>4 Ground Beef</li>
                                <li>2 Bananas</li>
                                <li>8 Ben&Jerry's Ice Cream</li>
                            </ul></td>
                            <td>pickup at the store</td>
                            <td><em>**Please put the ice cream in different bag</em></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="row3"><input type="radio" name="selectedUser" id="row3" /> 000789</label>
                            </td>
                            <td>Bob Loblaw</td>
                            <td><ul>
                                <li>2 Baguettes</li>
                                <li>5 Chips</li>
                                <li>1 Ben&Jerry's Ice Cream</li>
                                <li>5 Cheesedips
                                </li>
                            </ul></td>
                            <td>deliver to shipping address</td>
                            <td><em>**Please ring dorbell</em></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="row4"><input type="radio" name="selectedUser" id="row4" /> 0000123</label>
                            </td>
                            <td>John Doe</td>
                            <td><ul>
                                <li>10 Tortillas</li>
                                <li>10 Ground Beef</li>
                                <li>15 Chips</li>
                                <li>7 Cheesedips
                                </li>
                            <li>
                                3 Lettuces
                            </li>
                        <li>1 FireCracker Popsicle</li></td>
                            <td>deliver to shipping address</td>
                            <td><em>**Please drop off at door</em></td>
                        </tr>
                   </table> -->
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