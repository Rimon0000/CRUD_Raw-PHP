<?php

$_id = $_GET['id'];
// // var_dump($_GET);


//Connection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//insert command
$query = "DELETE FROM `admins` WHERE id = :id";

$stmt = $conn->prepare($query);
$stmt->bindParam('id', $_id);
$result = $stmt->execute();
// $admin = $stmt->fetch();
header('location:index.php');

?>