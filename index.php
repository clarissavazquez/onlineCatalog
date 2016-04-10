<?php
    session_start();
    include("../../includes/database.php");
    $dbConnection = getDatabaseConnection('auto_sale');
    
    function sortTable()
    {
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online Catalog</title>
    </head>
    <body>
        <h1>Online Catalog</h1>
        <form>
            In which order:
            <input type="radio" name="orderBy" value="ASC"> Ascending <br/>
            <input type="radio" name="orderBy" value="DESC" checked> Descending <br/>
            <input type="submit" value="Search Products"/>
        </form>

    </body>
</html>