<?php
    session_start();
    include("includes/database.php");
    $dbConnection = getDatabaseConnection('auto_sale');
    
    
    function getVehicleInfo() {
        global $dbConnection;
        $vin = $_GET['vin'];
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
        <title>Vehicle Information</title>
        <link rel="stylesheet" href="includes/index.css" type="text/css" />
    </head>
    <body>
        <a href="index.php">Back to Main Catalog</a>
        <h1>Vehicle Information</h1>
        <div id="description">
            <?= 
                $vin = getVehicleInfo();
                echo "<table>";
                echo "<tr>";
                echo "<th>" . $vin['year'] . "</th> ";
                echo "<th>" . $vin['make'] . "</th>";
                echo "<th>" . $vin['model'] . "</th>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan='3'>";
                        if($vin['vin'] == "1ZVBP8EN1A5169534") {
                            $image = "sonic.jpg";
                        }
                        else if($vin['vin'] == "1FDZY90T7TVA77076") {
                             $image = "fiesta.jpg";
                        }
                        else if($vin['vin'] == "5GAET13M172179554") {
                            $image = "cooper.jpg";
                        }
                        else if($vin['vin'] == "19UUA56782A014159") {
                            $image = "kia.jpg";
                        }
                        else if($vin['vin'] == "1B7GG46N92S546100") {
                            $image = "benz.jpg";
                        }
                        else if($vin['vin'] == "1G4GE5G31CF143405") {
                            $image = "lancer.jpg";
                        }
                        else if($vin['vin'] == "3WKDDU9X16F109205") {
                            $image = "frontier.jpg";
                        }
                        else if($vin['vin'] == "5HD1FR4187Y785123") {
                            $image = "titan.jpg";
                        }
                        else if($vin['vin'] == "YV1MW382182462004") {
                            $image = "versa.jpg";
                        }
                        else if($vin['vin'] == "1GDB4T1T4HV596313") {
                            $image = "rav4.jpg";
                        }
                    echo "<center><img src=images/$image alt=$image height='500' width='700'/></center>";
                    echo "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th> Price: </th>";
                    echo "<th> Description: </th>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" . "$" . $vin['price'] . "</td>";

                    echo "<td>". $vin['description'] . "</td>";
                echo "</tr>";
            echo "</table>";
            ?>
        </div>
        
    </body>
</html>