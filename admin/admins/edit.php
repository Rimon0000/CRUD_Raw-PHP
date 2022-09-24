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
    <title>CRUD (Edit)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h1 class="text-center">Edit Admin</h1>
                    <form action="update.php" method="post">
                        <div class="mb-3 row">
                            <label for="inputId" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id" value="<?= $admin['id']?>" id="inputId">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?= $admin['name']?>" id="inputName">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="<?= $admin['email']?>" id="inputEmail">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="password" value="<?= $admin['password']?>" id="inputPassword">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPhone" class="col-sm-2 col-form-label">Phone:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" value="<?= $admin['phone']?>" id="inputPhone">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
