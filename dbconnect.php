<?php
$host = 'localhost';
$dbname = 'clmortenson1_wdv341';
$username = 'clmortenson1_wdv341';
$password = 'GracieMae99!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>