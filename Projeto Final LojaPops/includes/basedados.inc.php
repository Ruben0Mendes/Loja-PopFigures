<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "lojapops";

// Criar ligação à base de dados

$conn = mysqli_connect($db_servername, $db_username, $db_password, $dbname);

//verificar ligação
if(!$conn){
    die("A ligação falhou: " . mysqli_connect_error());
}