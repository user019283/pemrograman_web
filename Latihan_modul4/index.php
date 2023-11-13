<?php

include "Controller/productController.php";

use Controller\ProductController;

// Deklarasi objek kelas
$productController = new ProductController;

echo $productController->getAllProduct();
