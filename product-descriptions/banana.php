<!--
    P3 - Product page description
    Shi Qi Zhou - 40163947
-->
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/p3.css">
    <title>Bananas</title>
    <script src="../scripts/product-descriptions.js"></script>
</head>


<body onload="updateSubtotal(1.99)">
    <header>
        <div class="product-name-header">
            Product Description - Bananas
        </div>

    </header>
    <nav>
        <ul>
            <li><a href="../index.html">Home Page</a></li>

            <li><a href="../aisles/fruits-vegetables.html">Return to Aisle</a></li>

            <li><a href="../shopping-cart/index.html">Shopping Cart</a></li>
        </ul>
        <div class="register-log-in">
            <a href="../user/register.html"><button class="user-button" type="button" name="user-button">Register</button></a>
            <a href="../user/login.html"><button class="user-button" type="button" name="login-button">Log
                    In</button></a>
        </div>
    </nav>


    <div class="description">
        <div class="image">
            <img src="../images/banana.jpg" alt="Bananas" width="200px" height="200px" />
        </div>
        <h2>Bananas</h2>
        <p>1.99$/lb</p>
        <p>Weight: 190g avg.</p>
        <h3>Product Description</h3>
        <p>Product of Costa Rica, Ecuador or Guatemala. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel
            co.<br /></p>

        <button class="addtocart" type="button" name="moredesc-button" onClick="toggleDescription()">More
            description</button><br><br>
        <div id="long-desc" style="display:none">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel consectetur sunt fuga commodi ratione saepe
            quaerat. Quod modi nesciunt earum hic, eligendi esse vitae quis velit quisquam autem mollitia ea? Lorem
            ipsum, dolor sit amet consectetur adipisicing elit. Beatae vero earum ut perspiciatis dolores sapiente
            inventore pariatur facilis! Unde deleniti hic autem error molestias vel illum nostrum reprehenderit atque
            debitis.
        </div>
        <br />

        <form action="../shopping-cart/addtocart.php" method="POST">
            <input type="hidden" name="addtocart[pid]" value="0001" />
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="addtocart[qty]" min="1" value=1 size="2" onchange="updateSubtotal(1.99)">
            <label for="type">Type:</label>
            <select id="type" name="addtocart[type]">
                <option value="0">Organic</option>
                <option value="1">Regular</option>
            </select>
            Subtotal: <span id="subtotal"></span>
            <div class="addtocartposition">
                <button class="addtocart" type="submit">Add to Cart</button>
            </div>
        </form>
    </div>
    </div>
    <footer></footer>
</body>

</html>