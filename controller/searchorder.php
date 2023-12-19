<?php
require "config.php"; 
include "../controller/logs.php";

$searchTerm = isset($_GET['orderId']) ? $_GET['orderId'] : '';

$htmlOutput = isset($_GET['html']) && $_GET['html'] == 'true';

if ($searchTerm !== '') {
    $query = "SELECT o.*, od.* FROM orders o JOIN orders_details od ON o.order_id = od.order_id WHERE o.order_id LIKE ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }

    $searchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param('s', $searchTerm);
} else {
    $query = "SELECT o.*, od.* FROM orders o JOIN orders_details od ON o.order_id = od.order_id";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }
}

$stmt->execute();

$result = $stmt->get_result();

$orders = $result->fetch_all(MYSQLI_ASSOC);
$log = "Run searchOrder function";
        logger($log);

if ($htmlOutput) {
    foreach ($orders as $order) {
        echo "<tr>
                <td>" . htmlspecialchars($order['order_id']) . "</td>
                <td>" . htmlspecialchars($order['status']) . "</td>
                <td>" . htmlspecialchars($order['Date']) . " at " . htmlspecialchars($order['time']) . "</td>
                <td>" . htmlspecialchars($order['total']) . "</td>
                <td><a href='editorder?id=" . htmlspecialchars($order['order_id']) . "' style='color: orange;'><span class='fas fa-edit'></span></a></td>
                <td><a href='vieworder?id=" . htmlspecialchars($order['order_id']) . "' style='color: green;'><span class='fas fa-list-ol'></span></a></td>
              </tr>";
    }
} else {
    echo json_encode($orders);
}

$stmt->close();

$conn->close();
?>
