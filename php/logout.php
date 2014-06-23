<?php 


session_start();

if( isset($_SESSION['l']))
    session_destroy();

header('Location:../index.php');

 ?>