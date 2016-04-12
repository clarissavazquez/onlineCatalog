<?php
    session_start();
    include("includes/database.php");

    $dbConnection = getDatabaseConnection('auto_sale');
    
    function getAllVehicles() {
        global $dbConnection;
        $sql = "SELECT *
                FROM vehicle AS t1
                JOIN vehicle_type AS t2
                WHERE t1.typeID = t2.vid";
        if(isset($_GET['searchForm'])) {
            if(!empty($_GET['orderBy'])) {
                $sql .= " ORDER BY " . $_GET['orderBy'] . " ";
            }
            if(!empty($_GET['sortBy'])) {
                $sql .= " " . $_GET['sortBy'];
            }
        }
        $statement = $dbConnection->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    /*
    function submitted() {
        //if(isset($_GET['submit'])) {
        array_push($_SESSION['vehicles'], $_GET['submit']);
        //}
    }*/
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online Catalog</title>
        <link rel="stylesheet" href="includes/index.css" type="text/css" />
    </head>
    <body>
        <a href="shoppingCart.php">Go to Shopping Cart</a>
        <h1>Online Catalog</h1>

        <form>
            <select id="select" name="orderBy">
                <option value="make">Select One</option>
                <option value="make">Make</option>
                <option value="price">Price</option>
                <option value="size">Size</option>
                <option value="typeID">Type</option>
                <option value="year">Year</option>
            </select>
            
            <input id="radio"type="radio" name="sortBy" value="ASC" id="ASC">  
            <label for="ASC">Ascending</label>
            <input id="radio" type="radio" name="sortBy" value="DESC" id="DESC" checked> 
            <label for="DESC">Descending</label>
            <input id="search" type="submit" value="Search Products" name = "searchForm">
        </form>
        
        <?php
        
         $allVehicles = getAllVehicles();
         echo "<table border=1>";
         foreach ($allVehicles as $vehicle) {
             echo "<tr>";
             echo "<td>" . $vehicle['make'] . "</td>";
             echo "<td>". "<a href='vehicleInfo.php?vin=".$vehicle['vin']."'>" . $vehicle['model'] . "</a></td>";
             echo "<td>" . $vehicle['year'] . "</td>";
             echo "<td>" . $vehicle['size'] . " seater</td>";
             echo "<td>" . $vehicle['type'] . "</td>";
             echo "<td>$" . $vehicle['price'] . "</td>";
             echo "<td>";
            
             if($vehicle['vin'] == "1ZVBP8EN1A5169534") {
                 $image = "sonic.jpg";
             }
             else if($vehicle['vin'] == "1FDZY90T7TVA77076") {
                 $image = "fiesta.jpg";
             }
             else if($vehicle['vin'] == "5GAET13M172179554") {
                 $image = "cooper.jpg";
             }
             else if($vehicle['vin'] == "19UUA56782A014159") {
                 $image = "kia.jpg";
             }
             else if($vehicle['vin'] == "1B7GG46N92S546100") {
                 $image = "benz.jpg";
             }
             else if($vehicle['vin'] == "1G4GE5G31CF143405") {
                 $image = "lancer.jpg";
             }
             else if($vehicle['vin'] == "3WKDDU9X16F109205") {
                 $image = "frontier.jpg";
             }
             else if($vehicle['vin'] == "5HD1FR4187Y785123") {
                 $image = "titan.jpg";
             }
             else if($vehicle['vin'] == "YV1MW382182462004") {
                 $image = "versa.jpg";
             }
             else if($vehicle['vin'] == "1GDB4T1T4HV596313") {
                 $image = "rav4.jpg";
             }
             echo "<img src=images/$image alt=$image height='200' width='300'/>";
             
             echo "<form>";
             echo  "<input type='hidden' name='vin' value=" . $vehicle['vin'] . ">";
            
             echo  "<input type='submit' name='addToCart' value='Add to Cart'>";
             echo "</form>";
             echo "</td>";
             echo "</tr>";
         }
         echo "</table>"
        
        ?>

    </body>
</html>