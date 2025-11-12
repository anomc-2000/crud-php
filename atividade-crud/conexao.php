<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "crud";
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    if($conn->connect_error){
        die("Conexão falha".$conn->connect_error);
    }
    echo "";
?>