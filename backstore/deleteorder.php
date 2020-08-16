<?php
if(isset($_GET['delete'])){
    $id=$_GET["selectedOrder"];
    $orderlist=simplexml_load_file("orderlist.xml") or die("Error: cannot load orderlist.xml");

    //remove entry with matching ID
    foreach($orderlist->children() as $order){
        if($user->id == $id){
            $dom=dom_import_simplexml($order);
            $dom->parentNode->removeChild($dom);
            break;
        }
    }

    $orderlist_file=fopen("orderlist.xml","w") or die ("Error: cannot load orderlist.xml");
    fwrite($orderlist_file,$orderlist->asXML());
    fclose($orderlist_file);
}

echo '<script type="text/javascript">
           window.location = "p11.php"
      </script>';

?>