<?php

$databaseHost = 'localhost';
$databaseName = 'simrs';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);

// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>