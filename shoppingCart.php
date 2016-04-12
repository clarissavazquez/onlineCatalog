<?php
    session_start(); //starts or resumes an existing session
    $_SESSION['errors'] = array();
    print_r($_SESSION['vehicles']);
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
    </head>
    <body>
        <a href="https://cst336-clarissa-vazquez.c9users.io/onlineCatalog/index.php">Back to Main Catalog</a>
        <h1>Your Items:</h1>

    </body>
</html>