<?php

//Parameters to connect to a database

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "php_project";


//connection to database

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);




if(!$conn){
     die("database connection failed");
}

?>