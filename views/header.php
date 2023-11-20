<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <style>
        <?php 
         include "../public/CSS/header.css";
         include "../public/css/index.css";
        ?>
        
   
    </style>
</head>
<body>
     <!-- The small top container -->
  <div class="announcement-container text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3">
        </div>
        <div class="col-md-6 text-center">
          <span>Free shipping on All Orders</span>
        </div>
        <div class="col-md-3 text-end">
          <a href="#" class="text-decoration-none text-white">Contact us</a>
        </div>
      </div>
    </div>
  </div>

  <!-- The middle Header -->
  <header class="header-middle text-white">
    <div class="container my-1">
      <div class="row align-items-center">
        <div class="col-md-2">
          <div class="input-group border-0">
            <input type="search" class="form-control rounded-0 bg-dark border-0" placeholder="Search"/>
            <span class="input-group-text bg-dark border-0" id="search-addon">
              <i class="bi bi-search text-white"></i>
            </span>
          </div>
        </div>
        <div id="logo" class="col-md-8 text-center">
          <!-- Header logo -->
          <a href="index" rel="home">
            <img
              src="https://purefitness-eg.com/wp-content/uploads/2023/07/IMG_%D9%A2%D9%A0%D9%A2%D9%A3%D9%A0%D9%A7%D9%A2%D9%A3_%D9%A1%D9%A9%D9%A1%D9%A0%D9%A4%D9%A0-1400x623.png"
              alt="Pure Fitness Equipment" style="max-width: 100px; height: auto;" />
          </a>
        </div>
        <div id="left_elements" class="col-md-2 d-flex justify-content-end"> 
          <!-- Cart -->
         <a href="#"  class="text-decoration-none" id="open_cart_btnn" >
            <i class="bi bi-cart3 text-white fs-4 me-3"></i>
          </a>
          <!-- wishlist -->
          <a href="wishlist" class="text-decoration-none">
            <i class="bi bi-heart text-white fs-4 me-3"></i>
          </a>

          <div id="left_elements" class="col-md-2 d-flex justify-content-end ml-auto">
    <!-- Login/signup dropdown -->
    <a href="#" class="text-decoration-none" data-bs-toggle="dropdown" data-bs-target="#loginSignupDropdown">
        <i class="bi bi-person text-white fs-4"></i>
    </a>

    <?php if ($row["guest"] != 1) { ?>
    <div class="dropdown-menu" id="loginSignupDropdown">
        <a class="dropdown-item" href="profilesettings">Profile Settings</a>
        <?php 
            if ($row["admin"] == 1) {
                echo "<a class='dropdown-item' href='adminDashboard'>Admin dashboard</a>";
            }
        ?>
        <a class="dropdown-item" href="logout">Log out</a>
    </div>
<?php ; } else if ($row["guest"] != 0) {?>
    <div class="dropdown-menu" id="loginSignupDropdown">
        <a class="dropdown-item" href="logout">Log in</a>
    </div>
<?php ;} ?>

</div>

        </div>
      </div>
    </div>
  </header>

  <!-- The Nav bar -->
  <nav class="navbar navbar-expand-lg">
  <div class="container">
    <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNav">
      <ul class="navbar-nav text-white text-center">
      <!-- Example for one dropdown -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    SHOP
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
    <!-- Use the row class to contain your columns -->
    <div class="row">
      <!-- Each div with col class is a column -->
      <div class="col">
        <h6 class="dropdown-header">GYM Tools</h6>
        <a class="dropdown-item" href="#">Personal Gear</a>
        <a class="dropdown-item" href="#">Gymnastics & Bodyweight</a>
      </div>
      <div class="col">
        <h6 class="dropdown-header">CROSSFIT EQUIPMENT</h6>
        <a class="dropdown-item" href="#">Weightlifting</a>
        <a class="dropdown-item" href="#">Cages & Racks and Attachments</a>
        <!-- ... more items ... -->
      </div>
      <!-- Add more columns as needed -->
    </div>
  </div>
</li>
<!-- Repeat for each dropdown -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGymTools" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    GYM TOOLS
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownGymTools">
    <div class="row">
      <div class="col">
        <h6 class="dropdown-header">GYMNASTICS & BODYWEIGHT</h6>
        <a class="dropdown-item" href="#">Bands</a>
        <a class="dropdown-item" href="#">Parallettes</a>
        <a class="dropdown-item" href="#">Gym Chalk</a>
      </div>
      <div class="col">
        <h6 class="dropdown-header">PERSONAL GEAR</h6>
        <a class="dropdown-item" href="#">Speed Ropes</a>
        <a class="dropdown-item" href="#">Mats</a>  
        <a class="dropdown-item" href="#">AB Mat</a>
      </div>
    </div>
  </div>
</li>

<!-- Continue repeating this pattern for CARDIO and GYM MACHINES -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCrossfitEquipment" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    CROSSFIT EQUIPMENT
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownCrossfitEquipment">
    <div class="row">
      <div class="col">
        <h6 class="dropdown-header">WEIGHTLIFTING</h6>
        <a class="dropdown-item" href="#">Barbells</a>
        <a class="dropdown-item" href="#">Plates</a>
        <a class="dropdown-item" href="#">Collars</a>
      </div>
      <div class="col">
        <h6 class="dropdown-header">CAGES & RACKS AND ATTACHMENTS</h6>
        <a class="dropdown-item" href="#">Weightlifting</a>
                <a class="dropdown-item" href="#">Cages</a>	
                <a class="dropdown-item" href="#">Racks</a>
                <a class="dropdown-item" href="#">Attachments</a>
                <a class="dropdown-item" href="#">Pull Up Bars</a>
                <a class="dropdown-item" href="#">Storages</a>
                <a class="dropdown-item" href="#">Cable Cross Attachments</a>
      </div>
      <div class="col">
        <h6 class="dropdown-header">GYM ESSENTIAL</h6>
        <a class="dropdown-item" href="#">Benches</a>
                <a class="dropdown-item" href="#">Boxes</a>	
                <a class="dropdown-item" href="#">Rings</a>
                <a class="dropdown-item" href="#">Sleds</a>
      </div>

      <div class="col">
        <h6 class="dropdown-header">FREE WEIGHTS</h6>
        <a class="dropdown-item" href="#">Kettlebells</a>
                <a class="dropdown-item" href="#">Dumbbells</a>	
                <a class="dropdown-item" href="#">Medicine Balls</a>
      </div>
    </div>
  </div>
</li>

<!-- Cardio Nav -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCrossfitEquipment" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  CARDIO
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownCrossfitEquipment">
    <div class="row">
      <div class="col">
        <a class="dropdown-item" href="#">Bikes</a>
                <a class="dropdown-item" href="#">Rowers</a>
                <a class="dropdown-item" href="#">Treadmills</a>
                <a class="dropdown-item" href="#">Skiergs</a>
                <a class="dropdown-item" href="#">Elliptical</a>
      </div>

    </div>
  </div>
</li>
<!-- Gym machine nav -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCrossfitEquipment" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  GYM MACHINES
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownCrossfitEquipment">
    <div class="row">
      <div class="col">
        <a class="dropdown-item" href="#">Life fitness</a>
                <a class="dropdown-item" href="#">Precor</a>
                <a class="dropdown-item" href="#">Tecnhogym</a>
                <a class="dropdown-item" href="#">Cybex</a>
      </div>

    </div>
  </div>
</li>
<!-- Home Gym Nav -->
<li class="nav-item dropdown">
<a class="nav-link" href="collections" id="navbarDropdownShop" aria-haspopup="true" aria-expanded="false">
          HOME GYM </a>
</li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>