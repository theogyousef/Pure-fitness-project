<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hedaer</title>
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
          <a href="index.php" rel="home">
            <img
              src="https://purefitness-eg.com/wp-content/uploads/2023/07/IMG_%D9%A2%D9%A0%D9%A2%D9%A3%D9%A0%D9%A7%D9%A2%D9%A3_%D9%A1%D9%A9%D9%A1%D9%A0%D9%A4%D9%A0-1400x623.png"
              alt="Pure Fitness Equipment" style="max-width: 100px; height: auto;" />
          </a>
        </div>
        <div id="left_elements" class="col-md-2 d-flex justify-content-end"> 
          <!-- Cart -->
          <!-- <a href="#" class="text-decoration-none">
            <i class="bi bi-cart3 text-white fs-4 me-3"></i>
          </a> -->
          <!-- wishlist -->
          <a href="wishlist.php" class="text-decoration-none">
            <i class="bi bi-heart text-white fs-4 me-3"></i>
          </a>

          <div id="left_elements" class="col-md-2 d-flex justify-content-end ml-auto">
    <!-- Login/signup dropdown -->
    <a href="#" class="text-decoration-none" data-bs-toggle="dropdown" data-bs-target="#loginSignupDropdown">
        <i class="bi bi-person text-white fs-4"></i>
    </a>
    <div class="dropdown-menu" id="loginSignupDropdown">
        <a class="dropdown-item" href="profilesettings.php">Profile Settings</a>
        <?php 
          if($row["admin"] ==1){
            echo " <a class='dropdown-item' href='adminDashboard.php'>Admin dasboard</a> ";
          }
          ?>
        
        <a class="dropdown-item" href="logout.php">Logout</a>
    </div>
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
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownShop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            SHOP
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownShop">
            <div class="dropdown-item-columns">
              <h3 class="dropdown-header">GYM Tools</h3>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Personal Gear</a>
                <a class="dropdown-item" href="#">Gymnastics & Bodyweight</a>
              </div>
            </div>
            <div class="dropdown-item-columns">
              <h6 class="dropdown-header">CROSSFIT EQUIPMENT</h6>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Weightlifting</a>
                <a class="dropdown-item" href="#">Cages & Racks and Attachments</a>	
                <a class="dropdown-item" href="#">Gym Essential</a>
                <a class="dropdown-item" href="#">Free Weights</a>
              </div>
            </div>
            <div class="dropdown-item-columns">
              <h6 class="dropdown-header">CARDIO</h6>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Bikes</a>
                <a class="dropdown-item" href="#">Rowers</a>	
                <a class="dropdown-item" href="#">Treadmills</a>
                <a class="dropdown-item" href="#">Skiergs</a>
                <a class="dropdown-item" href="#">Elliptical</a>
              </div>
            </div>
            <div class="dropdown-item-columns">
              <h6 class="dropdown-header">GYM Machines</h6>
              <h6 class="dropdown-header">HOME GYM</h6>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownShop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          GYM TOOLS
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownShop">
            <div class="dropdown-item-columns">
              <h3 class="dropdown-header">GYMNASTICS & BODYWEIGHT</h3>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Bands</a>
                <a class="dropdown-item" href="#">Parallettes</a>
                <a class="dropdown-item" href="#">Gym Chalk</a>
              </div>
            </div>
            <div class="dropdown-item-columns">
              <h6 class="dropdown-header">PERSONAL GEAR</h6>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Speed Ropes</a>
                <a class="dropdown-item" href="#">Mats</a>	
                <a class="dropdown-item" href="#">AB Mat</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownShop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CROSSFIT EQUIPMENT
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownShop">
            <div class="dropdown-item-columns">
              <h3 class="dropdown-header">WEIGHTLIFTING</h3>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Barbells</a>
                <a class="dropdown-item" href="#">Plates</a>
                <a class="dropdown-item" href="#">Collars</a>
              </div>
            </div>
            <div class="dropdown-item-columns">
              <h6 class="dropdown-header">CAGES & RACKS AND ATTACHMENTS</h6>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Weightlifting</a>
                <a class="dropdown-item" href="#">Cages</a>	
                <a class="dropdown-item" href="#">Racks</a>
                <a class="dropdown-item" href="#">Attachments</a>
                <a class="dropdown-item" href="#">Pull Up Bars</a>
                <a class="dropdown-item" href="#">Storages</a>
                <a class="dropdown-item" href="#">Cable Cross Attachments</a>
              </div>
            </div>
            <div class="dropdown-item-columns">
              <h6 class="dropdown-header">GYM ESSENTIAL</h6>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Benches</a>
                <a class="dropdown-item" href="#">Boxes</a>	
                <a class="dropdown-item" href="#">Rings</a>
                <a class="dropdown-item" href="#">Sleds</a>
              </div>
            </div>
            <div class="dropdown-item-columns">
              <h6 class="dropdown-header">FREE WEIGHTS</h6>
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Kettlebells</a>
                <a class="dropdown-item" href="#">Dumbbells</a>	
                <a class="dropdown-item" href="#">Medicine Balls</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownShop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CARDIO   </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownShop">
            <div class="dropdown-item-columns">
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Bikes</a>
                <a class="dropdown-item" href="#">Rowers</a>
                <a class="dropdown-item" href="#">Treadmills</a>
                <a class="dropdown-item" href="#">Skiergs</a>
                <a class="dropdown-item" href="#">Elliptical</a>
              </div>
            </div>
          </div>
        </li>
      <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownShop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          GYM MACHINES   </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownShop">
            <div class="dropdown-item-columns">
              <div class="dropdown-items-horizontal">
                <a class="dropdown-item" href="#">Life fitness</a>
                <a class="dropdown-item" href="#">Precor</a>
                <a class="dropdown-item" href="#">Tecnhogym</a>
                <a class="dropdown-item" href="#">Cybex</a>
              </div>
            </div>
          </div>
       </li>
       <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownShop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          HOME GYM </a>
       </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>