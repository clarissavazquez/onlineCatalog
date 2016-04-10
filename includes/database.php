<?php 
function getDatabaseConnection($dbname) {
    $host = "localhost";
    $username = "web_user";
    $password = "s3cr3t";
    // creates new connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // setting Errorhandling to Exception
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>
