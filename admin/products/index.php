<?php
$approot = $_SERVER['DOCUMENT_ROOT'].'/OOP/';

include_once($approot.'vendor/autoload.php');

use Bitm\Products;


$_product = new Products();
$products = $_product->index();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD (Create)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                <?php
                    if($_SESSION['message'] != ''):
                    ?>

                    <div class="alert alert-warning">
                        <?php
                        echo $_SESSION['message'];
                        $_SESSION['message'] = "";

                        ?>
                    </div>
                    <?php
                    endif;
                    ?>

                    <h1 class="text-center">Products</h1>
                    <ul class="nav fw-bold fs-4 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="create.php">Add New Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="trash_index.php">Trashed Items</a>
                        </li>
                    </ul>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if(count($products) > 0):
    foreach($products as $product){
     ?>
                            <tr>
                                <th scope="row"><?php echo $product['id'] ?></th>
                                <td><?php echo $product['title'] ?></td>
                                <td><a href="show.php?id=<?=$product['id'] ?>">Show</a> | <a
                                        href="edit.php?id=<?=$product['id'] ?>">Edit</a> | <a
                                        href="trash.php?id=<?=$product['id']?>"
                                        onclick="return confirm('Are you sure you want to delete?')">Trash</a></td>
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