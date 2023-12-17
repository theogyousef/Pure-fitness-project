<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

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

$result2 = mysqli_query($conn, "SELECT * from permissions where user_id = '$id';");
$row2 = mysqli_fetch_assoc($result2);
if (!empty($_SESSION['products']) && $row2['guest'] == 1) {
  header("Location: login");
}

if ($row["deactivated"] == 1) {
    header("Location: deactivated");
}
include "header.php";

$selectedCategory = isset($_POST['category']) ? $_POST['category'] : '';

$selectedPrice = isset($_POST['price']) ? $_POST['price'] : '';

$selectedAvailability = isset($_POST['availability']) ? $_POST['availability'] : '';


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

            <div class="row mb-3" id="filters">
                <div class="col-md-2">
                    <form class="filter" id="filterF" method="post">
                        <select class="form-select filter-select" aria-label="Availability" name="availability" data-form-id="filterF">
                            <option value="">Availability</option>
                            <option value="1" <?php echo $selectedAvailability == '1' ? 'selected' : ''; ?>>In Stock</option>
                            <option value="2" <?php echo $selectedAvailability == '2' ? 'selected' : ''; ?>>Out of Stock</option>
                        </select>


                    </form>
                </div>
                <div class="col-md-2">
                    <form class="filter" id="filterCategory" method="post">
                        <select class="form-select filter-select" aria-label="Category" name="category" data-form-id="filterCategory">
                            <option value="">Category</option>
                            <option value="1" <?php echo $selectedCategory == '1' ? 'selected' : ''; ?>>All Benches</option>
                            <option value="2" <?php echo $selectedCategory == '2' ? 'selected' : ''; ?>>All Bicycle</option>
                            <option value="3" <?php echo $selectedCategory == '3' ? 'selected' : ''; ?>>All Cardio</option>
                            <option value="4" <?php echo $selectedCategory == '4' ? 'selected' : ''; ?>>All Sleds</option>
                            <option value="5" <?php echo $selectedCategory == '5' ? 'selected' : ''; ?>>All Plates</option>
                            <option value="6" <?php echo $selectedCategory == '6' ? 'selected' : ''; ?>>All Collars</option>
                            <option value="7"<?php echo $selectedCategory == '7' ? 'selected' : ''; ?>>All Ropes</option>
                            <option value="8" <?php echo $selectedCategory == '8' ? 'selected' : ''; ?>>All Boxs</option>
                            <option value="9" <?php echo $selectedCategory == '9' ? 'selected' : ''; ?>>All Steps</option>
                            <option value="10" <?php echo $selectedCategory == '10' ? 'selected' : ''; ?>>All Weighted balls</option>
                            <option value="11" <?php echo $selectedCategory == '11' ? 'selected' : ''; ?>>All Racks</option>
                            <option value="12"<?php echo $selectedCategory == '12' ? 'selected' : ''; ?>>All Dumbells</option>
                            <option value="13" <?php echo $selectedCategory == '13' ? 'selected' : ''; ?>>All Cable Extensions</option>
                            <option value="14" <?php echo $selectedCategory == '14' ? 'selected' : ''; ?>>All Barbell</option>
                            <option value="15" <?php echo $selectedCategory == '15' ? 'selected' : ''; ?>>All Kettlebell</option>
                        </select>
                    </form>
                </div>

                <div class="col-md-2">
                    <form class="filter" id="filterForm" method="post">
                        <select class="form-select filter-select" aria-label="Price" name="price" data-form-id="filterForm">
                            <option value="">Price</option>
                            <option value="4"  <?php echo $selectedPrice == '4' ? 'selected' : ''; ?>>Highest To Lowest </option>
                            <option value="5"  <?php echo $selectedPrice == '5' ? 'selected' : ''; ?>>Lowest To Highest</option>
                            <option value="1"  <?php echo $selectedPrice == '1' ? 'selected' : ''; ?>>Under 10000</option>
                            <option value="2"  <?php echo $selectedPrice == '2' ? 'selected' : ''; ?>>10000 to 40000</option>
                            <option value="3"  <?php echo $selectedPrice == '3' ? 'selected' : ''; ?>>40000 and above</option>
                        </select>
                    </form>
                </div>


                <div class="col-md-2" id="reset">
                    <form method="post" action="">
                        <div class="col-md-2">
                            <button name="reset" style="background-color: black;" type="submit" class="btn btn-primary">Reset</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="container mb-3 mt-3">
                <button class="btn btn-light btn-grid" style="font-size: 16px; padding: 10px 20px;">
                    <i class="bi bi-grid-3x3-gap"></i>
                </button>

                <button class="btn btn-light btn-list" style="font-size: 16px; padding: 10px 20px;">
                    <i class="bi bi-list"></i>
                </button>
            </div>


        </div>
        <div class="container grid-container">
            <?php

            $result = ProductModle::allProducts();




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
                        $result = ProductModle::allProducts();
                }
            } elseif (isset($_POST['availability'])) {

                $instock = isset($_POST['availability']) ? $_POST['availability'] : null;

                switch ($instock) {
                    case 1:
                        $result = ProductModle::inStock();
                        break;
                    case 2:
                        $result = ProductModle::OutOfStock();
                        break;
                    default:
                        $result = ProductModle::allProducts();
                }
            } elseif (isset($_POST['category'])) {

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
                        $result = ProductModle::allProducts();
                }
            } elseif (isset($_POST['reset'])) {

                $result = ProductModle::allProducts();
            }

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                $count = 0;
                foreach ($products as $product) {
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
                                        <img src="<?php echo $product['file']; ?>" alt="<?php echo $product['name']; ?>" class="pic img-fluid" style="max-height: 270px; max-width: 250px;">
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

                                                    echo number_format($product['price'], 2) . " EGP"; ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                            </div>
                            </a>
                        </form>
                    </div>
            <?php
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

    <script src="../public/JS/collections.js"></script>

    <script>
        $(document).ready(function() {
            $('.filter-select').change(function() {
                var formId = $(this).data('form-id');
                $('#' + formId).submit();
            });
        });
    </script>
</body>

</html>