

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

    if($_POST["marketinglist"]=="true") $marketinglist = 1;
    elseif (isset($_POST["marketinglist"]) && $_POST["marketinglist"]!="false") $marketinglist = 1;
    else $marketinglist=0;

    if (isset($_POST["admin"]))$admin = 1;
    else $admin=0;


    //load XML file
    $userlist=simplexml_load_file("userlist.xml") or die("Error: cannot load userlist.xml");

    //If id was passed, update user entry with matching id
    if($id){
        foreach($userlist->children() as $user){
            if($user->id == $id){
                $user->fname=$fname;
                $user->lname=$lname;
                $user->email=$email;
                $user->phone=$phone;
                $user->postalcode=$postalcode;
                $user->marketinglist=$marketinglist;
                $user->admin=$admin;
                if (isset($_POST["password"]) && $_POST["password"]!="") $user->password=$_POST["password"];
                break;
            }
        }
    }
    //If no id was passed, create a new user
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
        $new_user->addChild("admin",$admin);
        $new_user->addChild("password",$_POST["password"]);

    }
    
    //save user list to file
    $userlist_file=fopen("userlist.xml","w") or die ("Error: cannot load userlist.xml");
    fwrite($userlist_file,$userlist->asXML());
    fclose($userlist_file);


}

//redirect to user list
echo '<script type="text/javascript">
        window.history.go(-2);
      </script>';

//function to parse inputs
function validate_input($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>

