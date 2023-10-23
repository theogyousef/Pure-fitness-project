<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hedaer</title>
    
    <style>
        <?php include "public/CSS/header.css" ?>
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
          <a href="index.html" rel="home">
            <img
              src="https://purefitness-eg.com/wp-content/uploads/2023/07/IMG_%D9%A2%D9%A0%D9%A2%D9%A3%D9%A0%D9%A7%D9%A2%D9%A3_%D9%A1%D9%A9%D9%A1%D9%A0%D9%A4%D9%A0-1400x623.png"
              alt="Pure Fitness Equipment" style="max-width: 100px; height: auto;" />
          </a>
        </div>
        <div id="left_elements" class="col-md-2 d-flex justify-content-end"> 
          <!-- Cart -->
          <a href="#" class="text-decoration-none">
            <i class="bi bi-cart3 text-white fs-4 me-3"></i>
          </a>
          <!-- wishlist -->
          <a href="#" class="text-decoration-none">
            <i class="bi bi-heart text-white fs-4 me-3"></i>
          </a>
          <!-- Login/signup -->
          <a href="#" class="text-decoration-none">
            <i class="bi bi-person text-white fs-4"></i>
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- The Nav bar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNav">
        <ul class="navbar-nav text-white text-center">
         <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownShop" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              shop
            </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdownShop">
              <div class="dropdown-item-columns">
                <a class="dropdown-item" href="#">GYM Tools</a>
                <a class="dropdown-item" href="#">Presonal Gear</a>
              </div>
              <div class="dropdown-item-columns">
                <a class="dropdown-item" href="#">GYMNASTICS & BODYWEIGHT</a>
                <a class="dropdown-item" href="#">GYM Machines</a>
              </div>
              <div class="dropdown-item-columns">
                <a class="dropdown-item" href="#">HOME GYM</a>
                <!-- Add more items in this column -->
              </div>
            </div>
         </li>
          <li class="nav-item dropdown"> <!-- Use the dropdown class for dropdown items -->
            <a class="nav-link" href="#" id="navbarDropdownGymTools" role="button" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              GYM Tools
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownGymTools">
              <a class="dropdown-item"
                href="#">Gymnastics &
                Bodyweight</a>
              <a class="dropdown-item"
                href="#/">Personal Gear</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>