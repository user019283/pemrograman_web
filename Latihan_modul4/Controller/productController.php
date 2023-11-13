<?php

namespace Controller;

include "Traits/responseFormatter.php";
include "Controller/controller.php";

use Traits\ResponseFormatter;


// Ini adalah class controller product
class ProductController extends Controller
{
    use ResponseFormatter;

    // MAGIC METHOD, diakses pada saat pembuatan method
    public function __construct()
    {
        $this->controllerName = "Get All Product";
        $this->controllerMethod = "GET";
    }

    //METHOD UNTUK GET DATA PRODUK
    public function getAllProduct()
    {
        $dummydata = [
            "Air Mineral",
            "Kebab",
            "Makaroni",
            "Jus Jambu"
        ];

        $response = [
            "controller_attribute" => $this->getControllerAttribute(),
            "product" => $dummydata
        ];

        return $this->responseFormatter(200, "Success", $response);
    }
}
