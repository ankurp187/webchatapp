<?php

$servername = "localhost";
$username = "root";
$password = "";

try{
    $pdo = new PDO("mysql:host=localhost;", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt create database query execution
try{
    $query = "CREATE DATABASE IF NOT EXISTS akpweb";
    $pdo->exec($query);
    //echo "Database created successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $query. " . $e->getMessage());
}
try{
    $pdo = new PDO("mysql:host=localhost;dbname=akpweb", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}



?>