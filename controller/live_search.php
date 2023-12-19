<?php
require "config.php";
include "../controller/logs.php";

header('Content-Type: application/json;charset=utf8');

// Connect to the database using PDO concept
$pdo = new PDO("mysql:host=$DBservername;dbname=$DB;charset=utf8", $DBusername, $DBpasswordd);

// Check the query parameter
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $stmt = $pdo->prepare("SELECT id, name, type, price, file FROM products WHERE name LIKE ?");
    $stmt->execute(["%$query%"]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $searchResults = [];

    if ($results) {
        foreach ($results as $row) {
            $searchResults[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'type' => $row['type'],
                'price' => $row['price'],
                'image' => $row['file']
            ];
        }
    } 

    $log = "Run livesearch function";
        logger($log);
    echo json_encode($searchResults);
} else {
    echo json_encode([]);
}
?>
