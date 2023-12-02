<?php
// quickview.php

include "../model/ProductModle.php";

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $productDetails = ProductModle::getProductById($productId);

    $productDetails['file'] = '' . $productDetails['file'];

    header('Content-Type: application/json');
    echo json_encode($productDetails);
        exit;
}

?>
