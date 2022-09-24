<?php

// $approot = $_SERVER['DOCUMENT_ROOT'].'/OOP/';

// include_once($approot.'vendor/autoload.php');

include_once($_SERVER['DOCUMENT_ROOT']).'/OOP/config.php';


use Bitm\Banners;

$_banner = new Banners();
$_banner->restore();

?>