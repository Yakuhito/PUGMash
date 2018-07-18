<?php

$db_host = "127.0.0.1";
$db_database = "pugmash";
$db_user = "root";
$db_pass = "";
$pass = '123';
$leaderboard_max_cols = 1000;
$k_factor = 16;
$app_name = "Pug Mash!";
$default_score = 2000;

$conn = new mysqli($db_host, $db_user, $db_pass, $db_database);

if ($conn->connect_error) {
    echo('DATABASE ERROR! Please run setup.php');
} 


?>