<?php

// $approot = $_SERVER['DOCUMENT_ROOT'].'/OOP/';

// include_once($approot.'vendor/autoload.php');

include_once($_SERVER['DOCUMENT_ROOT']).'/OOP/config.php';


use Bitm\Banners;


$_banner = new Banners();
$banners = $_banner->trash_index();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD (Trashed Items)</title>
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

                    <h1 class="text-center">All Trashed Items</h1>
                    <ul class="nav fw-bold fs-4 justify-content-center">                      
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php">Lists</a>
                        </li>
                    </ul>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if(count($banners)>0):
                            foreach($banners as $banner){                 
                            ?>
                            <tr>
                               
                                <td> <?php echo $banner['title'] ?> </td>
                            
                              
                                <td> <a href="restore.php?id=<?= $banner['id']?>">Restore</a> | <a
                                        href="delete.php?id=<?= $banner['id']?>"
                                        onclick="return confirm('Are you sure you want to delete?')">Delete</a> </td>
                            </tr>
                            <?php
     };                          //  endforeach     } er jaigai endforeach dileo hobe
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
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>