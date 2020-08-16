<?php
require("require.php");

if(isset($_GET['delete'])){
    $id=$_GET["selectedUser"];
    $userlist=simplexml_load_file("userlist.xml") or die("Error: cannot load userlist.xml");

    //remove entry with matching ID
    foreach($userlist->children() as $user){
        if($user->id == $id){
            $dom=dom_import_simplexml($user);
            $dom->parentNode->removeChild($dom);
            break;
        }
    }

    $userlist_file=fopen("userlist.xml","w") or die ("Error: cannot load userlist.xml");
    fwrite($userlist_file,$userlist->asXML());
    fclose($userlist_file);
}

echo '<script type="text/javascript">
           window.location = "p9.php"
      </script>';

?>