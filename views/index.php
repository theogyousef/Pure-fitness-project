<?php

//require "../controller/config.php";
require "../controller/indexMail.php";

// Check for form submissions and perform the corresponding action
if (isset($_POST["submitmail"])) {
  sendmail($email, $firstName);
}
?>

<?php
include '../model/productModle.php';


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


// $j = $row['id'];
// $idt= $row['guest'];
// echo "<script>alert('the id = $j and guest is $idt '); </script>";

include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

  <title>Home Page</title>
  <style>
    <?php include "../public/CSS/index.css" ?><?php include "../public/CSS/back-to-top.css" ?>
  </style>
</head>

<body>

  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="bi bi-chevron-double-up"></i>
  </button>
  <!-- open btn -->
  <!-- <button id="open_cart_btn">
    <a href="#" class="text-decoration-none">
      <i class="bi bi-cart3 text-white fs-4 me-3"></i>
    </a>
  </button> -->

  <!-- backdrop -->
  <div class="backdrop">

    <!-- side cart -->

    <div class="sidecart">
      <div class="cart_content">
        <!-- cart header -->
        <div class="cart_header">

          <div class="header_title">
            <h2>Your Cart</h2>
          </div>
          <span id="close_btn" class="close_btn">&times;</span>
        </div>
        <!-- cart items -->
        <div class="cart_items">
          <!-- item 1 -->
          <div class="cart_item">
            <div class="productcontainer">
              <button class="remove-item">X</button> <!-- Move this X button to the top right -->
              <div class="cartimage">
                <img src="../public/photos/productPhotos/Concept 2 PM5 BikeErg.png" alt="Concept 2 PM5 BikeErg" class="pic-1" width="100px">
              </div>
              <div class="Content">
                <h6>Concept 2 PM5 BikeErg</h6>
                <p class="detailsinfo">
                  <span class="typetrip">CARDIO</span> <span class="separate"></span> <span class="nofdays">BIKES</span>
                </p>
                <p class="lower-price">
                  From <span class="price">72,000 EGP</span>
                </p>
              </div>
              <div class="cart-controls">
                <div class="cart-quantity">
                  <button class="minus" id="decrement">-</button>
                  <input type="text" class="quantity" id="quantity" value="1">
                  <button class="plus" id="increment">+</button>
                </div>
              </div>
            </div>
          </div>


          <!-- item 2 -->
          <div class="cart_item">
            <div class="productcontainer">
              <button class="remove-item">X</button> <!-- Move this X button to the top right -->
              <div class="cartimage">
                <img src="../public/photos/productPhotos/Concept 2 PM5 BikeErg.png" alt="Concept 2 PM5 BikeErg" class="pic-1" width="100px">
              </div>
              <div class="Content">
                <h6>Concept 2 SkiErg</h6>
                <p class="detailsinfo">
                  <span class="typetrip">CARDIO</span> <span class="separate"></span> <span class="nofdays">BIKES</span>
                </p>
                <p class="lower-price">
                  From <span class="price">72,000 EGP</span>
                </p>
              </div>
              <div class="cart-controls">
                <div class="cart-quantity">
                  <button class="minus" id="decrement2">-</button>
                  <input type="text" class="quantity" id="quantity2" value="1">
                  <button class="plus" id="increment2">+</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- cart actions -->
        <div class="cart_actions">
          <div class="subtotal">
            <p>SUBTOTAL:</p>
            <P>$<span id="subtotal_price">3000</span></P>
          </div>
          <?php if ($row["guest"] != 1) { ?>
            <div class="subtotal">
              <p>Deliver to address :</p><br>
              <address>
                <?php echo "Egypt , " . $row['city'] . " , " . $row['street'], " street  , building " . $row['house'] ?><br>
              </address>
            </div>
          <?php } ?>

          <button>View Cart</button>
          <button type="button"><a href="checkOut" style="color: white;   text-decoration: none;
                "> Check Out</a>
          </button>
        </div>
      </div>
    </div>

  </div>
  <!-- The slider -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <video width="1900" autoplay loop muted>
          <source src="../public/photos/slidervideos/vid.mp4" type="video/mp4">
        </video>

        <!-- <img src="../public/photos/productPhotos/slider1.jpg" class="d-block w-100" alt="..." > -->
        <div class="carousel-caption1">
          <h1>TRANSFORM YOUR BODY WITH</h1>
          <h1>PURE FITNESS EQUIPMENT</h1>
          <h1>AND SEE THE RESULTS FOR YOURSELF.</h1>
        </div>
      </div>
      <div class="carousel-item">
        <video width="1900" autoplay loop muted>
          <source src="../public/photos/slidervideos/vid2.mp4" type="video/mp4">
        </video>
        <!-- <img src="../public/photos/productPhotos/slider2.png" class="d-block w-100" alt="..."> -->
        <div class="carousel-caption1">
          <h1>PURE FITNESS EQUIPMENT:</h1>
          <h1>WHERE STRENGTH MEETS ENDURANCE.</h1>
        </div>
      </div>

      <div class="carousel-item">
        <video width="1900" autoplay loop muted>
          <source src="../public/photos/slidervideos/vid3.mp4" type="video/mp4">
        </video>
        <!-- <img src="../public/photos/productPhotos/slider3.png" class="d-block w-100" alt="..."> -->
        <div class="carousel-caption1">
          <h1>PURE FITNESS EQUIPMENT:</h1>
          <h1>THE PERFECT PARTNER FOR YOUR</h1>
          <h1>FITNESS JOURNEY.</h1>

        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- The Products -->

  <!-- Quick View button-->
  <div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="quickViewModalLabel">Product Quick View</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row">
          <div class="col-md-6">
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
            <div class="product p-4">
              <div class="d-flex justify-content-between align-items-center">
              </div>
              <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">CARDIO/BIKES</span>
                <h5 class="text-uppercase" id="prodname">Concept 2 PM5 BikeErg</h5>
                <div class="price d-flex flex-row align-items-center"> <span class="act-price">72.000 EGP</span>
                  <!-- <div class="ml-2"> <small class="dis-price">82.000 EGP</small> <span>40% OFF</span> </div> -->
                </div>
              </div>
              <p class="about">The bike features a clutch that keeps the flywheel spinning when you stop pedaling,
                which makes it feel like an outdoor bike.
                Adjust the seat and handlebars to fit a variety of athletes (and even customize with your own seat,
                pedals,
                and handlebars, if you want). Secure your phone in the attached device holder.
                This bike features heavy-duty construction, with a black powder coat aluminum frame.
                The bike is suitable for athletes up to 300lbs</p>
              <div class="cart mt-4 align-items-center"> <button btn btn-danger text-uppercase mr-2 px-4">Add to
                  cart</button> <i class="fa fa-heart text-muted"></i> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="viewproduct">

    <div class="row">
      <div class="col-md text-center" style="color: maroon; font-family: Georgia, 'Times New Roman', Times, serif;">
        <h2>Shop Popular Products</h2>
      </div>
    </div>

    <div class="container products-carousel">

      <div class="wrapper">
        <div class="slider">

          <?php
          // Assuming you have already connected to the database ($conn)

          // Fetch products from the database
          $result = ProductModle::allproducts();

          // Check if there are any products
          if (mysqli_num_rows($result) > 0) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
          }
          ?>

          <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>
              <div class="col-md-3">
                <form a method="post">
                  <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                  <div class="input-group mb-2" id="input-group">
                    <input type="hidden" name="quantity" id="quantity" class="form-control text-center small" value="1" readonly>
                  </div>
                  <div class="products" data-product-id="<?php echo $product['id']; ?>">
                    <div class="product-image">
                      <a href="product?id=<?php echo $product['id']; ?>" class="images">
                        <img src="<?php echo $product['file']; ?>" alt="<?php echo $product['name']; ?>" class="pic-1" width="500px">
                      </a>
                      <div class="links">
                        <div class="Icon">
                          <i class="bi bi-cart3"></i></i>
                          <button name="addtocart" class="tooltiptext">Add to cart</button>
                        </div>
                        <div class="Icon">
                          <i class="bi bi-heart"></i>
                          <button name="addtowishlist" class="tooltiptext">Add to wishlist</button>
                        </div>
                        <div class="Icon">
                          <a href="#" class="quick-view" data-product-id="<?php echo $product['id']; ?>" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                            <i class="bi bi-eye"></i>
                          </a>
                          <span class="tooltiptext">Quick view</span>
                        </div>
                      </div>
                    </div>
                    <div class="Content">
                      <h3>
                        <?php echo $product['name']; ?>
                      </h3>
                      <p class="detailsinfo">
                        <span class="typetrip">
                          <?php echo $product['type']; ?>
                        </span>
                      </p>
                      <p class="detailsinfo">
                        <?php
                        if ($product["outofstock"] == 1) {
                          $outofstock = "Out of stock";
                          echo '<span style="color: red;  font-size: 16px; ">' . $outofstock . '</span>';
                        } else if ($product["outofstock"] == 0) {
                          $outofstock = "In stock";
                          echo '<span style="color: green; font-size: 16px;">' . $outofstock . '</span>';
                        }
                        ?>
                      </p>
                      <div class="cost">
                        <p class="lower-price">
                          From <span class="price">
                            <?php echo $product['price'] . " EGP"; ?>
                          </span>
                        </p>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <p>No products found.</p>
          <?php endif; ?>

        </div>


      </div>

    </div>
    <!-- product -->

    <!-- sixth Product -->

    <!-- image -->
    <div class="position-relative text-center" style="height : 300;">
      <a href="product?id=61" id="centered-anchor" class="d-block" style="height : 300;">
        <img src="../public/photos/productPhotos/home.webp" alt="Clickable Image" class="img-fluid mx-auto">
        <button class="btn btn-dark btn-lg position-absolute bottom-0 start-50 translate-middle-x" style="bottom: -20px;" id="shopnow">
          Shop Now
        </button>
      </a>
    </div>



    <!-- benches product -->
    <!-- First product -->
    <div class="viewproduct">

      <div class="row">
        <div class="col-md text-center" style="color: maroon; font-family: Georgia, 'Times New Roman', Times, serif; margin-top: 70px;">
          <h2 style="margin-top: 40px;">BEST OF WEIGHTLIFTING</h2>
        </div>
      </div>

      <div class="container products-carousel">

        <div class="wrapper">
          <div class="slider">

            <?php

            $result = ProductModle::allproducts();

            if (mysqli_num_rows($result) > 0) {
              $allProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
              $products = array_slice($allProducts, 4);
            }
            ?>

            <?php if (!empty($products)) : ?>
              <?php foreach ($products as $product) : ?>
                <div class="col-md-3">
                  <form a method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <div class="products" data-product-id="<?php echo $product['id']; ?>">
                      <div class="product-image">
                        <a href="product?id=<?php echo $product['id']; ?>" class="images">
                          <img src="<?php echo $product['file']; ?>" alt="<?php echo $product['name']; ?>" class="pic-1" width="500px">
                        </a>
                        <div class="links">
                          <div class="Icon">
                            <i class="bi bi-cart3"></i></i>
                            <button name="addtocart" class="tooltiptext">Add to cart</button>
                          </div>
                          <div class="Icon">
                            <i class="bi bi-heart"></i>
                            <button name="addtowishlist" class="tooltiptext">Add to wishlist</button>
                          </div>
                          <div class="Icon">
                            <a href="#" class="quick-view" data-product-id="<?php echo $product['id']; ?>" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                              <i class="bi bi-eye"></i>
                            </a>
                            <span class="tooltiptext">Quick view</span>
                          </div>
                        </div>
                      </div>
                      <div class="Content">
                        <h3>
                          <?php echo $product['name']; ?>
                        </h3>
                        <p class="detailsinfo">
                          <span class="typetrip">
                            <?php echo $product['type']; ?>
                          </span>
                        </p>
                        <p class="detailsinfo">
                          <?php
                          if ($product["outofstock"] == 1) {
                            $outofstock = "Out of stock";
                            echo '<span style="color: red;  font-size: 16px; ">' . $outofstock . '</span>';
                          } else if ($product["outofstock"] == 0) {
                            $outofstock = "In stock";
                            echo '<span style="color: green; font-size: 16px;">' . $outofstock . '</span>';
                          }
                          ?>
                        </p>
                        <div class="cost">
                          <p class="lower-price">
                            From <span class="price">
                              <?php echo $product['price'] . " EGP"; ?>
                            </span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <p>No products found.</p>
            <?php endif; ?>


          </div>
        </div>

      </div>

    </div>

    <!-- image -->
    <div class="position-relative text-center" id="plates">
      <a href="product?id=39" id="centered-anchor" class="d-block">
        <img src="../public/photos/productPhotos/pure1.png" alt="Clickable Image" class="img-fluid mx-auto">
      </a>
    </div>


    <!-- what our customers have to say -->
    <h2>What Our Customers Have To Say</h2>
    <section class="feedback-section">

      <div class="container" style="margin-bottom: 80px; ">
        <div class="feedback-slider">
          <div class="feedback-review">
            <div class="white-box">
              <p class="feedback-text">
                We ordered our treadmill online from Pure Fitness, the next day I received an email confirming our order
                with full contact information. I called instead of replying to the email because I had a question.waleed
                was awesome and answered all my questions! Prior to shipping the treadmill, he sent me a photo of the
                equipment so I could approve the order. They were very quick to respond via email too. We are very happy
                with our purchase and the customer service! We will definitely shop with Pure Fitness again!!
              </p>
              <p class="feedback-name"> -Mariam Samy </p>
            </div>
          </div>
          <div class="feedback-review">
            <div class="white-box">
              <p class="feedback-text">
                Awesome customer service.They assisted us in finding the perfect machines for our home gym. Great prices,
                I am definitely coming back for more equipment.
              </p>
              <p class="feedback-name"> -Moaz </p>
            </div>
          </div>
          <!-- Add more review elements as needed -->
        </div>
        <div class="slider-controls">
          <button class="prev-button">
            <i class="bi bi-arrow-left-circle"></i>
          </button>
          <button class="next-button">
            <i class="bi bi-arrow-right-circle"></i>
          </button>
        </div>

      </div>
    </section>
    <!-- About us and signup containers -->
    <div class="container">
      <div class="row">
        <div class="col-md-6" id="blogs">
          <div class="image-container position-relative text-center">
            <img src="../public/photos/productPhotos/footerSIGNup.jpg" class="custom-img img-fluid" alt="Your Image">
            <div class="overlay d-flex flex-column justify-content-center align-items-center">
              <div class="quote mt-2 text-center">
                <h4 class="custom-about-us">NEWSLETTER SIGNUP</h4>
                <p class="custom-quote">Get product launch information, promotions, blogs, and Pure Fitness news.</p>
              </div>
              <form id="ContactFooter" class="footer-form">
                <div class="d-flex">
                  <div class="form-floating me-2">
                    <input type="email" name="email" class="form-control border-0" id="email" placeholder=" " style="background:#F0F0F0		; color: #000;">
                    <label for="email">Enter your email address</label>
                  </div>
                  <button type="button" id="submitMailButton" class="btn-About-us btn-dark">Sign Up</button>
                </div>
                <div id="message"></div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-6" id="blogs">
          <div class="image-container position-relative text-center">
            <img src="../public/photos/productPhotos/aboutUs.png" class="custom-img img-fluid" alt="Your Image">
            <div class="overlay d-flex flex-column justify-content-center align-items-center">
              <div class="quote mt-2 text-center">
                <h4 class="custom-about-us">ABOUT US</h4>
                <p class="custom-quote">Pure Fitness Equipment one of the biggest fitness equipment store in Egypt.</p>
                <button type="button" class="btn-About-us btn-dark"><a href="about" style="color: white;   text-decoration: none;
                "> Read Our Story</a>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- BMI Calculator and Chart -->
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="bmi-calculator-container text-black p-4">
            <h3 class="card-title text-center" style="color: maroon;">CALCULATE YOUR BMI</h3>
            <p class="small">BMI stands for Body Mass Index. The approximated calculation is used to determine your weight
              to your height. The calculator is useful for adults over 18 years of age. The calculator is only used as an
              estimator only and should not be used as a medical determination. The team at 365 recommend professional Dr
              or accredited Health Professional in regards to specific health and nutrition advice.</p>
            <form id="bmiForm">
              <div class="mb-3">
                <input type="number" class="form-control form-control-sm" id="weight" name="weight" placeholder="Weight (kg)">
              </div>
              <div class="mb-3">
                <input type="number" class="form-control form-control-sm" id="height" name="height" placeholder="Height (cm)">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-sm">Calculate BMI</button>
              </div>
            </form>
            <div id="result" class="mt-3">
              <h3 class="text-center">Your BMI: <span id="bmiValue">--</span></h3>
              <p class="text-center">Category: <span id="bmiCategory">--</span></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!-- BMI Chart Container -->
          <div class="bmi-chart-container text-black p-4">
            <h3 class="card-title text-center" style="color: maroon;">BMI Categories</h3>
            <p class="small">BMI categories are a way to classify individuals based on their BMI value. Here's a simple
              chart:</p>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">BMI Range</th>
                  <th scope="col">Category</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Less than 18.5</td>
                  <td>Underweight</td>
                </tr>
                <tr>
                  <td>18.5 - 24.9</td>
                  <td>Normal Weight</td>
                </tr>
                <tr>
                  <td>25.0 - 29.9</td>
                  <td>Overweight</td>
                </tr>
                <tr>
                  <td>30.0 or more</td>
                  <td>Obese</td>
                </tr>
              </tbody>
            </table>

            <p class="small mt-3">Please note that this is a general reference. For personalized health advice, consult a
              healthcare professional.</p>
          </div>
        </div>
      </div>
    </div>
    <?php

    if (isset($_POST['addtocart'])) {
      $productId = $_POST["product_id"];
      var_dump($productId);

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="../public/JS/index.js"></script>
    <script src="../public/JS/ajaxHandlers.js"></script>
    <script src="../public/JS/bmi.js"></script>
    <script src="../public/JS/back-to-top.js"></script>

    <footer>
      <?php
      include "footer.php";

      ?>
    </footer>

</body>

</html>