<?php
    session_start(); //starts or resumes an existing session
    $_SESSION['errors'] = array();
    include("includes/database.php");

    $dbConnection = getDatabaseConnection('auto_sale');

   if(!isset($_SESSION['vehicles'])) {
        $_SESSION['vehicles'] = array();
    }
    
    if(isset($_GET['addToCart'])) { 
        array_push($_SESSION['vehicles'], $_GET['vin']);
    }
    
    function emptyCart() {
        if(isset($_GET['emptyCart'])) {
            unset($_SESSION['vehicles']);
        }
    }
    
    function getVehicleInfo($vin) {
        global $dbConnection;
        $sql = "SELECT * FROM vehicle WHERE vin = '$vin'";
        $statement = $dbConnection->prepare($sql);
        $statement->execute();
        $records = $statement->fetch(PDO::FETCH_ASSOC);
        return $records;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
    </head>
    <link rel="stylesheet" href="includes/index.css" type="text/css" />
    <body>
        
        <form action="index.php">
            <input id="mainButton" type="submit" name="main" value="Back to Catalog">
        </form>
        
        <form>
            <input id="mainButton" type="submit" name='emptyCart' value="Empty Cart">
        </form>
        <?=emptyCart()?>
        <h1>Your Items:</h1>

        <?php
            echo "<table border=1>";
            $vins = $_SESSION['vehicles'];
            if(!empty($vins)) {
                foreach($vins as $vin) {
                    $vehicle = getVehicleInfo($vin);
                    echo "<tr>";
                    echo "<td>" . $vehicle['make'] . "</td>";
                    echo "<td>" . "<a href='vehicleInfo.php?vin=".$vehicle['vin']."'>" . $vehicle['model'] . "</a></td>";
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
             echo "<img src=images/$image alt=$image height='200' width='300'/></td>";
                    echo "<tr>";
                }
                echo "</table>";
            }
            else 
                echo "Empty shopping cart.";
        ?>

    </body>
</html>