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
            <select name="orderBy">
                <option value="">Select One</option>
                <option value="vehiclePrice">Price</option>
                <option value="vehicleSize">Size</option>
                <option value="vehicleType">Type</option>
                <option value="vehicleYear">Year</option>
            </select>
            In which order:
            <input type="radio" name="sortBy" value="ASC"> Ascending <br/>
            <input type="radio" name="sortBy" value="DESC" checked> Descending <br/>
            <input type="submit" value="Search Products"/>
        </form>

    </body>
</html>