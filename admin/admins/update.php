<?php


$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

//Connection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//insert command
$query = "UPDATE `admins` SET `name` = :name, `email` = :email, `password` = :password, `phone` = :phone WHERE `admins`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam('id', $id);
$stmt->bindParam('name', $name);
$stmt->bindParam('email', $email);
$stmt->bindParam('password', $password);
$stmt->bindParam('phone', $phone);



$result = $stmt->execute();

// var_dump($result);
header('location:index.php');


?>