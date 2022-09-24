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
$query = "SELECT * FROM `admins` WHERE id = :id";

$stmt = $conn->prepare($query);
$stmt->bindParam('id', $_id);
$result = $stmt->execute();
$admin = $stmt->fetch();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD (Shows)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h1 class="text-center">Admin Show</h1>
                    <dl class="row">
                    <dt class="col-sm-3">Id</dt>
                        <dd class="col-sm-9"><?= $admin['id'] ?></dd>
                        <dt class="col-sm-3">Title</dt>
                        <dd class="col-sm-9"><?= $admin['name'] ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>