<?php

// echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";

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
$query = "INSERT INTO `admins` (`name`, `email`, `password`, `phone`) VALUES (:name, :email, :password, :phone)";

$stmt = $conn->prepare($query);

$stmt->bindParam('name', $name);
$stmt->bindParam('email', $email);
$stmt->bindParam('password', $password);
$stmt->bindParam('phone', $phone);



$result = $stmt->execute();

// var_dump($result);
header('location:index.php');


?>