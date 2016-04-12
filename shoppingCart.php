<?php
    session_start(); //starts or resumes an existing session
    $_SESSION['errors'] = array();

   if(!isset($_SESSION['vehicles'])) {
        $_SESSION['vehicles'] = array();
    }
    
    if(isset($_GET['addToCart'])) { 
        array_push($_SESSION['vehicles'], $_GET['vin']);
        print_r($_SESSION['vehicles']);
    }
    
    function emptyCart() {
        if(isset($_GET['emptyCart'])) {
            unset($_SESSION['vehicles']);
        }
        print_r($_SESSION['vehicles']);
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
        <a href="index.php">Back to Main Catalog</a>
        <form>
            <input id="emptyButton" type="submit" name='emptyCart' value="Empty Cart">
        </form>
        <?=emptyCart()?>
        
        <form action="index.php">
            <input id="mainButton" type="submit" name="main" value="Back to Catalog">
        </form>
        <h1>Your Items:</h1>

        <?php
            echo "<table border=1>";
            $vins = $_SESSION['vehicles'];
            if(!empty($vins)) {
                foreach($vins as $vin) {
                    getVehicleInfo($vin);
                    echo "<tr>";
                    echo "<td>" . $vin['make'] . "</td>";
                    echo "<td>" . "<a href='vehicleInfo.php?vin=".$vin['vin']."'>" . $vin['model'] . "</a></td>";
                    echo "<td>" . $vin['price'] . "</td>";
                    echo "<tr>";
                }
                echo "</table>";
            }
            else 
                echo "Empty shopping cart.";
        ?>

    </body>
</html>