<?php
require '../controller/config.php';


// Assuming you have already connected to the database ($conn)
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login");
}


// Initialize the 'products' array in the session if not set
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array();
}

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

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

        if (isset($_POST['addtocart'])) {
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

        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = array();
        }

        if (isset($_POST['addtowishlist'])) {
            // If the wishlist array is set, check if the product already exists
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
    } else {
        echo '<p>No product details found.</p>';
    }
} else {
    echo '<p>Product ID is not provided.</p>';
}
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include the ElevateZoom plugin -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>



    <title>product</title>
    <style>
        <?php
        include "../public/css/index.css"
        ?><?php
            include "../public/css/product.css"
            ?>
    </style>
</head>

<body>


    <main class="container my-5">
        <section class="product-details">
            <div class="row">
                <div class="col-md-6">
                    <!-- Product image -->
                    <div class="magnifier-container" style="position: relative;">
                        <img id="mainProductImage" src="<?php echo $productDetails['file']; ?>" alt="Product Image" class="img-fluid" style="height: 500px;">
                        <div class="magnify-glass" id="magnifyGlass"></div>
                        <div class="images p-3">
                            <!-- Add a container for the magnifier -->
                            <img onmouseover="change_image(this)" src="../public/photos/productPhotos/DH66(2).webp" width="70" class="thumbnail-image">
                            <img onmouseover="change_image(this)" src="../public/photos/productPhotos/DHZ6.webp" width="70" class="thumbnail-image">
                            <img onmouseover="change_image(this)" src="../public/photos/productPhotos/DHZ6(3).webp" width="70" class="thumbnail-image">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Product details -->
                    <p class="detailsinfo">
                        <span class="nofdays">
                            <?php echo $productDetails['type']; ?>
                        </span>
                    </p>
                    <h1>
                        <?php echo $productDetails['name']; ?>
                    </h1>
                    <h3 class="price">

                        <?php echo  number_format($productDetails['price'], 2);
                        " EGP"; ?>
                    </h3>
                    <p class="description">
                        <?php echo $productDetails['description']; ?>
                    </p>
                    <?php

                    $pid = $_GET['id'];
                    $osql = "SELECT VALUE FROM `product_options_values` WHERE product_id=$pid;";
                    $resulte = $conn->query($osql);
                    if ($resulte->num_rows > 0) {
                        // Fetch and display the data
                        while ($row = $resulte->fetch_assoc()) {
                            echo "<p class='options'>{$row['VALUE']}</p>";
                        }
                    } else {
                        echo "<p>No options found for product with ID: $pid</p>";
                    }
                    ?>

                    <p class="detailsinfo">
                        <?php
                        if ($productDetails["stock"] < 1) {
                            echo '<span style="color: red;  font-size: 16px; "> Out of Stock </span>';
                        } else if ($productDetails["stock"] > 0) {
                            echo '<span style="color: green; font-size: 16px;">' . "In stock" . '</span>';
                        }
                        ?>
                    </p>
                    <!-- Quantity input -->

                    <!-- Add to wishlist button -->

                    <div class="button-container">


                        <!-- Add to Cart button -->
                        <?php if ($productDetails["stock"] > 0) { ?>
                            <form action="" method="post">
                                <div class="input-group mb-2" id="input-group">
                                    <button class="btn btn-outline-secondary" type="button" id="decrement">-</button>
                                    <input type="text" name="quantity" id="quantity" class="form-control text-center small" value="1" readonly>
                                    <button class="btn btn-outline-secondary" type="button" id="increment">+</button>
                                </div>

                                <button class="btn btn-primary bg-dark add-to-cart-button" name="addtocart">Add to
                                    Cart</button>
                            </form>
                        <?php } else if ($productDetails["stock"] < 1) { ?>
                            <form action="" method="post">
                                <button class="btn btn-primary bg-dark add-to-cart-button" name="addtocart" style="border: black;" disabled>
                                    Add to Cart
                                </button>
                            </form>
                        <?php } ?>

                        <!-- Wishlist button -->
                        <form action="" method="post" class="wishlist-form">
                            <input type="hidden" name="addtowishlist" value="<?php echo $wishlistProduct['id']; ?>">
                            <button type="submit" class="wishlist-button" style="border: none; background-color: white;">
                                <i class="bi bi-heart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- You may also like section -->
        <section class="you-may-also-like">
            <h2>Similar products</h2>
            <div class="row">
                <?php
                // Fetch related products based on the type of the main product
                $relatedProductsQuery = "SELECT * FROM products WHERE type = '{$productDetails['type']}' AND id != {$productDetails['id']} LIMIT 4";
                $relatedProductsResult = mysqli_query($conn, $relatedProductsQuery);

                if ($relatedProductsResult && mysqli_num_rows($relatedProductsResult) > 0) {
                    while ($relatedProduct = mysqli_fetch_assoc($relatedProductsResult)) {
                ?>
                        <div class="col-md-3 col-sm-6">
                            <a href="product?id=<?php echo $relatedProduct['id']; ?>">
                                <div class="products">
                                    <div class="product-image">
                                        <img src="<?php echo $relatedProduct['file']; ?>" alt="<?php echo $relatedProduct['name']; ?>" class="pic img-fluid">

                                        <div class="links">
                                            <div class="Icon">
                                                <i class="bi bi-cart3"></i>
                                                <span class="tooltiptext">Add to cart</span>
                                            </div>
                                            <div class="Icon">
                                                <i class="bi bi-heart"></i>
                                                <span class="tooltiptext">Move to wishlist</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Content">
                                        <h3>
                                            <?php echo $relatedProduct['name']; ?>
                                        </h3>
                                        <p class="detailsinfo">
                                            <span class="typetrip">
                                                <?php echo $relatedProduct['type']; ?>
                                            </span>
                                        </p>
                                        <div class="cost">
                                            <p class="lower-price">
                                                From <span class="price">
                                                    <?php echo number_format($relatedProduct['price'], 2);
                                                    " EGP"; ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                } else {
                    echo '<p>No related products found.</p>';
                }
                ?>
            </div>
        </section>

    </main>

    <footer>
        <?php
        include "footer.php" ?>
    </footer>

    <script src="../public/JS/product.js"></script>



    <script>
        $(document).ready(function() {
            function change_image(element) {
                var newImageSrc = $(element).attr('src');
                $('#mainProductImage').attr('src', newImageSrc).data('zoom-image', newImageSrc);

                $('.zoomContainer').remove();
                $('#mainProductImage').elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair"
                });
            }
            $('#mainProductImage').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair"
            });

            $('.thumbnail-image').on('mouseover', function() {
                change_image(this);
            });

        });
    </script>

</body>

</html>