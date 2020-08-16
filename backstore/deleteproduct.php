<?php
if(isset($_GET['delete'])){
    $id=$_GET["selectedProduct"];
    $productlist=simplexml_load_file("productlist.xml") or die("Error: cannot load productlist.xml");

    //remove entry with matching ID
    foreach($productlist->children() as $product){
        if($product->id == $id){
            $imagepath = $product->imagepath;
            $productpage = $product->productpage;
            unlink($imagepath);
            unlink($productpage);
            $dom=dom_import_simplexml($product);
            $dom->parentNode->removeChild($dom);
            break;
        }
    }

    $productlist_file=fopen("productlist.xml","w") or die ("Error: cannot load productlist.xml");
    fwrite($productlist_file,$productlist->asXML());
    fclose($productlist_file);
}

echo '<script type="text/javascript">
           window.location = "p7.php"
      </script>';

?>