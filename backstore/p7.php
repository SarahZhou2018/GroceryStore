<!--
    P7 - Product list
    Ejazali Rezayi - 40101892
-->

<?php
require("require.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../css/p7-p12.css">
</head>
<body>

    <div id="main-container">
        <header id="main-header">
            Back Store - Product List
        </header>

        <nav>
            <ul>
                <li><a href="p7.php">Product list</a></li>
                <li><a href="p9.php">User list</a></li>
                <li><a href="p11.html">Order list</a></li>
                <li><a href="../index.html">Main site</a></li>
            </ul>
            <form method="post">
                <input type="submit" name="logout" value="Log out" class="logout-button" />
            </form>
        </nav>

        <div id="main-block">
            <h2>Product List</h2>
            See product list below:<br>
            <form action="p8.php" method="GET">
            <?php
                $productlist=simplexml_load_file("productlist.xml") or die("Error: cannot load productlist.xml");
                foreach($productlist->children() as $product){
                    echo '<div class="form-large">';
                    echo '<img src="'.$product->imagepath.'" alt="'.$product->name.'" width="200px" height="200px" style= "float: left; padding-right: 1em;">';
                    echo '<h2>'.$product->name.' (ID: '.$product->id.')</h2>';
                    echo '<p>'.$product->price.'$/'.$product->unit.'</p>';
                    echo '<p>'.$product->weight.'</p>';
                    echo '<h3>Product Description</h3>';
                    echo '<p>'.$product->productdesc.'</p>';
                    echo "<label for=\"$product->id\"><input type=\"radio\" name=\"selectedProduct\" id=\"$product->id\" value=\"$product->id\" />$product->id</label>";
                    echo '<input type="submit" value="Add" name="add" class="button">';
                    echo '<input type="submit" value="Delete" name="delete" class="button" formaction="deleteproduct.php">';
                    echo '<input type="submit" value="Edit" name="edit" class="button">';
                    echo '</div>';
                }
            ?>
            </form>
            <p>End of product list</p>
        </div>
        <footer>
            <a href="p7.html#main-header">Back to top</a>
        </footer>
        
    </div>

</body>
</html>