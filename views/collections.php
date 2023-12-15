<?php
require '../controller/config.php';
require '../model/productModle.php';


if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    $result = mysqli_query($conn, " SELECT p.*, u.* FROM permissions p JOIN users u ON p.user_id = u.id WHERE p.guest = '1' ");
    $row = mysqli_fetch_assoc($result);
    $_SESSION["login"] = true;
    $_SESSION["id"] = $row["id"];
} else if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login");
}

if ($row["deactivated"] == 1) {
    header("Location: deactivated");
}
include "header.php"
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        <?php
        include "../public/css/collections.css";
        ?>
    </style>

</head>

<body>

    <main>
        <div class="container mt-4">
            <h1 style="font-size: 40px; font-family: Belleza,Frunchy Sage,Glacial Indifference,serif;">Home Gym</h1>

            <!-- Filters -->
            <div class="row mb-3" id="filters">
                <div class="col-md-2">
                    <form class="filter" id="filterF" method="post">
                        <select class="form-select filter-select" aria-label="Availability" name="availability"
                            data-form-id="filterF">
                            <option selected disabled>Availability</option>
                            <option value="1">In Stock</option>
                            <option value="2">Out of Stock</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-2">
                    <form class="filter" id="filterCategory" method="post">
                        <select class="form-select filter-select" aria-label="Category" name="category"
                            data-form-id="filterCategory">
                            <option selected disabled>Category</option>
                            <option value="1">All Benches</option>
                            <option value="2">All Bicycle</option>
                            <option value="3">All Cardio</option>
                            <option value="4">All Sleds</option>
                            <option value="5">All Plates</option>
                            <option value="6">All Collars</option>
                            <option value="7">All Ropes</option>
                            <option value="8">All Boxs</option>
                            <option value="9">All Steps</option>
                            <option value="10">All Weighted balls</option>
                            <option value="11">All Racks</option>
                            <option value="12">All Dumbells</option>
                            <option value="13">All Cable Extensions</option>
                            <option value="14">All Barbell</option>
                            <option value="15">All Kettlebell</option>
                        </select>
                    </form>
                </div>

                <div class="col-md-2">
                    <form class="filter" id="filterForm" method="post">
                        <select class="form-select filter-select" aria-label="Price" name="price"
                            data-form-id="filterForm">
                            <option selected disabled>Price</option>
                            <option value="4">Highest To Lowest </option>
                            <option value="5">Lowest To Highest</option>
                            <option value="1">Under 10000</option>
                            <option value="2">10000 to 40000</option>
                            <option value="3">40000 and above</option>
                        </select>
                    </form>
                </div>


                <div class="col-md-2" id="reset">
                    <form method="post" action="">
                        <div class="col-md-2">
                            <button name="reset" style="background-color: black;" type="submit"
                                class="btn btn-primary">Reset</button>
                        </div>
                    </form>
                </div>

            </div>


            <!-- grid and list buttons-->
            <div class="container mb-3 mt-3">
                <button class="btn btn-light btn-grid">
                    <i class="bi bi-grid-3x3-gap"></i>
                </button>

                <button class="btn btn-light btn-list">
                    <i class="bi bi-list"></i>
                </button>
            </div>
            <!-- Product cards -->
            <!-- ... -->
        </div>
        <div class="container grid-container">
            <?php

            $result = ProductModle::allProducts();



            // Fetch products from the database based on the selected price filter
            
            if (isset($_POST['price'])) {
                $selectedPrice = isset($_POST['price']) ? $_POST['price'] : null;
                switch ($selectedPrice) {
                    case 1:
                        $result = ProductModle::getProductsByPriceRange(0, 10000);
                        break;
                    case 2:
                        $result = ProductModle::getProductsByPriceRange(10000, 40000);
                        break;
                    case 3:
                        $result = ProductModle::getProductsByPriceRange(40000, PHP_INT_MAX);
                        break;
                    case 4:
                        $result = ProductModle::highesttolowest();
                        break;
                    case 5:
                        $result = ProductModle::lowesttohighest();
                        break;
                    default:
                        // No price filter, fetch all products
                        $result = ProductModle::allProducts();
                }
            } elseif (isset($_POST['availability'])) { // Assuming you have already connected to the database ($conn)
            
                // Fetch products from the database
                $instock = isset($_POST['availability']) ? $_POST['availability'] : null;

                switch ($instock) {
                    case 1:
                        $result = ProductModle::inStock();
                        break;
                    case 2:
                        $result = ProductModle::OutOfStock();
                        break;
                    default:
                        // No price filter, fetch all products
                        $result = ProductModle::allProducts();
                }
            } elseif (isset($_POST['category'])) { // Assuming you have already connected to the database ($conn)
            
                // Fetch products from the database
                $cat = isset($_POST['category']) ? $_POST['category'] : null;


                switch ($cat) {
                    case 1:
                        $result = ProductModle::Benches();
                        break;
                    case 2:
                        $result = ProductModle::Bicycle();
                        break;
                    case 3:
                        $result = ProductModle::Cardio();
                        break;
                    case 4:
                        $result = ProductModle::Sleds();
                        break;
                    case 5:
                        $result = ProductModle::Plates();
                        break;
                    case 6:
                        $result = ProductModle::Collars();
                        break;
                    case 7:
                        $result = ProductModle::Ropes();
                        break;
                    case 8:
                        $result = ProductModle::Boxs();
                        break;
                    case 9:
                        $result = ProductModle::Steps();
                        break;
                    case 10:
                        $result = ProductModle::Weightedballs();
                        break;
                    case 11:
                        $result = ProductModle::Racks();
                        break;
                    case 12:
                        $result = ProductModle::Dumbells();
                        break;
                    case 13:
                        $result = ProductModle::CableExtensions();
                        break;
                    case 14:
                        $result = ProductModle::Barbell();
                        break;
                    case 15:
                        $result = ProductModle::Kettlebell();
                        break;
                    default:
                        // No price filter, fetch all products
                        $result = ProductModle::allProducts();
                }
            } elseif (isset($_POST['reset'])) {

                $result = ProductModle::allProducts();
            }

            // Check if there are any products
            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Loop through products and generate HTML
                $count = 0;
                foreach ($products as $product) {
                    // Open a new row div for every 4 products
                    if ($count % 4 == 0) {
                        echo '<div class="row justify-content-start" id="row">';
                    }
                    ?>
                    <div class="col-md-3" id="product">
                        <form a method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <div class="input-group mb-2" id="input-group">
                                <input type="hidden" name="quantity" id="quantity" class="form-control text-center small" value="1" readonly>
                            </div>
                            <div class="products">
                                <div class="product-image">
                                    <a href="product?id=<?php echo $product['id']; ?>" class="images">
                                        <img src="<?php echo $product['file']; ?>" alt="<?php echo $product['name']; ?>"
                                            class="pic img-fluid">
                                    </a>
                                    <div class="links">
                                        <div class="Icon">
                                            <i class="bi bi-cart3"></i>
                                            <button name="addtocart" class="tooltiptext">Add to cart</button>
                                        </div>
                                        <div class="Icon">
                                            <i class="bi bi-heart"></i>
                                            <button name="addtowishlist" class="tooltiptext">Add to wishlist</button>
                                        </div>
                                    </div>
                                </div>
                                <a href="product?id=<?php echo $product['id']; ?>" class="images">
                                    <div class="Content">
                                        <h3 style="font-size: 25px;">
                                            <?php echo $product['name']; ?>
                                        </h3>
                                        <p class="detailsinfo">
                                            <span class="typetrip">
                                                <?php echo $product['type']; ?>
                                            </span>
                                        </p>
                                        <p class="detailsinfo">
                                            <?php
                                            if ($product["stock"] < 1) {
                                                echo '<span style="color: red;  font-size: 16px; "> Out of Stock </span>';
                                            } else if ($product["stock"] > 0) {
                                                echo '<span style="color: green; font-size: 16px;">' . "In stock" . '</span>';
                                            }
                                            ?>
                                        </p>
                                        <div class="cost">
                                            <p class="lower-price">
                                                From <span class="price">
                                                    <?php 
                                                   
                                                    echo number_format( $product['price'], 2) . " EGP"; ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                            </div>
                            </a>
                        </form>
                    </div>
                    <?php
                    // Close the row div after every 4 products
                    if (($count + 1) % 4 == 0 || ($count + 1) == count($products)) {
                        echo '</div>';
                    }
                    $count++;
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>


        <?php

        if (isset($_POST['addtocart'])) {
            $productId = $_POST["product_id"];


            // Fetch product details based on the product ID
            $sql = "SELECT * FROM products WHERE id = $productId";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $productDetails = mysqli_fetch_assoc($result);

                // Append the new product to the cart
                $newProduct = [
                    'id' => $productDetails['id'],
                    'name' => $productDetails['name'],
                    'price' => $productDetails['price'],
                    'image' => $productDetails['file'],
                    'quantity' => '1',
                ];


                $quantity = $_POST['quantity'];
                $newProduct['quantity'] = $quantity;

                // If the products array is set, check if the product already exists
                $productExists = false;
                foreach ($_SESSION['products'] as $key => $product) {
                    if ($newProduct['id'] == $product['id']) {
                        // If the product exists, update the quantity
                        $_SESSION['products'][$key]['quantity'] += $quantity;
                        $productExists = true;
                        break; // Stop the loop since the product is found
                    }
                }

                // If the product does not exist, add it to the session['products']
                if (!$productExists) {
                    $_SESSION['products'][] = $newProduct;
                }
            }
        }

        if (isset($_POST['addtowishlist'])) {
            $productId = $_POST["product_id"];


            // Fetch product details based on the product ID
            $sql = "SELECT * FROM products WHERE id = $productId";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $productDetails = mysqli_fetch_assoc($result);

                // Append the new product to the cart
                $newProduct = [
                    'id' => $productDetails['id'],
                    'name' => $productDetails['name'],
                    'price' => $productDetails['price'],
                    'image' => $productDetails['file'],
                    'quantity' => '1',
                ];


                $quantity = $_POST['quantity'];
                $newProduct['quantity'] = $quantity;

                // If the products array is set, check if the product already exists
                $productExists = false;
                foreach ($_SESSION['wishlist'] as $key => $product) {
                    if ($newProduct['id'] == $product['id']) {
                        $productExists = true;
                        break; // Stop the loop since the product is found
                    }
                }

                // If the product does not exist, add it to the session['wishlist']
                if (!$productExists) {
                    $_SESSION['wishlist'][] = $newProduct;
                }
            }
        }


        ?>
    </main>
    <footer>
        <?php
        include "footer.php" ?>
    </footer>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->

    <script src="../public/JS/collections.js"></script>

    <script>
        $(document).ready(function () {
            $('.filter-select').change(function () {
                var formId = $(this).data('form-id');
                $('#' + formId).submit();
            });
        });
    </script>
</body>

</html>