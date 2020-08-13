<?php
if(isset($_POST['save'])) {
    $productname=$_POST['productname'];
    $price=$_POST['price'];
    $weight=$_POST['weight'];
    $productdesc=$_POST['productdesc'];
    $aisles=$_POST['aisles'];
    if($productname!=null&&$productname!="") {
        if($price!=null&&$price!=""&&$weight!=null&&$weight!=""&&$productdesc!=null&&$productdesc!="") {
            add();
            phpAlert("Product has been successfully added!");
        } elseif (($price==null||$price=="")&&($weight==null||$weight=="")||($productdesc==null||$productdesc=="")) {
            delete();
        } else {
            //CHECK FOR IMAGE
            if($price!=null&&$price!="") {
                editPrice();
            }
            if($weight!=null&&$weight!="") {
                editWeight();
            }
            if($productdesc!=null&&$productdesc!="") {
                editProductDesc();
            }
        }
    }
    header("Location:../backstore/p8.html");
}

function uploadImage($productname) {
    $file=$_FILES['image'];
    $fileName=$file['name'];
    $fileTmpName=$file['tmp_name'];
    $fileSize=$file['size'];
    $fileError=$file['error'];
    $fileType=$file['type'];

    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array('jpg','jpeg','png');

    if(in_array($fileActualExt, $allowed)) {
        if($fileError==0) {
            $fileNameNew= changestring($productname).".".$fileActualExt;
            $fileDestination= "../images/".$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            return $fileDestination;
        }
    }
}

function changestring($s) {
    $s=strtolower($s);
    while(strpos($s, " ") !== false) {
        $s=str_replace(" ","",$s);
    }
    return $s;
}

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("'.$msg.'")</script>';
}

function add() {
    $productname=$_POST['productname'];
    $price=$_POST['price'];
    $weight=$_POST['weight'];
    $productdesc=$_POST['productdesc'];
    $aisles=$_POST['aisles'];
    $a=$_POST['types'];
    $types=explode("-",$a);
    $options="";    
    for($i=0;$i<count($types);$i++) {
        $options.="<option>";
        $options.=$types[$i];
        $options.="</option>";
    }
    $fileDestination=uploadImage($productname);
    $fp = fopen($_SERVER['DOCUMENT_ROOT']."/product-descriptions/".changestring($_POST['productname']).".html","w");
    fwrite($fp,'<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/p3.css">
        <title>'.$productname.'</title>
        <script src="../scripts/product-descriptions.js"></script>
    </head>
    
    
    <body onload="updateSubtotal('.$price.')">
        <header>
            <div class="product-name-header">
                Product Description - '.$productname.'
            </div>
    
        </header>
        <nav>
            <ul>
                <li><a href="../index.html">Home Page</a></li>
    
                <li><a href="../aisles/'.$aisles.'.html">Return to Aisle</a></li>
    
                <li><a href="../shopping-cart/index.html">Shopping Cart</a></li>
            </ul>
            <div class="register-log-in">
                <a href="../user/register.html"><button class="user-button" type="button"
                        name="user-button">Register</button></a>
                <a href="../user/login.html"><button class="user-button" type="button" name="login-button">Log
                        In</button></a>
            </div>
        </nav>
    
    
        <div class="description">
            <div class="image">
                <img src="'.$fileDestination.'" alt="'.$productname.'" width="200px" height="200px" />
            </div>
            <h2>'.$productname.'</h2>
            <p>'.$price.'$/lb</p>
            <p>Weight: '.$weight.'</p>
            <h3>Product Description</h3>
            <p>'.$productdesc.'<br /></p>
    
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
    
            <form action="../shopping-cart/index.html">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value=1 size="2" onchange="updateSubtotal('.$price.')">
                <label for="type">Type:</label>
                <select id="type" name="type">
                    '.$options.'
                </select>
                Subtotal: <span id="subtotal"></span>
                <div class="addtocartposition">
                    <a href="../shopping-cart/index.html"><button class="addtocart" type="button"
                            name="addtocart-button">Add to Cart</button></a>
                </div>
            </form>
        </div>
        </div>
        <footer></footer>
    </body>
    
    </html>');
    fclose($fp);
}


?>