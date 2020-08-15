<!-- Add to Cart
Shi Qi Zhou - 40163947 -->

<?php
session_start();
// print_r($_POST);
//Product id, name, price and unit defined in XML file
if (file_exists('../backstore/productlist.xml')) {
    $productlist = simplexml_load_file('../backstore/productlist.xml');
    //print_r($productlist);
} else {
    exit('Failed to open productlist.xml.');
}

//Add To Cart Button
if (isset($_POST["addtocart"])) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    
    $pidFromPage = $_POST["addtocart"]["pid"];
    $typeFromPage = $_POST["addtocart"]["type"];
    $qtyFromPage = $_POST["addtocart"]["qty"];

    if ($pidFromPage) {
        foreach ($productlist->children() as $product) {
            //print_r($product);
            //die;
            if ($product->id == $pidFromPage) {
                $name = (string)$product->name;
                $price = (float)$product->price;
                $unit = (string)$product->unit;
                $imagePath = (string)$product->imagepath;

                $typeCount = 0;
                $arrType = array();
                foreach($product->types->children() as $type){
                        $type = (string)$type;
                        $typeCount++;
                        array_push($arrType,$type);
               }
               print_r($arrType);
            }
        }
    }
    //pid as the array index
    $_SESSION['cart'][$pidFromPage] = array(
        "name" => $name,
        "imagePath" => $imagePath,
        "price" => $price,
        "unit" => $unit, 
        "type" => $typeFromPage, 
        "qty" => $qtyFromPage,
        "arrType" => $arrType,
        "typeCount" => $typeCount,
    );
   // print_r($_SESSION); 
    
}
header("Location: index.php");

//Delete Button
if (isset($_POST["deleteFromCart"])) {
    $pidFromPage = $_POST["deletefromcart"];
    unset($_SESSION["cart"][$pidFromPage]);
}
header("Location: index.php");


//Qtyminus Button
if (isset($_POST["qtyminus"])) {
    $pidFromPage = $_POST["deletefromcart"];
    $currentQty = $_POST["currentQty"];

    if ($currentQty < 1) {    //remove item if quantity is zero
        unset($_SESSION["cart"][$pidFromPage]);
    }
}
header("Location: index.php");

//Qtyplus Button
if (isset($_POST["qtyplus"])) {
    $pidFromPage = $_POST["deletefromcart"];
    unset($_SESSION["cart"][$pidFromPage]);
}
header("Location: index.php");


// if (!isset($_SESSION["total"])) {

//     $_SESSION["total"] = 0;

//     for ($i = 0; $i < count($products); $i++) {
//         $_SESSION["qty"][$i] = 0;
//         $_SESSION["price"][$i] = 0;
//     }
// }
//Reset
// if (isset($_GET['reset'])) {
//     if ($_GET["reset"] == 'true') {
//         unset($_SESSION["qty"]); //The quantity for each product
//         unset($_SESSION["price"]); //The amount from each product
//         unset($_SESSION["total"]); //The total cost
//         unset($_SESSION["cart"]); //Which item has been chosen
//     }
// }


?>