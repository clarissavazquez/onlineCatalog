<?php
    session_start(); //starts or resumes an existing session
    $_SESSION['errors'] = array();

   if(!isset($_SESSION['vehicles'])) {
        $_SESSION['vehicles'] = array();
    }
    
    print_r($_SESSION['vehicles']);
    array_push($_SESSION['vehicles'], $_GET['vin']);
    print_r($_SESSION['vehicles']);
    print_r($_SESSION['vehicles']);
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
    </head>
    <link rel="stylesheet" href="includes/index.css" type="text/css" />
    <body>
        <a href="index.php">Back to Main Catalog</a>
        <form>
            <input type="submit" value="Empty Cart">
        </form>
        <h1>Your Items:</h1>
        
    </body>
</html>