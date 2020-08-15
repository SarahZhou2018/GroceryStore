<!-- Add to Cart, Edit Cart Functions
Shi Qi Zhou - 40163947 -->

<?php
session_start();

//Product id, name, price and unit defined in XML file
if (file_exists('../backstore/productlist.xml')) {
    $productlist = simplexml_load_file('../backstore/productlist.xml');
} else {
    exit('Failed to open productlist.xml.');
}

//Checkout
if (isset($_GET["checkout"])) {
    echo "Thank you for using Foodsy!";
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

                // $typeCount = 0;
                $arrType = array();
                foreach ($product->types->children() as $type) {
                    $type = (string)$type;
                    // $typeCount++;
                    array_push($arrType, $type);
                }
                print_r($arrType);
            }
        }
    }
    $cartArrayId = $pidFromPage.'-'.$typeFromPage;
    // quantity add up to what is already in cart
    if (isset($_SESSION['cart'][$cartArrayId]["qty"])) {
       $qtyFromPage = $qtyFromPage + $_SESSION['cart'][$cartArrayId]["qty"];
    }

    //concat (productId, type) as the $_SESSION array index
    $_SESSION['cart'][$cartArrayId] = array(
        "name" => $name,
        "imagePath" => $imagePath,
        "price" => $price,
        "unit" => $unit,
        "type" => $typeFromPage,
        "qty" => $qtyFromPage,
        "arrType" => $arrType
        // "typeCount" => $typeCount
    );
    header("Location: index.php");
}

//QtyChange Buttons
if (isset($_GET["action"]) && isset($_GET['productId'])) {
    if ($_GET['action'] === "minus") {
        $productId = $_GET['productId'];
        $_SESSION["cart"][$productId]["qty"] -= 1;
    }
    if ($_GET['action'] === "plus") {
        $productId = $_GET['productId'];
        $_SESSION["cart"][$productId]["qty"] += 1;
    }
    if ($_GET['action'] === "delete") {
        $productId = $_GET['productId'];
        $_SESSION["cart"][$productId]["qty"] = 0;
    }

    //Checks
    if ($_SESSION["cart"][$productId]["qty"] <= 0) {
        unset($_SESSION["cart"][$productId]);
    }
}

//Reset
if (isset($_GET['action']) && $_GET['action'] === "reset") {
    session_destroy();
}

//Qtyplus Button
// if (isset($_POST["qtyplus"])) {
//     $pidFromPage = $_POST["deletefromcart"];
//     unset($_SESSION["cart"][$pidFromPage]);
//     header("Refresh:0");
// }

//Delete Button
// if (isset($_POST["deleteFromCart"])) {
//     $pidFromPage = $_POST["deletefromcart"];
//     unset($_SESSION["cart"][$pidFromPage]);
//     header("Refresh:0");
// }



?>