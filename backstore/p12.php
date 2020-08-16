<!DOCTYPE html>
<html lang="en">
<?php
global $edit_mode, $id, $order, $customerid, $datec, $datem, $fname, $lname, $email, $phonenum, $orderdesc;
$edit_mode = false;
if(isset($_GET['edit'])){
    $edit_mode=true;
    $id=$_GET["selectedorder"];
    $orderlist=simplexml_load_file("orderlist.xml") or die("Error: cannot load orderlist.xml");

    foreach($orderlist->children() as $order){
        if($order->id == $id){
            $ordernum = $order->name;
            $customerid = $order->customerid;
            $datec = $order->datec;
            $datem = $order->datem;
            $fname = $order->fname;
            $lname = $order->lname;
            $email = $order->email;
            $phonenum = $order->phonenum;
            $orderdesc = $order->orderdesc;
            
            break;
        }
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Order</title>
    <link rel="stylesheet" href="../css/p7-p12.css">
    <script src="../scripts/backstore-user.js"></script>
</head>

<body>
    <div id="main-container">


        <header id="main-header">
            Back Store - Add/Edit Order
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
            <h2>Add/Edit Order</h2>
            Enter order information below:<br>
            <form action="addorder.php" class="form-large" method="POST" enctype="multipart/form-data">
            <div class="required-fields">
                    <i>* required fields</i>
                </div>
            <?php
                if($edit_mode){
                    echo"<div class=\"form-container\">
                    <label for=\"id\">ID:</label><br>
                    <input type=\"text\" name=\"id\" id=\"id\" class=\"inputbox\" size=\"6\" value=\"$id\" readonly><br>
                </div>
                <div class=\"clr\"></div>";
                }
                

            ?>
                
                
                <div class="form-container">
                    <label for="ordernum">Order Number</label><br>
                    <input type="text" name="ordernum" id="ordernum" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$ordernum\""); ?> required><br>
                   
                </div>
                <div class="form-container">
                    <label for="userid">Customer ID</label><br>
                    <input type="text" name="userid" id="userid" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$userid\""); ?> required><br>
                </div>
                <div class="clr"></div>
                <div class="form-container">
                    <label for="datec">Date created</label><br>
                    <input type="text" name="datec" id="datec" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$datec\""); ?> required><br>
                </div>
                <div class="form-container">
                    <label for="datem">Date last modified</label><br>
                    <input type="text" name="datem" id="datem" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$datem\""); ?> required><br>
                </div>
                <div class="clr"></div>
                <div class="form-container">
                    <label for="fname">*First name</label><br>
                    <input type="text" name="fname" id="fname" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$fname\""); ?> required><br>
                </div>
                <div class="form-container">
                    <label for="lname">*Last name</label><br>
                    <input type="text" name="lname" id="lname" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$lname\""); ?> required><br>
                </div>
                <div class="form-container">
                    <label for="email">E-mail</label><br>
                    <input type="text" name="email" id="email" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$email\""); ?> required><br>
                </div>
                <div class="form-container">
                    <label for="phonenum">*Contact phone number</label><br>
                    <input type="text" name="phonenum" id="phonenum" class="inputbox" size="30" <?php if ($edit_mode) echo("value=\"$phonenum\""); ?> required><br>
                </div>
                <div class="clr"></div>
                <div class="textarea-container">
                    <label for="orderdesc">Order Note</label><br>
                    <textarea style="height: 4em;" type="text" name="orderdesc" id="orderdesc" class="inputbox"size="30" <?php if ($edit_mode) echo("value=\"$phonenum\""); ?> required>example</textarea>
                    </div>

                
                <div class="clr"></div>
                <div class="clr"></div>
                <!-- Responsive Table -->
             
                
                    <input type="submit" value="Save" class="button">
                </form>
                <div class="table-overflow">
                    <table>
                        <!-- Button Add Row  -->
                        <i
                                class="button" value="Save"> ADD</i></button>
                        <tr>
                            <th scope="col"> Products </th>
                            <th scope="col"> Quantity </th>
                            <th scope="col"> Action </th>
                        </tr>
                        <tr>
                            <div contenteditable>
                                <td>
                                    <div contenteditable>Paramount Citrus Navel Oranges</div>
                                </td>
                                <td>
                                    <div contenteditable>8 boxes</div>
                                </td>
                                <td>
                                    <!-- Call to action button -->
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="">
                                            DELETE</i></button>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <td>
                                <div contenteditable>Ristorante Frozen Pepperoni Pizza</div>
                            </td>
                            <td>
                                <div contenteditable>2 boxes</div>
                            </td>
                            <td>
                                <!-- Call to action button -->
                                <button type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="">
                                        DELETE</i></button>
                            </td>
                        </tr>
                    </table>
                </div>
                <br /> <br /><br />
                To add a order, enter a new product name and fill all the inputs <br>
                To edit a order, enter the changes in the order note section <br>
                To delete a order, leave everything blank and save it <br>
                

            
            <div class="clr"></div>
            <a href="p11.php">Return to order list without saving</a>
        </div>
        <footer>
            <a href="p12.html#main-header">Back to top</a>
        </footer>
    </div>
</body>

</html>