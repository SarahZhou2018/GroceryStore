<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheese Dip</title>
    <link rel="stylesheet" href="../css/p3.css">
    <script src="../scripts/product-descriptions.js"></script>
</head>
<?php
    $productlist=simplexml_load_file("../backstore/productlist.xml") or die("Error: cannot load productlist.xml");
    $id=0003;
    foreach($productlist->children() as $product){
        if($product->id == $id){
            $name=$product->name;
            $aisle=$product->aisle;
            $price=$product->price;
            $unit=$product->unit;
            $weight=$product->weight;
            $productdesc=$product->productdesc;
            $imagepath=$product->imagepath;
            $types=$product->types;
            break;
        }
    }
    echo '<body onload="updateSubtotal('.$price.')">';
    echo '<header>
    <div class="product-name-header">Product Description - '.$name.'</div>';
    echo '</header>';
    echo '<nav>
    <ul>
        <li><a href="../index.html">Home Page</a></li>
        <li><a href="../aisles/'.$aisle.'.php">Return to Aisle</a></li>
        <li><a href="../shopping-cart/index.html">Shopping Cart</a></li>
    </ul>
    <div class="register-log-in">
        <a href="../user/register.html"><button class="user-button" type="button" name="user-button">Register</button></a>
        <a href="../user/login.html"><button class="user-button" type="button" name="login-button">Log In</button></a>
    </div>
</nav>';
    echo '<div class="description">
    <div class="image">
        <img src="'.$imagepath.'" alt="'.$name.'" width="200px" height="200px" />
    </div>
    <h2>'.$name.'</h2>
    <p>'.$price.'$/'.$unit.'</p>
    <p>Weight: '.$weight.'</p>
    <h3>Product Description</h3>
    <p>'.$productdesc.'</p>
    <button class="addtocart" type="button" name="moredesc-button" onClick="toggleDescription()">More
            description</button><br><br>
        <div id="long-desc" style="display:none">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel consectetur sunt fuga commodi ratione saepe
            quaerat. Quod modi nesciunt earum hic, eligendi esse vitae quis velit quisquam autem mollitia ea? Lorem
            ipsum, dolor sit amet consectetur adipisicing elit. Beatae vero earum ut perspiciatis dolores sapiente
            inventore pariatur facilis! Unde deleniti hic autem error molestias vel illum nostrum reprehenderit
            atque debitis.
        </div>
        <br />

    <form action="../shopping-cart/index.html">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" value=1 size="2" onchange="updateSubtotal(3.99)">
        <label for="type">Type:</label>
        <select id="type" name="type">';
    foreach($types->children() as $type){
        echo "<option>$type</option>";
    }
    echo '</select>
        Subtotal: <span id="subtotal"></span>
        <div class="addtocartposition">
            <a href="../shopping-cart/index.html"><button class="addtocart" type="button" name="addtocart-button">Add to Cart</button></a>
        </div>
    </form>
</div>

<footer></footer>

</body>';
    
?>
</html>