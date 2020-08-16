<!--
    P8 - Edit product
    Ejazali Rezayi - 40101892
-->
<?php
require("require.php");
?>
<?php
global $edit_mode, $id, $name, $price, $weight, $aisle, $productdesc, $alltypes, $unit, $imagepath;
$edit_mode = false;
if(isset($_GET['edit'])){
    $edit_mode=true;
    $id=$_GET["selectedProduct"];
    $productlist=simplexml_load_file("productlist.xml") or die("Error: cannot load productlist.xml");

    foreach($productlist->children() as $product){
        if($product->id == $id){
            $name = $product->name;
            $aisle = $product->aisle;
            $price = $product->price;
            $weight = $product->weight;
            $unit = $product->unit;
            $productdesc = $product->productdesc;
            $imagepath = $product->imagepath;
            $types = $product->types;
            $alltypes="";
            foreach($types->children() as $type){
                $alltypes.=$type."-";
            }
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Order</title>
    <link rel="stylesheet" href="../css/p7-p12.css">
</head>

<body>
    <div id="main-container">


        <header id="main-header">
            Back Store - Add/Edit Product
        </header>
        <nav>
            <ul>
                <li><a href="p7.php">Product list</a></li>
                <li><a href="p9.php">User list</a></li>
                <li><a href="p11.php">Order list</a></li>
                <li><a href="../index.html">Main site</a></li>
            </ul>
            <form method="post">
                <input type="submit" name="logout" value="Log out" class="logout-button" />
            </form>
        </nav>

        <div id="main-block">
            <h2>Add/Edit Product</h2>
            Enter product information below:<br>
            <form action="addeditproduct.php" class="form-large" method="POST" enctype="multipart/form-data">
                
                <?php
                if ($edit_mode){
                    echo "<div class=\"form-container\">
                    <label for=\"id\">ID:</label><br>
                    <input type=\"text\" name=\"id\" id=\"id\" class=\"inputbox\" size=\"6\" value=\"$id\" readonly><br>
                </div>
                <div class=\"clr\"></div>";
                }
                ?>
                <div class="form-container">
                    <label for="productname">Product name</label><br>
                    <input type="text" name="name" id="name" size="30"<?php if ($edit_mode) echo("value=\"$name\""); ?> required><br>
                </div>
                <div class="form-container">
                    <label for="image">Image</label><br>
                    <input type="file" name="image" id="image"><br>
                </div>
                <div class="form-container">
                    <label for="aisle">Choose the aisle</label>
                    <select name="aisle" id="aisle">
                        <option value="bread" <?php if ($edit_mode) {if($aisle=="bread") echo('selected');} ?>>Bread</option>
                        <option value="frozen" <?php if ($edit_mode) {if($aisle=="frozen") echo('selected');} ?>>Frozen</option>
                        <option value="fruits-vegetables" <?php if ($edit_mode) {if($aisle=="fruits-vegetables") echo('selected');} ?>>Fruits and Vegetables</option>
                        <option value="meat-poultry" <?php if ($edit_mode) {if($aisle=="meat-poultry") echo('selected');} ?>>Meat and Poultry</option>
                        <option value="snacks" <?php if ($edit_mode) {if($aisle=="snack") echo('selected');} ?>>Snacks</option>
                    </select>
                </div>
                <div class="clr"></div>
                <div class="form-container">
                    <label for="price">Price (in $, enter number only)</label><br>
                    <input type="text" name="price" id="price" class="inputbox" size="30"<?php if ($edit_mode) echo("value=\"$price\""); ?> required><br>
                </div>
                <div class="form-container">
                    <label for="weight">Weight (enter ml, lbs or g at the end)</label><br>
                    <input type="text" name="weight" id="weight" class="inputbox" size="30"<?php if ($edit_mode) echo("value=\"$weight\""); ?> required><br>
                </div>
                <div class="form-container">
                    <label for="unit">Sold in (each, lb, pack)</label><br>
                    <input type="text" name="unit" id="unit" class="inputbox" size="30"<?php if ($edit_mode) echo("value=\"$unit\""); ?> required><br>
                </div>
                <div class="clr"></div>
                <div class="form-container">
                    <label for="Types">Types (Separate types with a dash (-), Write N/A if no types)</label><br>
                    <input type="text" name="types" id="types" class="inputbox" size="100"<?php if ($edit_mode) {
                        echo("value=\"$alltypes\"");
                        } ?> required><br>
                </div>
                <div class="clr"></div>
                <div class="textarea-container">
                    <label for="productdesc">Product description</label><br>
                    <textarea style="height: 4em" type="text" name="productdesc" id="productdesc" class="inputbox" required><?php if ($edit_mode) echo($productdesc); ?></textarea><br>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p>To add a product, enter a new product name and fill all the inputs</p>
                <p>To edit a product, change the desired inputs</p>
               
                <input type="submit" name="save" value="save" class="button">

            </form>
            <div class="clr"></div>
            <a href="p7.php">Return to product list without saving</a>
        </div>
        <footer>
            <a href="p8.html#main-header">Back to top</a>
        </footer>
    </div>
</body>

</html>