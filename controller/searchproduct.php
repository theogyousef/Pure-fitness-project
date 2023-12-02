<?php
require "config.php";

$searchTerm = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : '';

$query = $searchTerm !== '' ? "SELECT * FROM products WHERE name LIKE '%{$searchTerm}%' OR type LIKE '%{$searchTerm}%'" : "SELECT * FROM products";

$result = mysqli_query($conn, $query);

if(!$result) {
    echo "An error occurred: " . mysqli_error($conn);
    exit;
}

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['html']) && $_GET['html'] == 'true') {
    foreach ($products as $product) {
        echo "<tr>
                <td>{$product['id']}</td>
                <td>{$product['name']}</td>
                <td>{$product['type']}</td>
                <td>{$product['price']}</td>
                <td>" . ($product['outofstock'] == 1 ? 'Out of stock' : 'In stock') . "</td>
                <td><a href='editproduct?id={$product['id']}' style='color: orange;'><span class='fas fa-edit'></span></a></td>
                <td><a href='deleteproduct?id={$product['id']}' style='color: red;'><span class='fas fa-trash-alt'></span></a></td>
              </tr>";
    }
} else {
    echo json_encode($products);
}

?>