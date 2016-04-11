<?php
    session_start();
    include("includes/database.php");
    $dbConnection = getDatabaseConnection('auto_sale');
    
    
    function getVehicleInfo() {
        global $dbConnection;
        $vin = $_GET['vin'];
        $sql = "SELECT description FROM vehicle WHERE vin = '$vin'";
        $statement = $dbConnection->prepare($sql);
        $statement->execute();
        $records = $statement->fetch(PDO::FETCH_ASSOC);
        return $records;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vehicle Information</title>
    </head>
    <body>
        <h1>Vehicle Information</h1>
        <div id="description">
            <?= 
                $vin = getVehicleInfo();
                echo $vin['description']; 
            ?>
        </div>
        
    </body>
</html>