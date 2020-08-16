<!--
    P3 - Product page description
    Shi Qi Zhou - 40163947
-->
<?php $id = 1; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/p3.css">
    <title>Bananas</title>
    <script src="../scripts/product-descriptions.js"></script>
</head>

<?php
$productlist = simplexml_load_file("../backstore/productlist.xml") or die("Error: cannot load productlist.xml");
foreach ($productlist->children() as $product) {
    if ($product->id == $id) {
        $name = $product->name;
        $aisle = $product->aisle;
        $price = $product->price;
        $weight = $product->weight;
        $unit = $product->unit;
        $productdesc = $product->productdesc;
        $imagepath = $product->imagepath;
        $types = $product->types;
        break;
    }
}
echo '<body onload="updateSubtotal(' . $price . ')">';
echo '<header>
    <div class="product-name-header">Product Description - ' . $name . '</div>';
echo '</header>';
echo '<nav>
    <ul>
        <li><a href="../index.php">Home Page</a></li>
        <li><a href="../aisles/' . $aisle . '.php">Return to Aisle</a></li>
        <li><a href="../shopping-cart/index.php">Shopping Cart</a></li>
    </ul>
    <div class="register-log-in">
        <a href="../user/register.php"><button class="user-button" type="button" name="user-button">Register</button></a>
        <a href="../user/login.php"><button class="user-button" type="button" name="login-button">Log In</button></a>
    </div>
</nav>';
echo '<div class="description">
    <div class="image">
        <img src="' . $imagepath . '" alt="' . $name . '" width="200px" height="200px" />
    </div>
    <h2>' . $name . '</h2>
    <p>' . $price . '$/' . $unit . '</p>
    <p>Weight: ' . $weight . '</p>
    <h3>Product Description</h3>
    <p>' . $productdesc . '</p>
    <button class="addtocart" type="button" name="moredesc-button" onClick="toggleDescription()">More
            description</button><br><br>
        <div id="long-desc" style="display:none">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel consectetur sunt fuga commodi ratione saepe
            quaerat. Quod modi nesciunt earum hic, eligendi esse vitae quis velit quisquam autem mollitia ea? Lorem
            ipsum, dolor sit amet consectetur adipisicing elit. Beatae vero earum ut perspiciatis dolores sapiente
            inventore pariatur facilis! Unde deleniti hic autem error molestias vel illum nostrum reprehenderit
            atque debitis.
        </div>
        <br />';
?>
<form action="../shopping-cart/shopping-cart.php" method="POST">
    <input type="hidden" name="addtocart[pid]" value=<?= $id ?> />
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="addtocart[qty]" min="1" value=1 size="2" onchange="updateSubtotal(<?= $price ?>)">
    <label for="type">Type:</label>
    <select id="type" name="addtocart[type]">';
        <?php
        $index = 0;
        foreach ($types->children() as $type) {
            echo "<option value=$index>$type</option>";
            $index++;
        }
        ?>
    </select>
    Subtotal: <span id="subtotal"></span>
    <div class="addtocartposition">
        <button class="addtocart" type="submit">Add to Cart</button>
    </div>
</form>
</div>
<footer></footer>
</body>

</html>