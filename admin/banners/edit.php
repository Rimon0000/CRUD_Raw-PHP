<?php

// $webroot = "http://localhost/OOP/";

include_once($_SERVER['DOCUMENT_ROOT']).'/OOP/config.php';

// $approot = $_SERVER['DOCUMENT_ROOT'].'/OOP/';

// include_once($approot.'vendor/autoload.php');

use Bitm\Banners;

$_banner = new Banners();
$banner = $_banner->edit();

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
                    <h1 class="text-center">Edit Banner</h1>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="inputId" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id" value="<?= $banner['id']?>"
                                    id="inputId">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="<?= $banner['title']?>"
                                    id="inputTitle">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputLink" class="col-sm-2 col-form-label">Link:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="link" value="<?= $banner['link']?>"
                                    id="inputLink">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputMessage" class="col-sm-2 col-form-label">Messages:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="messages"
                                    value="<?= $banner['messages']?>" id="inputMessages">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputDetails" class="col-sm-2 col-form-label">Details:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="details" value="<?= $banner['details']?>"
                                    id="inputDetails">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputIsActive" class="col-sm-3 col-form-label">Is Active:</label>
                            <div class="col-sm-9 form-check">

                                <?php
                                if($banner['is_active'] == 0){
                                ?>
                                 <input type="checkbox" class="form-check-input" name="is_active" value="1" id="inputIsActive">
                                 <?php

                                }else{
                                 ?>
                                <input type="checkbox" class="form-check-input" name="is_active" value="1" id="inputIsActive" checked>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputDetails" class="col-sm-2 col-form-label">Picture:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="picture" value="<?= $banner['pictures']?>"id="inputDetails">
                                <img src="<?=$webroot;?>upload/<?= $banner['pictures']?>" class="img-fluid" alt="No image found!">
                                <input type="hidden" name="old_picture" value="<?= $banner['pictures']?>">
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