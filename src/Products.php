<?php

namespace Bitm;

use PDO;

class Products{

public function index(){
                
    session_start();
                
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
    //insert command
    $query = "SELECT * FROM `products` WHERE is_deleted = 0";
                
    $stmt = $conn->prepare($query);
                
    $result = $stmt->execute();
                
    $products = $stmt->fetchAll();
                
    // var_dump($result);
    return $products;
        
}


public function store(){

    
    session_start();


    $approot = $_SERVER['DOCUMENT_ROOT']."/OOP/";

    //working with image
    $_file_name = "IMG_".time()."_".$_FILES['picture']['name'];

    $target = $_FILES['picture']['tmp_name'];
    $destination = $approot.'upload/'.$_file_name;
    $is_file_moved = move_uploaded_file($target, $destination);
    // var_dump($is_file_moved);

    if($is_file_moved){
        $picture = $_file_name;
    }
    else{
        $picture = null;
    }

    // echo "<pre>";
    //  print_r($_POST);
    //  echo "</pre>";

    $title = $_POST['title'];
    $short_des = $_POST['short-des'];
    $long_des = $_POST['long-des'];
    $mrp = $_POST['mrp'];


    //Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //insert command
    $query = "INSERT INTO `products` (`short_des`, `long_des`, `mrp`, `title`, `pictures`) VALUES ( :short_des, :long_des, :mrp, :title, :pictures)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam('title', $title);
    $stmt->bindParam('short_des', $short_des);
    $stmt->bindParam('long_des', $long_des);
    $stmt->bindParam('mrp', $mrp);
    $stmt->bindParam('pictures', $_file_name);



    $result = $stmt->execute();

    if($result){
        $_SESSION['message'] = "Product is added successfully.";
    }
    else{
        $_SESSION['message'] = "Product is not added.";
    }

    header('location:index.php');

    return $products;


}


public function show(){

        // $webroot = "http://localhost/OOP/";

    $_id = $_GET['id'];
    // var_dump($_GET);


    //Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //insert command
    $query = "SELECT * FROM `products` WHERE id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $result = $stmt->execute();
    $product = $stmt->fetch();

    return $product;

}


public function delete(){

    session_start();

    $_id = $_GET['id'];

    //Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //insert command
    $query = "DELETE FROM `products` WHERE id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $result = $stmt->execute();
    // $product = $stmt->fetch();

    if($result){
        $_SESSION['message'] = "Product is deleted successfully.";
    }
    else{
        $_SESSION['message'] = "Product is not deleted.";
    }

    header('location:index.php');

    return $products;

}


public function edit(){

        // $webroot = "http://localhost/OOP/";

    $_id = $_GET['id'];
    // var_dump($_GET);


    //Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //insert command
    $query = "SELECT * FROM `products` WHERE id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $result = $stmt->execute();
    $product = $stmt->fetch();

    return $product;

}

public function restore(){

        session_start();

    $_id = $_GET['id'];
    $_is_deleted = 0;

    //Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //insert command
    $query = "UPDATE `products` SET `is_deleted` = :is_deleted WHERE `products`.`id` = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $stmt->bindParam('is_deleted', $_is_deleted);
    $result = $stmt->execute();
    // $product = $stmt->fetch();

    if($result){
        $_SESSION['message'] = "Product is restored successfully.";
    }
    else{
        $_SESSION['message'] = "Product is not restored.";
    }

    header('location:index.php');

    return $products;

}


public function trash_index(){

        session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //insert command
    $query = "SELECT * FROM `products` WHERE is_deleted = 1";

    $stmt = $conn->prepare($query);

    $result = $stmt->execute();

    $products = $stmt->fetchAll();

    // var_dump($result);

    return $products;
}


public function trash(){

        session_start();

    $_id = $_GET['id'];
    $_is_deleted = 1;

    //Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //insert command
    $query = "UPDATE `products` SET `is_deleted` = :is_deleted WHERE `products`.`id` = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $stmt->bindParam('is_deleted', $_is_deleted);
    $result = $stmt->execute();
    // $product = $stmt->fetch();

    if($result){
        $_SESSION['message'] = "Product is Trashed successfully.";
    }
    else{
        $_SESSION['message'] = "Product is not Trashed.";
    }

    header('location:index.php');

    return $products;

}


public function update(){

        
    // echo "<pre>";
    //  print_r($_POST);
    //  echo "</pre>";

    $approot = $_SERVER['DOCUMENT_ROOT']."/OOP/";

    //working with image
    if($_FILES['picture']['name'] != ""){
        $_file_name = "IMG_".time()."_".$_FILES['picture']['name'];

    $target = $_FILES['picture']['tmp_name'];
    $destination = $approot.'upload/'.$_file_name;
    $is_file_moved = move_uploaded_file($target, $destination);
    // var_dump($is_file_moved);

    if($is_file_moved){
        $picture = $_file_name;
    }
    else{
        $picture = null;
    }
    }else{
        $picture = $_POST['old_picture'];
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $short_des = $_POST['short-des'];
    $long_des = $_POST['long-des'];
    $mrp = $_POST['mrp'];


    //Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //insert command
    $query = "UPDATE `products` SET `short_des` = :short_des, `long_des` = :long_des, `mrp` = :mrp, `title` = :title, `pictures` = :pictures WHERE `products`.`id` = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam('id', $id);
    $stmt->bindParam('title', $title);
    $stmt->bindParam('short_des', $short_des);
    $stmt->bindParam('long_des', $long_des);
    $stmt->bindParam('mrp', $mrp);
    $stmt->bindParam('pictures', $picture);


    $result = $stmt->execute();

    $result = $stmt->execute();

    if($result){
        $_SESSION['message'] = "Product is Updated successfully.";
    }
    else{
        $_SESSION['message'] = "Product is not updated.";
    }

    header('location:index.php');

    return $products;

}
    
}

?>