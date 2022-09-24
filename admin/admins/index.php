<?php
//Connection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//insert command
$query = "SELECT * FROM `admins`";

$stmt = $conn->prepare($query);
$result = $stmt->execute();
$admins = $stmt->fetchAll();
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
                    <h1 class="text-center">Admins</h1>
                    <ul class="nav fw-bold fs-4 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="create.php">Add New Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Link</a>
                        </li>
                    </ul>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             if(count($admins)>0):
                            foreach($admins as $admin){ 
                               
                                ?>
                            <tr>
                                <th scope="row"><?php echo $admin['id']?></th>
                                <td><?php echo $admin['name'] ?></td>
                                <td><a href="show.php?id=<?=$admin['id'] ?>">Show</a> | <a
                                        href="edit.php?id=<?=$admin['id'] ?>">Edit</a> | <a
                                        href="delete.php?id=<?= $admin['id']?>"
                                        onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>

                            </tr>
                            <?php
                             };
                            else:
                             ?>
                            <tr class="text-center text-danger">
                                <td colspan="2">No banner is available</td>
                            </tr>
                            <?php
                             endif;
                             ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>