<?php

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
                    <h1 class="text-center">Add Products</h1>
                    <form action="store.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="" id="inputTitle">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputShort" class="col-sm-2 col-form-label">Short Description:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="short-des" value="" id="inputShort">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputLong" class="col-sm-2 col-form-label">Long Description:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="long-des" value="" id="inputLong">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputMrp" class="col-sm-2 col-form-label">MRP:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="mrp" value="" id="inputMrp">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPicture" class="col-sm-2 col-form-label">Picture:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="picture" value="" id="inputPicture">
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