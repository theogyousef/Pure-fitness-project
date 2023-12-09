<?php
session_start();

if (isset($_POST['updatecart'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    foreach ($_SESSION['products'] as $key => $product) {
        if ($product['id'] == $productId) {
            $_SESSION['products'][$key]['quantity'] = $newQuantity;
            break; 
        }
    }

    echo json_encode(['status' => 'success']);
    exit();
}

echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
exit();
?>
