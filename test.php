<?php
    session_start();
    if(!isset($_SESSION['vehicles'])) {
        $_SESSION['vehicles'] = array();
    }
    
    print_r($_SESSION['vehicles']);
    array_push($_SESSION['vehicles'], $_GET['vin']);
    print_r($_SESSION['vehicles']);
?>