<?php
    include('db_connection_info.php');
    $mysqli = new mysqli("mysql.greenstogrounds.com", $dbUsername, $dbPassword, $db);
    if($mysqli->connect_error)
        die("Connection failed: " . $mysqli->connect_error);
?>