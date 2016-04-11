<?php
    session_start();
    include("includes/database.php");
    $dbConnection = getDatabaseConnection('auto_sale');
    
    function getAllVehicles() {
        global $dbConnection;
        $sql = "SELECT *
                FROM vehicle";
        if(isset($_GET['searchForm'])) {
            if(!empty($_GET['orderBy'])) {
                $sql .= " ORDER BY " . $_GET['orderBy'] . " ";
            }
            if(!empty($_GET['sortBy'])) {
                $sql .= $_GET['sortBy'];
            }
        }
        $statement = $dbConnection->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
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
                <option value="make">Make</option>
                <option value="price">Price</option>
                <option value="size">Size</option>
                <option value="typeID">Type</option>
                <option value="year">Year</option>
            </select>
            
            <input type="radio" name="sortBy" value="ASC" id="ASC">  
            <label for="ASC">Ascending</label>
            <input type="radio" name="sortBy" value="DESC" id="DESC" checked> 
            <label for="DESC">Descending</label>
            <br />
            <input type="submit" value="Search Products" name = "searchForm">
        </form>
        
        <?php
        
         $allVehicles = getAllVehicles();
         foreach ($allVehicles as $vehicle) {
             
             echo "<a href='vehicleInfo.php?productId=".$vehicle['vehicleId']."'>";
             echo $vehicle['make'] . " " . $vehicle['model'] . "</a>";
             
             echo "<form action='shoppingCart.php'>";
             echo  "<input type='hidden' name='vehicleId' value=".$vehicle['vehicleId'].">";
             echo  "<input type='submit' value='Add to cart'>";
             echo "</form>";
             echo "<br />";
             
         }
        
        ?>

    </body>
</html>