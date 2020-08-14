<!--
    P7 - Product list
    Ejazali Rezayi - 40101892
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="../css/p7-p12.css">
</head>
<body>

    <div id="main-container">
        <header id="main-header">
            Back Store - User List
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
            <h2>Product List</h2>
            See product list below:<br>
            <?php
                $productlist=simplexml_load_file("productlist.xml") or die("Error: cannot load userlist.xml");
                foreach($productlist->children() as $product){
                    echo '<form action="" class="form-large">';
                    echo '<img src="'.$product->imagepath.'" alt="'.$product->name.'" width="200px" height="200px" style= "float: left; padding-right: 1em;">';
                    echo '<h2>'.$product->name.'</h2>';
                    echo '<p>'.$product->price.'$</p>';
                    echo '<p>'.$product->weight.'</p>';
                    echo '<h3>Product Description</h3>';
                    echo '<p>'.$product->productdesc.'</p>';
                    echo '<a href="p8.html"><input type="button" value="Add" class="button"></a>';
                    echo '<a href="p8.html"><input type="button" value="Delete" class="button"></a>';
                    echo '<a href="p8.html"><input type="button" value="Edit" class="button"></a>';
                    echo '</form>';
                }
            ?>
            <p>End of product list</p>
        </div>
        <footer>
            <a href="p7.html#main-header">Back to top</a>
        </footer>
        
    </div>

</body>
</html>