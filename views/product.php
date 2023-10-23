<?php


require '../controller/config.php';
if(!empty($_SESSION["id"])){
$id = $_SESSION["id"];
$result = mysqli_query($conn , "SELECT * FROM users WHERE id = '$id'  ") ;
$row = mysqli_fetch_assoc($result);

}
else {
    header("Location: registeration.php");
}

    include "header.php"
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>product</title>
    <style> 
    <?php
    include "../public/css/index.css"
?>
    <?php
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
              <img id="mainProductImage" src="../public/photos/productPhotos/ASSAULT AIRBIKE.webp" alt="Product Image" class="img-fluid" style="height: 500px;">
              <div class="images p-3">
                  <!-- Add a container for the magnifier -->
                  <div class="thumbnail text-center">
    <img onmouseover="change_image(this)" src="../public/photos/productPhotos/ASSAULT AIRBIKE2.webp" width="70">
    <img onmouseover="change_image(this)" src="../public/photos/productPhotos/ASSAULT AIRBIKE.webp" width="70">
    <img onmouseover="change_image(this)" src="../public/photos/productPhotos/assu.webp" width="70">
</div>

              </div>
          </div>
          
            <div class="col-md-6">
                <!-- Product details -->
                <p class="detailsinfo">
                <span class="typetrip">CARDIO /</span> <span class="separate"></span> <span class="nofdays">BIKES</span>
              </p>
                <h1>Assault Classic Airbike</h1>
                <h3 class="price">39.500 EGP</h3>
                <p class="description">A heavy-duty exercise bike designed directly from the feedback of athletes and coaches. Designed in the USA. Warranty & Maintenance one year for FREE.</p>
                <!-- Quantity input -->
                <div class="input-group mb-2" id="input-group">
                    <button class="btn btn-outline-secondary" type="button" id="decrement" >-</button>
                    <input type="text" id="quantity" class="form-control text-center small" value="1" readonly>
                    <button class="btn btn-outline-secondary" type="button" id="increment">+</button>
                </div>
                <!-- Add to Cart button -->
                <button class="btn btn-primary bg-dark add-to-cart-button">Add to Cart</button>
            </div>
          </div>
        </section>
    
        <!-- You may also like section -->
        <section class="you-may-also-like">
            <h2>You May Also Like</h2>
            <div class="row">
                <!-- Product 1 -->
                <div class="col-md-3 col-sm-6">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/Concept 2 PM5 BikeErg.png" alt="Concept 2 PM5 BikeErg" class="pic img-fluid">
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
                            <h3>Concept 2 PM5 BikeErg</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">CARDIO</span> <span class="separate"></span> <span class="nofdays">BIKES</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">72.000 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Second Product -->
                <div class="col-md-3 col-sm-6">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/Flat-Bench.webp" alt="Flat-Bench" class="pic img-fluid">
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
                            <h3>Flat Bench</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">CROSSFIT EQUIPMENT</span> 
                                <span class="separate"></span> <span class="nofdays">BENCHES</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">5.850 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Third Product -->
                <div class="col-md-3 col-sm-6">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/Concept 2 SkiErg.png" alt="Concept 2 SkiErg" class="pic img-fluid">
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
                            <h3>Concept 2 SkiErg</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">CARDIO</span> <span class="separate"></span> <span class="nofdays">SKIERGS</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">72.000 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fourth Product -->
                <div class="col-md-3 col-sm-6">
                    <div class="products">
                        <div class="product-image">
                            <a href="#" class="images">
                                <img src="../public/photos/productPhotos/ASSAULT AIRBIKE.webp" alt="ASSAULT AIRBIKE" class="pic img-fluid">
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
                            <h3>ASSAULT AIRBIKE</h3>
                            <p class="detailsinfo">
                                <span class="typetrip">CARDIO</span> <span class="separate"></span> <span class="nofdays">BIKES</span>
                            </p>
                            <div class="cost">
                                <p class="lower-price">
                                    From <span class="price">72.000 EGP</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fifth Product -->
            </div>
        </section>
 </main>

<footer>
    <?php
    include "footer.php"?>
  </footer>

  <script src="../public/JS/product.js"></script>

</body>
</html>