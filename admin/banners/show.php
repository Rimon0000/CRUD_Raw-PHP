<?php

    
// $webroot = "http://localhost/OOP/";

include_once($_SERVER['DOCUMENT_ROOT']).'/OOP/config.php';


// $approot = $_SERVER['DOCUMENT_ROOT'].'/OOP/';

// include_once($approot.'vendor/autoload.php');

use Bitm\Banners;


$_banner = new Banners();
$banner = $_banner->show();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD (Show)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h1 class="text-center">Show</h1>

                    <dl class="row">
                    <dt class="col-sm-3">Id :</dt>
                        <dd class="col-sm-9"><?= $banner['id'] ?></dd>
                        <dt class="col-sm-3">Title :</dt>
                        <dd class="col-sm-9"><?= $banner['title'] ?></dd>
                        <dt class="col-sm-3">Link :</dt>
                        <dd class="col-sm-9"><?= $banner['link'] ?></dd>
                        <dt class="col-sm-3">Message :</dt>
                        <dd class="col-sm-9"><?= $banner['messages'] ?></dd>
                        <dt class="col-sm-3">Details :</dt>
                        <dd class="col-sm-9"><?= $banner['details'] ?></dd>
                        
                        <dt class="col-sm-3">Is Active</dt>
                        <dd class="col-sm-9">
                            
                            <?php
                            // if($banner['is_active'] == 1 ){
                            //     echo "This banner is active";
                            // }
                            // else{
                            //     echo "This banner is not active";
                            // }
                            echo ($banner['is_active'] == 1 ) ? "active" : "Deactivated"
                            ?>
                            </dd>
                            <dt class="col-sm-3">Created At :</dt>
                        <dd class="col-sm-9"><?= $banner['created_at'] ?></dd>
                        <dt class="col-sm-3">Modified At :</dt>
                        <dd class="col-sm-9"><?= $banner['modified_at'] ?></dd>

                        <dt class="col-sm-3">Picture :</dt>
                        <dd class="col-sm-9"><?= $banner['pictures'] ?> <img src="<?=$webroot;?>upload/<?= $banner['pictures']?>" class="img-fluid" alt="No image found!"></dd>
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