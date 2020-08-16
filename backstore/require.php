<?php
session_start();

if(isset($_POST['logout'])) { 
    session_destroy();
} 

/* TO BE UNCOMMENTED WHEN ADMIN IS INITIALIZED AT LOGIN
if($_SESSION['admin']!=true){
    header('location: ../index.html');
}
*/

?>
