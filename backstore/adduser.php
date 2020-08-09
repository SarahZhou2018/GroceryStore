

<?php

//Add user
//Georges Grondin - 40034160

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validate inputs
    $id=0;
    if(isset($_POST["id"])) $id = validate_input($_POST["id"]);
    $fname = validate_input($_POST["fname"]);
    $lname = validate_input($_POST["lname"]);
    $email = validate_input($_POST["email"]);
    $phone = validate_input($_POST["phone"]);
    $postalcode = validate_input($_POST["postalcode"]);
    if (isset($_POST["marketinglist"]))$marketinglist = 1;
    else $marketinglist=0;

    //load XML file
    $userlist=simplexml_load_file("userlist.xml") or die("Error: cannot load userlist.xml");

    
    if($id){
        foreach($userlist->children() as $user){
            if($user->id == $id){
                $user->fname=$fname;
                $user->lname=$lname;
                $user->email=$email;
                $user->phone=$phone;
                $user->postalcode=$postalcode;
                $user->marketinglist=$marketinglist;
                $user->password="TODO";
                break;
            }
        }
    }
    else {
        //Fetch user ID count, store, increment and update count
        $att="idcount";
        $idcount = $userlist->attributes()->$att;
        $idcount = $idcount+1;
        $userlist->attributes()->$att=$idcount;
        //$userlist->addAttribute("idcount",$idcount);

        //create new user entry
        $new_user = $userlist->addChild("user");
        $new_user->addChild("id",str_pad($idcount,4,"0",STR_PAD_LEFT));
        $new_user->addChild("fname",$fname);
        $new_user->addChild("lname",$lname);
        $new_user->addChild("email",$email);
        $new_user->addChild("phone",$phone);
        $new_user->addChild("postalcode",$postalcode);
        $new_user->addChild("marketinglist",$marketinglist);
        $new_user->addChild("password","TODO");

    }
    
    //save user list to file
    $userlist_file=fopen("userlist.xml","w") or die ("Error: cannot load userlist.xml");
    fwrite($userlist_file,$userlist->asXML());
    fclose($userlist_file);


}


echo '<script type="text/javascript">
           window.location = "p9.php"
      </script>';

function validate_input($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>

