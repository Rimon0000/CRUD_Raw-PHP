<?php
$approot = $_SERVER['DOCUMENT_ROOT'].'/OOP/';

include_once($approot.'vendor/autoload.php');

use Bitm\Products;


$_product = new Products();
$products = $_product->trash();

?>