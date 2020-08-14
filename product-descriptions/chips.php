<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chips</title>
    <link rel="stylesheet" href="../css/p3.css">
    <script src="../scripts/product-descriptions.js"></script>
</head>

<body onload="updateSubtotal(1.69)">
    <header>
        <div class="product-name-header">
            Product Description - Chips
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="../index.html">Home Page</a></li>
            <li><a href="../aisles/snacks.php">Return to Aisle</a></li>
            <li><a href="../shopping-cart/index.html">Shopping Cart</a></li>
        </ul>
        <div class="register-log-in">
            <a href="../user/register.html"><button class="user-button" type="button" name="user-button">Register</button></a>
            <a href="../user/login.html"><button class="user-button" type="button" name="login-button">Log In</button></a>
        </div>
    </nav>


    <div class="description">
        <div class="image">
            <img src="../images/lays.jpg" alt="Chips" width="200px" height="200px" />
        </div>
        <h2>Chips</h2>

        <!--<p>Product ID: 2120145</p>
          <p>Name: Lay's Chips</p>-->
        <p>1.69$/each</p>
        <p>Weight: 66g</p>
        <!--<p>Weight/Volume: 0.0212g/cm^3</p>
          <p>Origin: USA</p>
          <p>Brand: Lay's</p>-->
        <h3>Product Description</h3>
        <p>Lay’s chips brings the crispy bite you love from your favorite Lay’s potato chip with the delicious secret combinations. This product is sure to deliver a kick and flavor at any moment given!</p>

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
            <input type="number" id="quantity" name="quantity" min="1" value=1 size="2" onchange="updateSubtotal(1.69)">
            <label for="type">Type:</label>
            <select id="type" name="type">
                <option>Classic</option>
                <option>BBQ</option>
                <option>Onions and Cheese</option>
                <option>Ketchup</option>
                <option>Salt and Vinegar</option>
            </select>
            Subtotal: <span id="subtotal"></span>
            <div class="addtocartposition">
                <a href="../shopping-cart/index.html"><button class="addtocart" type="button" name="addtocart-button">Add to Cart</button></a>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <footer></footer>

</body>

</html>