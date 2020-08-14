<!--
    P2 - AISLE PAGE
    Noor Hammodi - 40061760
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/p2.css">
    <title>Frozen</title>
</head>

<body>
    <header id="main-header">
        <img id="logo" class="img-fluid" src="../images/logo.png" alt="logo" />
        <img id="slogan" class="img-fluid" src="../images/slogan.png" alt="slogan" />
    </header>
    <div class="page-header">
        Online Groceries
    </div>
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.html">Home Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../aisles/frozen.php">Return to Aisle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../shopping-cart/index.html">Shopping Cart</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../user/register.html">
                    <button class="user-button" type="button" name="user-button">
                    Register
                    </button>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/login.html">
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
    <div class="container-fluid">
        <h1>Frozen</h1><br/>
        <div class="row container">
            <div class="col-md-3 col-sm-12">
                <div class="menu ">
                    <ul class="list-unstyled">
                        <a href="fruits-vegetables.php">
                            <li>Fruits & Vegetables</li>
                        </a>
                        <a href="meat-poultry.php">
                            <li>Meat & Poultry</li>
                        </a>
                        <a href="bread.php">
                            <li>Bread</li>
                        </a>
                        <a href="snacks.php">
                            <li>Snack</li>
                        </a>
                        <a href="frozen.php">
                            <li>Frozen</li>
                        </a>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-sm-12">
                <div class="card-deck">
                <?php
                    $productlist=simplexml_load_file("../backstore/productlist.xml") or die("Error: cannot load userlist.xml");
                    foreach($productlist->children() as $product){
                        if($product->aisle=="frozen"){
                            echo '<div class="card">';
                            echo '<img class="card-img-top" src="'.$product->imagepath.'" alt="'.$product->name.'">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$product->name.'</h5>';
                            echo '<p class="card-text">';
                            echo 'Sold in unit';
                            echo '</p>';
                            echo '<h5 class="card-bold ">'.$product->price.' $</h5>';
                            echo '<a href="'.$product->productpage.'" class="stretched-link"></a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <a href="frozen.html#main-header">Back to top</a>
    </footer>

</body>

</html>