<!DOCTYPE html include "header.php">
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

  <title>About Us</title>
  <style>
    <?php include "../public/CSS/about.css";
    include "header.php"
     ?> 

  </style>
  <body>
  <header>
        <h1>About Us</h1>
    </header>

    <div class="container">
        <section id="introduction" class="box">
            <h2>Welcome to Pure Fitness</h2>
            <p>We are passionate about fitness and providing high-quality gym equipment to help you achieve your fitness goals. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </section>

        <section id="history" class="box">
            <h2>Our Journey</h2>
            <p>Since our establishment in 2010, Pure Fitness has been dedicated to delivering top-notch gym equipment and exceptional customer service. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </section>

        <section id="goals" class="box">
            <h2>Our Goals</h2>
            <ul>
                <li>Provide a wide range of high-quality gym equipment to meet the diverse needs of our customers.</li>
                <li>Offer competitive prices without compromising on the quality and durability of our products.</li>
                <li>Deliver exceptional customer service, ensuring prompt responses to inquiries and efficient after-sales support.</li>
                <li>Continuously innovate and introduce new fitness products to keep up with the latest industry trends.</li>
                <li>Promote a healthy and active lifestyle by encouraging our customers to achieve their fitness goals.</li>
            </ul>
        </section>
    </div>

<footer>
    <?php 
        include './footer.php'
    ?>
</footer>
  </body>