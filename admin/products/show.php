<?php

$webroot = "http://localhost/OOP/";
$approot = $_SERVER['DOCUMENT_ROOT'].'/OOP/';

include_once($approot.'vendor/autoload.php');

use Bitm\Products;


$_product = new Products();
$product = $_product->show();


?>

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
                    <h1 class="text-center">Show Products</h1>

                    
                    <dl class="row">
                    <dt class="col-sm-3">Id</dt>
                        <dd class="col-sm-9"><?= $product['id'] ?></dd>
                        <dt class="col-sm-3">Title</dt>
                        <dd class="col-sm-9"><?= $product['title'] ?></dd>
                        <dt class="col-sm-3">Short-Des</dt>
                        <dd class="col-sm-9"><?= $product['short_des'] ?></dd>
                        <dt class="col-sm-3">Long-Des</dt>
                        <dd class="col-sm-9"><?= $product['long_des'] ?></dd>
                        <dt class="col-sm-3">MRP</dt>
                        <dd class="col-sm-9"><?= $product['mrp'] ?></dd>
                        <dt class="col-sm-3">Picture</dt>
                        <dd class="col-sm-9"><?= $product['pictures'] ?> <img src="<?=$webroot;?>upload/<?= $product['pictures']?>" class="img-fluid" alt="No image found!"></dd>
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