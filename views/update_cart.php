<?php
session_start();

if (isset($_POST['updatecart'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    // Update the quantity in the session based on the product ID
    foreach ($_SESSION['products'] as $key => $product) {
        if ($product['id'] == $productId) {
            $_SESSION['products'][$key]['quantity'] = $newQuantity;
            break; // Stop the loop once the product is found
        }
    }

    // Return a response (this is optional and depends on your needs)
    echo json_encode(['status' => 'success']);
    exit();
}

// Return an error response if needed
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
exit();
?>
