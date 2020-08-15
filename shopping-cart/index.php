<!--
    P4 - Shopping Cart Page
    Shi Qi Zhou - 40163947
-->

<?php session_start();
// print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/p4.css">
    <title>Shopping Cart</title>
    <script src="../scripts/adjust-item-quantity.js"></script>
    <script src="../scripts/shopping-cart.js"></script>
    <script src="../scripts/total.js"></script>
</head>

<body>
    <header id="main-header">
        <img id="logo" class="img-fluid" src="../images/logo.png" alt="logo" />
        <img id="slogan" class="img-fluid" src="../images/slogan.png" alt="slogan" />
    </header>
    <div class="page-header">
        Your Shopping Cart
        <img src="../images/shopping_cart.png" alt="shopping cart icon" />
    </div>
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../aisles/fruits-vegetables.php">Return to Aisle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../shopping-cart/index.php">Shopping Cart</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../user/register.php">
                    <button class="user-button" type="button" name="user-button">
                        Register
                    </button>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/login.php">
                    <button class="user-button" type="button" name="login-button">
                        Log In
                    </button>
                </a>
            </li>
        </ul>
    </nav>

    <div class="banner">
        <marquee behavior="scroll" direction="left">
            <h6><b>FREE DELIVERY FOR ORDERS ABOVE 30 $</b></h6>
        </marquee>
    </div>
    <div class="row">
        <!-- Left side -->
        <div class="col-md-6 col-sm-12">
            <div class="item-block" id="item-block">
                <header id="cart-totalcount">
                    Your Items
                </header>
                <span></span><span></span><br />
                <!-- Detailed Illustrataded Table -->
                <div id="table1">
                    <table class="table-responsive" id="itemtable">

                        <!-- Row 0 -->
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Type</th>
                            <th></th>
                        </tr>

                        <!-- Rows-->
                        <?php foreach ($_SESSION["cart"] as $id => $product) : ?>
                            <tr>
                                <td>
                                    <p><?= $product["name"] ?></p>
                                    <img src=<?= $product["imagePath"] ?> alt="Romaine Lettuce">
                                </td>
                                <td>
                                    <?= $product["price"] . " $/" . $product["unit"] ?>
                                </td>
                                <td>
                                    <?= $product["qty"] ?>
                                </td>
                                <td>
                                    <select id="type" name="type">
                                        <?php foreach ($product["arrType"] as $index => $type) : ?>
                                            <option <?= $index == $product["type"] ? "selected='selected'" : "" ?> value="<?= $index ?>">
                                                <?= $type ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <!-- Quantity +/- buttons -->
                                    <!-- <input type="hidden" name="qtyminus" /> -->
                                    <button type="submit" data-toggle="tooltip" id="iconButton" data-placement="top" title="remove" onclick="handleOnClickQtyChange(this, 'minus','<?= $id ?>')">
                                        <img id="icon" src="../images/buttons/minus.png"></button>
                                    <!-- <input type="hidden" name="qtyplus" /> -->
                                    <button type="submit" data-toggle="tooltip" id="iconButton" data-placement="top" title="add" onclick="handleOnClickQtyChange(this, 'plus','<?= $id ?>')">
                                        <img id="icon" src="../images/buttons/plus.png"></button>
                                </td>
                                <td>
                                    <!-- <input type="hidden" name="deleteFromCart" value=/> -->
                                    <button type="submit" onclick="handleOnClickQtyChange(this, 'delete','<?= $id ?>')" class="deletebtn">DELETE</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <span></span>

            </div>
            <!-- Bottom Buttons -->
            <input class="button" onclick="handleOnClickReset()" name="reset" value="Reset Cart" readonly>
            <input class="button" onclick="backToPrevPage()" name="continueShop" value="Continue Shopping" readonly>

        </div>

        <!-- Right side -->
        <div class="col-md-6 col-sm-12">
            <div class="summary-block" id="summary-block">
                <header>
                    Order Summary
                </header>
                <span></span><span></span><br />
                <!-- Order Summary Table -->
                <div id="table2">
                    <table class="table-responsive" id="mytable">
                    </table>
                    <span></span>
                    <!-- Total Table -->
                    <table id="total">
                        <tr>
                            <td>Sub Total</td>
                            <td id="right"></td>
                            <td id="right" class="subtotal">38.96 $</td>
                        </tr>
                        <tr>
                            <td>Delivery Fee</td>
                            <td id="right"></td>
                            <td id="right" class="deliveryFee">0.00 $</td>
                        </tr>
                        <tr>
                            <td>GST Tax</td>
                            <td id="right"></td>
                            <td id="right" class="GST">0.00 $</td>
                        </tr>
                        <tr>
                            <td>QST</td>
                            <td id="right"></td>
                            <td id="right" class="QST">0.00 $</td>
                        </tr>
                    </table>
                    <span></span>
                    <!-- Grand Total Table -->
                    <table id="total">
                        <tr>
                            <td>Grand Total</td>
                            <td id="right"></td>
                            <td id="right" class="grandTotal">38.96 $</td>
                        </tr>
                    </table>
                </div>
                <span></span>
            </div>

            <!-- Bottom Buttons -->
            <form action="shopping-cart.php" method="GET">
            <input class="button" id="pay" type="submit" name="checkout" value="Checkout" readonly>
            </form>
        </div>
    </div>
    <br /><br /><br />
    <footer>
        <a href="./index.php#main-header">Back to top</a>
    </footer>
</body>

</html>