<?php

require '../controller/config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);

} else {
    header("Location: registeration.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


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
            <div class="row mb-3">
                <div class="col-md-2">
                    <select class="form-select" aria-label="Availability">
                        <option selected>Availability</option>
                        <option value="1">In Stock</option>
                        <option value="2">Out of Stock</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <select class="form-select" aria-label="Category">
                        <option selected>Category</option>
                        <option value="1">All Benches</option>
                        <option value="2">Flat Benches</option>
                        <option value="3">Adjustable Benches</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <select class="form-select" aria-label="Price">
                        <option selected>Price</option>
                        <option value="1">Under $300</option>
                        <option value="2">$300 to $400</option>
                        <option value="3">$400 and above</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <select class="form-select" aria-label="Bench Type">
                        <option selected>Bike Type</option>
                        <option value="1">Olympic Benches</option>
                        <option value="2">Standard Benches</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <select class="form-select" aria-label="Rating">
                        <option selected>Rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <select class="form-select" aria-label="Manual">
                        <option selected>Manual</option>
                        <option value="1">User Manual</option>
                        <option value="2">Installation Guide</option>
                    </select>
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
            <div class="row">
                <!-- Product 1 -->
                <div class="col-md-2">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/DHZ-Cable-Cross-Evost-Model-E1017C-e1689547675848.webp"
                                    alt="ASSAULT AIRBIKE" class="pic img-fluid" style="margin-top: -28px;">
                            </a>
                            <div class="links">
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-cart3"></i></a>
                                    <span class="tooltiptext">Add to cart</span>
                                </div>
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-heart"></i></a>
                                    <span class="tooltiptext">Move to wishlist</span>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <h3 style="font-size: 25px;">HZ Cable Cross (Evost Model) E1017C</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">SHOP</span> <span class="separate"></span> <span
                                    class="nofdays">HOME GYM</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">58.500 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Second Product -->
                <div class="col-md-2">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/DHZ5.webp" alt="ASSAULT AIRBIKE"
                                    class="pic img-fluid">
                            </a>
                            <div class="links">
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-cart3"></i></a>
                                    <span class="tooltiptext">Add to cart</span>
                                </div>
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-heart"></i></a>
                                    <span class="tooltiptext">Move to wishlist</span>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <h3 style="font-size: 25px;">DHZ-T-Bar (Evost Model) E3061</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">SHOP</span>
                                <span class="separate"></span> <span class="nofdays">HOME GYM</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">15.000 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Third Product -->
                <div class="col-md-2">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/DHZ3.webp" alt="ASSAULT AIRBIKE"
                                    class="pic img-fluid">
                            </a>
                            <div class="links">
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-cart3"></i></a>
                                    <span class="tooltiptext">Add to cart</span>
                                </div>
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-heart"></i></a>
                                    <span class="tooltiptext">Move to wishlist</span>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <h3 style="font-size: 25px;">DHZ Abdominal Bench (Evost Model) E3037</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">SHOP</span> <span class="separate"></span> <span
                                    class="nofdays">HOME GYM</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">15.000 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fourth Product -->
                <div class="col-md-2">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/DHZ4.webp" alt="ASSAULT AIRBIKE"
                                    class="pic img-fluid">
                            </a>
                            <div class="links">
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-cart3"></i></a>
                                    <span class="tooltiptext">Add to cart</span>
                                </div>
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-heart"></i></a>
                                    <span class="tooltiptext">Move to wishlist</span>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <h3 style="font-size: 25px;">DHZ Adjustable Bench (Evost Model) E3039 </h3>
                            <p class="detailsinfo">
                                <span class="typetrip">SHOP</span> <span class="separate"></span> <span
                                    class="nofdays">HOME GYM</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">13.500 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fifth Product -->
            </div>
        </div>


        <!-- The second container -->
        <div class="container grid-container">
            <div class="row">
                <!-- Product 1 -->
                <div class="col-md-2">
                    <div class="products">
                        <div class="product-image">
                            <a href="../views/product.php" class="images">
                                <img src="../public/photos/productPhotos/DHZ6.webp" alt="ASSAULT AIRBIKE"
                                    class="pic img-fluid" style="margin-top: -28px;">
                            </a>
                            <div class="links">
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-cart3"></i></a>
                                    <span class="tooltiptext">Add to cart</span>
                                </div>
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-heart"></i></a>
                                    <span class="tooltiptext">Move to wishlist</span>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <h3 style="font-size: 25px;">DHZ Smith (Evost Model) E3063</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">SHOP</span> <span class="separate"></span> <span
                                    class="nofdays">HOME GYM</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">538.000 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Second Product -->
                <div class="col-md-2">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/DHZ7.webp" alt="ASSAULT AIRBIKE"
                                    class="pic img-fluid">
                            </a>
                            <div class="links">
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-cart3"></i></a>
                                    <span class="tooltiptext">Add to cart</span>
                                </div>
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-heart"></i></a>
                                    <span class="tooltiptext">Move to wishlist</span>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <h3 style="font-size: 25px;">DHZ Calf Bench (Evost Model) E3062</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">SHOP</span>
                                <span class="separate"></span> <span class="nofdays">HOME GYM</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">13.000 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Third Product -->
                <div class="col-md-2">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/DHZ8.webp" alt="ASSAULT AIRBIKE"
                                    class="pic img-fluid">
                            </a>
                            <div class="links">
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-cart3"></i></a>
                                    <span class="tooltiptext">Add to cart</span>
                                </div>
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-heart"></i></a>
                                    <span class="tooltiptext">Move to wishlist</span>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <h3 style="font-size: 25px;">DHZ Olympic Incline Bench (Evost Model) E3042</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">SHOP</span> <span class="separate"></span> <span
                                    class="nofdays">HOME GYM</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">19.500 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fourth Product -->
                <div class="col-md-2">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/DHZ10.webp" alt="ASSAULT AIRBIKE"
                                    class="pic img-fluid">
                            </a>
                            <div class="links">
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-cart3"></i></a>
                                    <span class="tooltiptext">Add to cart</span>
                                </div>
                                <div class="Icon">
                                    <a href="#"><i class="bi bi-heart"></i></a>
                                    <span class="tooltiptext">Move to wishlist</span>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <h3 style="font-size: 25px;">DHZ Dumbbells Rack (Evost Model) E3077</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">SHOP</span> <span class="separate"></span> <span
                                    class="nofdays">HOME GYM</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">17.000 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fifth Product -->
            </div>
        </div>
    </main>
    <footer>
        <?php
        include "footer.php" ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../public/JS/collections.js"></script>


</body>

</html>