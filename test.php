<?php
    session_start();
    print_r($_SESSION['vehicles']);
    array_push($_SESSION['vehicles'], $_GET['vin']);
    print_r($_SESSION['vehicles']);
?>