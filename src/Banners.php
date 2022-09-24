<?php
namespace Bitm;

use PDO;

class banners
{
    public $id = null;
    public $title = null;
    public $link = null;

    public $conn = null;

    public function __construct(){

     //Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $this->conn = new PDO("mysql:host=$servername;dbname=oop", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }




public function index(){
    session_start();

   


    //insert command
    $query = "SELECT * FROM `banners` WHERE is_deleted = 0";

    $stmt = $this->conn->prepare($query);

    $result = $stmt->execute();

    $banners = $stmt->fetchAll();

    return $banners;

}


public function store(){

    session_start();

   $picture = $this->upload();


    if(array_key_exists('is_active', $_POST)){
        $is_active = $_POST['is_active'];
    }
    else{
        $is_active = 0;
    }


    $_title = $_POST['title'];
    $link = $_POST['link'];
    $message = $_POST['messages'];
    $detail = $_POST['details'];
    $created_at = date("Y-m-d H:i:s", time());
    // $is_active = $_POST['is_active'];
    // $picture = $_POST['picture'];



    //Insert command
    $query = "INSERT INTO `banners` (`title`, `link`, `messages`, `details`, `is_active`, `created_at`, `pictures`) VALUES (:title, :link, :messages, :details , :is_active, :created_at, :pictures)";               //: = place holder

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam('title', $_title);
    $stmt->bindParam('link', $link);
    $stmt->bindParam('messages', $message);
    $stmt->bindParam('details', $detail);
    $stmt->bindParam('is_active', $is_active);
    $stmt->bindParam('created_at', $created_at);
    $stmt->bindParam('pictures', $picture);

    $result = $stmt->execute();
    

    if($result){
        $_SESSION['message'] = "Banner is added successfully.";
    }
    else{
        $_SESSION['message'] = "Banner is not added.";
    }

    header('location:index.php');

    // var_dump($result);

}

public function show(){

    $_id = $_GET['id'];
    // var_dump($_GET);

 


    //insert command
    $query = "SELECT * FROM `banners` WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $result = $stmt->execute();
    $banner = $stmt->fetch();

    // var_dump($banner);
    return $banner;
}


public function delete(){
        
    $_id = $_GET['id'];
    // var_dump($_GET);

    session_start();

   


    //insert command
    $query = "DELETE FROM `banners` WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $result = $stmt->execute();

    if($result){
        $_SESSION['message'] = "Banner is deleted successfully.";
    }
    else{
        $_SESSION['message'] = "Banner is not deleted.";
    }

    header('location:index.php');

    return $banners;

}


public function edit(){

    // $webroot = "http://localhost/OOP/";

    $_id = $_GET['id'];
    // var_dump($_GET);



    //insert command
    $query = "SELECT * FROM `banners` WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $result = $stmt->execute();
    $banner = $stmt->fetch();

    // var_dump($banner);
    return $banner;

}


public function restore(){

    $_id = $_GET['id'];
    $_is_deleted = 0;             //trash korle amra rekhe dibo, so=1.
    // var_dump($_GET);

    session_start();




    //insert command
    $query = "UPDATE `banners` SET `is_deleted` = :is_deleted WHERE `banners`.`id` = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $stmt->bindParam('is_deleted', $_is_deleted);
    $result = $stmt->execute();

    if($result){
        $_SESSION['message'] = "Banner is restore successfully.";
    }
    else{
        $_SESSION['message'] = "Banner is not restore.";
    }

    header('location:index.php');
    // $banner = $stmt->fetch();

    // var_dump($banner);
    // return $banner;
}


public function trash_index(){

    session_start();

 


    //insert command
    $query = "SELECT * FROM `banners` WHERE is_deleted = 1";

    $stmt = $this->conn->prepare($query);

    $result = $stmt->execute();

    $banners = $stmt->fetchAll();

    // var_dump($banners);

    return $banners;
}


public function trash(){

        
    $_id = $_GET['id'];
    $_is_deleted = 1;             //trash korle amra rekhe dibo, so=1.
    // var_dump($_GET);

    session_start();


    //insert command
    $query = "UPDATE `banners` SET `is_deleted` = :is_deleted WHERE `banners`.`id` = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam('id', $_id);
    $stmt->bindParam('is_deleted', $_is_deleted);
    $result = $stmt->execute();

    if($result){
        $_SESSION['message'] = "Banner is trashed successfully.";
    }
    else{
        $_SESSION['message'] = "Banner is not trashed.";
    }

    header('location:index.php');
    // $banner = $stmt->fetch();

    // var_dump($banner);
    return $banners;

}


public function update(){

    session_start();

    // $approot = $_SERVER['DOCUMENT_ROOT']."/OOP/";

   $picture = $this->upload();


    if(array_key_exists('is_active', $_POST)){
        $is_active = $_POST['is_active'];
    }
    else{
        $is_active = 0;
    }

    $modified_at = date("Y-m-d H:i:s", time());


    $_id = $_POST['id'];
    $_title = $_POST['title'];
    $link = $_POST['link'];
    $message = $_POST['messages'];
    $detail = $_POST['details'];
    // $is_active = $_POST['is_active'];


    //Insert command
    $query = "UPDATE `banners` SET `title` = :title, `link` = :link, `messages` = :messages, `details` = :details, `is_active` = :is_active, `modified_at` = :modified_at, `pictures` = :pictures WHERE `banners`.`id` = :id";           //placeholder    //: = place holder

    $stmt = $this->conn->prepare($query); 

    $stmt->bindParam('id', $_id);
    $stmt->bindParam('title', $_title);
    $stmt->bindParam('link', $link);
    $stmt->bindParam('messages', $message);
    $stmt->bindParam('details', $detail);
    $stmt->bindParam('is_active', $is_active);
    $stmt->bindParam('modified_at', $modified_at);
    $stmt->bindParam('pictures', $picture);

    $result = $stmt->execute();

    if($result){
        $_SESSION['message'] = "Banner is Updated successfully.";
    }
    else{
        $_SESSION['message'] = "Banner is not updated.";
    }

    header('location:index.php');

    // var_dump($result);

}



private function upload(){
    $approot = $_SERVER['DOCUMENT_ROOT']."/OOP/";

    $picture = null;
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

    }else{
        $picture = $_POST['old_picture'];
    }

    return $picture;

}

}


?>