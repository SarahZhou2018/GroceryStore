

<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validate inputs
    $id=0;
    if(isset($_POST["id"])) $id = validate_input($_POST["id"]);
    
    $customerid = validate_input($_POST["customerid"]);
    $datec = validate_input($_POST["datec"]);
    $datem = validate_input($_POST["datem"]);
    $fname = validate_input($_POST["fname"]);
    $lname = validate_input($_POST["lname"]);
    $email = validate_input($_POST["email"]);
    $phonenum = validate_input($_POST["phonenum"]);
    $orderdesc = validate_input($_POST["orderdesc"]);


  


    //load XML file
    $orderlist=simplexml_load_file("orderlist.xml") or die("Error: cannot load orderlist.xml");

    
    if($id){
        foreach($orderlist->children() as $order){
            if($order->id == $id){
                
                $order->customer=$customerid;
                $order->datec=$datec;
                $order->datem=$datem;
                $order->fname=$fname;
                $order->lname=$lname;
                $order->email=$email;
                $order->phonenum=$phonenum;
                $order->orderdesc=$orderdesc;
                
                break;
            }
        }
    }
    
    else {
       
        $att="idcount";
        $idcount = $orderlist->attributes()->$att;
        $idcount = $idcount+1;
        $orderlist->attributes()->$att=$idcount;
        

        //create new order entry
        $new_order = $orderlist->addChild("order");
        $new_order->addChild("id",$id);
        $new_order->addChild("customerrid",$customerid);
        $new_order->addChild("datec",$datec);
        $new_order->addChild("datem",$datem);
        $new_order->addChild("fname",$fname);
        $new_order->addChild("lname",$lname);
        $new_order->addChild("email",$email);
        $new_order->addChild("phonenum",$phonenum);
        $new_order->addChild("orderdesc",$orderdesc);
        
    }
    
    //save order list to file
    $orderlist_file=fopen("orderlist.xml","w") or die ("Error: cannot load orderlist.xml");
    fwrite($orderlist_file,$orderlist->asXML());
    fclose($orderlist_file);


}

//redirect to order list
echo '<script type="text/javascript">
           window.location = "p11.php"
      </script>';

//function to parse inputs
function validate_input($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}


?>

