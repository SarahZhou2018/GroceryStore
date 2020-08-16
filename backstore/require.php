<?php
session_start();

if(isset($_POST['logout'])) { 
    session_destroy();
} 

if($_SESSION['admin']!=true){
    header('location: ../index.html');
}


?>
