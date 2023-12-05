<?php
// require "config.php"; 

// connecting to the database using pdo concept  >>>
// $pdo = new PDO("mysql:host=$DBservername;dbname=$DB;charset=utf8", $DBusername, $DBpasswordd);

// $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // << Get the current page using url
// $itemsPerPage = isset($_GET['show']) ? (int)$_GET['show'] : 10; 
// $offset = ($current_page - 1) * $itemsPerPage;


//SQL query to fetch >>>
// $stmt = $pdo->prepare("SELECT * FROM products LIMIT :limit OFFSET :offset");
// $stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
// $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
// $stmt->execute();
// $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// << check on the products
// if (count($products) > 0) {
//     $count = 0;
//     foreach ($products as $product) {
        // << 4 products per row
        // if ($count % 4 == 0) {
        //     echo '<div class="row justify-content-start" id="row">';
        // }
        
        // << returning the html structure
        // echo '<div class="col-md-3">';
        // echo '<a href="product?id=' . htmlspecialchars($product['id']) . '">';
        // echo '<div class="products">';
        // echo '<div class="product-image">';
        // echo '<a href="product?id=' . htmlspecialchars($product['id']) . '" class="images">';
        // echo '<img src="' . htmlspecialchars($product['file']) . '" alt="' . htmlspecialchars($product['name']) . '" class="pic img-fluid">';
        // echo '</a>';
        // echo '<div class="links">';
        // echo '<div class="Icon"><a href="#"><i class="bi bi-cart3"></i></a><span class="tooltiptext">Add to cart</span></div>';
        // echo '<div class="Icon"><a href="#"><i class="bi bi-heart"></i></a><span class="tooltiptext">Move to wishlist</span></div>';
        // echo '</div>';
        // echo '</div>';
        // echo '<div class="Content">';
        // echo '<h3 style="font-size: 25px;">' . htmlspecialchars($product['name']) . '</h3>';
        // echo '<p class="detailsinfo"><span class="typetrip">' . htmlspecialchars($product['type']) . '</span></p>';
        // echo '<p class="detailsinfo"><span class="typetrip">';
        // if ($product["outofstock"] == 1) {
        //     echo '<span style="color: red;  font-size: 16px;">Out of stock</span>';
        // } else {
        //     echo '<span style="color: green; font-size: 16px;">In stock</span>';
        // }
        // echo '</span></p>';
        // echo '<div class="cost"><p class="lower-price">From <span class="price">' . htmlspecialchars($product['price']) . ' EGP</span></p></div>';
        // echo '</div>';
        // echo '</div>';
        // echo '</a>';
        // echo '</div>';

        // << close the row after 4 products
//         if (($count + 1) % 4 == 0 || ($count + 1) == count($products)) {
//             echo '</div>';
//         }
//         $count++;
//     }
// } else {
//     echo "<p>No products found.</p>";
// }
