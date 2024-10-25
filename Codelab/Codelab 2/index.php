<?php
include 'Controllers/ProductController.php';

use Controller\ProductController;

$productContoller = new ProductController;

echo $productContoller -> getAllProduct();
 ?>
