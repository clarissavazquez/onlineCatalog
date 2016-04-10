<?php
    session_start();
    include("includes/database.php");
    /*$dbConnection = getDatabaseConnection('auto_sale');
    
    function sortTable()
    {
        
    }*/
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
            
            <input type="radio" name="sortBy" value="ASC" id="ASC">  
            <label for="ASC">Ascending</label>
            <input type="radio" name="sortBy" value="DESC" id="DESC" checked> 
            <label for="DESC">Descending</label>
            <br />
            <input type="submit" value="Search Products">
        </form>

    </body>
</html>