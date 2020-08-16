<!--
    P1 - HOME PAGE
    Noor Hammodi - 40061760
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Foodsy - Home</title>
    <link rel="stylesheet" href="css/p1.css">
</head>

<body style="background-color:#29D9C2;">

    <div id="logo">
        <img src="images/logo.png" width="180" height="180" style="float:left;">
    </div>

    <div class="header">

        <div class="header-right">

            <div class="dropdown">
                <button class="dropbtn">Aisles</button>
                <div class="dropdown-content">
                    <a href="aisles/meat-poultry.php">Aisle 1-Meat</a>
                    <a href="aisles/snacks.php">Aisle 2-Snack</a>
                    <a href="aisles/bread.php">Aisle 3-Bread</a>
                    <a href="aisles/fruits-vegetables.php">Aisle 4-Fruits & Vegetables</a>
                    <a href="aisles/frozen.php">Aisle 5-Frozen</a>
                </div>
            </div>
        </div>

    </div>
    <div class="welcome">
        <h1><b><u> WELCOME TO OUR STORE!</u></b></h1>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shopping-cart/index.php">Shopping cart</a></li>
            <li><a href="user/login.php">Log in</a></li>
            <li><a href="user/register.php">Sign up</a></li>
        </ul>
    </nav>

    <div class="alert">
        <img src="images/alert.png" alt="alert" width="200 " height="115" style="text-align: center;">

        <h1>Alert! </h1>
        <p>COVID-19</p>
        <p> Thank you for choosing us. Rest assured that we continue to take every precaution necessary to maintain a
            high-quality, safe service.</p>

    </div>



    <div class="title">
        <h2><u>Check out our deals this week!</h2></u>
    </div>
    <div class="row">
        <div class="column">
            <p>
            <h3>Grounded Beef</p>
            </h3>

            <img src="images/beef.jpg" alt="beef" style="width:60%">
            <p>
            <h2> Price: <del>15.99$</del> 8.99$</h2>
            </p>
            <a href="product-descriptions/groundbeef.php">
                <img src="images/add.png" alt="add to cart" style="width:50%">
            </a>
        </div>
        <div class="column">
            <p>
            <h3>Fresh Lettuce</p>
            </h3>
            <img src="images/lettuce.jpeg" alt="green lettuce" style="width:80%">
            <p>
            <h2> Price: <del>7.99$</del> 5.00$</h2>
            </p>
            </article>
            <a href="product-descriptions/lettuce.php">
                <img src="../images/add.png" alt="add to cart" style="width:50%">
            </a>
        </div>
        <div class="column">
            <p>
            <h3>Bananas</p>
            </h3>
            <img src="images/banana.jpg" alt="Real bananas" style="width:80%">
            <p>
            <h2> Price: <del>3.99$</del> 1.99$</h2>
            </p>
            </article>
            <a href="product-descriptions/banana.php">
                <img src="images/add.png" alt="add to cart" style="width:50%">
            </a>
        </div>
    </div>
    <div class="subtitle">
        <h2><u>Special Summer Treats!</h2></u>
    </div>


    <div class="rows">


        <a href="aisles/frozen.php">
            <img src="images/summertreats.jpg" alt="icecream" style="width: 100%;">
        </a>
    </div>


    <div class="footer">
        <p>Author: The Store</p>
        <p>thestore@store.com</p>
    </div>




</body>

</html>
