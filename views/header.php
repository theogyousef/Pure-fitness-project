<?php
require '../controller/config.php';
$cartItemCount = 0;

if (!empty($_SESSION['products'])) {
  foreach ($_SESSION['products'] as $product) {
    $cartItemCount += $product['quantity']; 
  }
}

?>

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

  <header class="header-middle text-white">
    <div class="container my-1">
      <div class="row align-items-center">
        <div class="col-md-2">
          <div class="input-group border-0">
            <input type="search" class="form-control rounded-0 bg-dark border-0" placeholder="Search" id="search" onkeyup="liveSearch()">
            <button class="btn btn-dark border-0" type="button" id="search-addon">
              <i class="bi bi-search text-white"></i>
            </button>
            <div id="searchResults"></div>


          </div>
        </div>
        <div id="logo" class="col-md-8 text-center">
          <a href="index" rel="home">
            <img src="../public/photos/logoPhotos/purfitnesslogo.webp" alt="Pure Fitness Equipment" style="max-width: 100px; height: auto;" />
          </a>
        </div>
        <div id="left_elements" class="col-md-2 d-flex justify-content-end">
        <div class="cart-icon-with-count">
          <a href="cart_display" class="text-decoration-none" id="open_cart_btnn">
            <i class="bi bi-cart3 text-white fs-4 me-3"></i>
            <?php if ($cartItemCount > 0) : ?>
              <span class="cart-count"><?= $cartItemCount ?></span>
            <?php endif; ?>
          </a>
        </div>
          <a href="wishlist" class="text-decoration-none">
            <i class="bi bi-heart text-white fs-4 me-3"></i>
          </a>

          <div id="left_elements" class="col-md-2 d-flex justify-content-end ml-auto">
            <div class="user-menu-container">
              <a href="#" class="text-decoration-none" data-bs-toggle="dropdown" data-bs-target="#loginSignupDropdown">
                <i class="bi bi-person text-white fs-4"></i>
              </a>
              <?php if (isset($row) && isset($row["guest"]) && $row["guest"] != 1) { ?>
                <div class="dropdown-menu" id="loginSignupDropdown">
                  <a class="dropdown-item" href="profilesettings">Profile Settings</a>
                  <a class="dropdown-item" href="orders">My orders</a>

                  <?php
                  if ($row["admin"] == 1) {
                    echo "<a class='dropdown-item' href='adminDashboard'>Admin dashboard</a>";
                  }
                  ?>
                  <a class="dropdown-item" href="logout">Log out</a>
                </div>
              <?php } else { ?>
                <div class="dropdown-menu" id="loginSignupDropdown">
                  <a class="dropdown-item" href="logout">Log in</a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>

    </div>
    </div>
    </div>
  </header>

  <?php
// Replace these variables with your database connection details

// Function to fetch menu items from the database
function fetchMenuItems($conn, $parent_id = NULL) {
    $sql = "SELECT * FROM menu_items WHERE parent_id " . ($parent_id !== NULL ? "= $parent_id" : "IS NULL");
    $result = $conn->query($sql);
    $menuItems = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $menuItem = [
                'id' => $row['id'],
                'label' => $row['label'],
                'url' => $row['url'],
                'children' => fetchMenuItems($conn, $row['id']), // Recursive call for submenus
            ];
            $menuItems[] = $menuItem;
        }
    }

    return $menuItems;
}

// Function to generate HTML for the dropdown menu
function generateDropdownMenuHTML($menuItems) {
    $html = '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
    foreach ($menuItems as $menuItem) {
        $html .= '<a class="dropdown-item" href="' . $menuItem['url'] . '">' . $menuItem['label'] . '</a>';
    }
    $html .= '</div>';

    return $html;
}

// Fetch the top-level menu items
$topLevelMenu = fetchMenuItems($conn);
?>

<!-- Output the generated menu HTML -->
<!-- <nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNav">
            <ul class="navbar-nav text-white text-center">
                <?php
                foreach ($topLevelMenu as $menuItem) {
                    echo '<li class="nav-item';

                    // Add dropdown class if the menu item has children
                    if (!empty($menuItem['children'])) {
                        echo ' dropdown';
                    }

                    echo '">
                        <a class="nav-link';

                    // Add dropdown-toggle class if the menu item has children
                    if (!empty($menuItem['children'])) {
                        echo ' dropdown-toggle';
                    }

                    echo '" href="' . $menuItem['url'] . '"';

                    // Add dropdown attributes if the menu item has children
                    if (!empty($menuItem['children'])) {
                        echo ' id="navbarDropdown' . $menuItem['label'] . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
                    }

                    echo '>' . $menuItem['label'] . '</a>';

                    // Generate and output dropdown menu if the menu item has children
                    if (!empty($menuItem['children'])) {
                        echo generateDropdownMenuHTML($menuItem['children']);
                    }

                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav> -->

<?php
// Close the database connection
$conn->close();
?>


  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNav">
        <ul class="navbar-nav text-white text-center">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              SHOP
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <div class="row">
                <div class="col">
                  <h6 class="dropdown-header">GYM Tools</h6>
                  <a class="dropdown-item" href="#">Personal Gear</a>
                  <a class="dropdown-item" href="#">Gymnastics & Bodyweight</a>
                </div>
                <div class="col">
                  <h6 class="dropdown-header">CROSSFIT EQUIPMENT</h6>
                  <a class="dropdown-item" href="#">Weightlifting</a>
                  <a class="dropdown-item" href="#">Cages & Racks and Attachments</a>
                </div>
              </div>
            </div>
          </li>
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

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCrossfitEquipment" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              CROSSFIT EQUIPMENT
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownCrossfitEquipment">
              <div class="row">
                <div class="col">
                  <h6 class="dropdown-header">WEIGHTLIFTING</h6>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="14">
                    <button type="submit" class="dropdown-item">Barbells</button>
                  </form>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="5">
                    <button type="submit" class="dropdown-item">Plates</button>
                  </form>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="6">
                    <button type="submit" class="dropdown-item">Collars</button>
                  </form>
                </div>
                <div class="col">
                  <h6 class="dropdown-header">CAGES & RACKS AND ATTACHMENTS</h6>
                  <a class="dropdown-item" href="#">Weightlifting</a>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="11">
                    <button type="submit" class="dropdown-item">Racks</button>
                  </form>
              
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="13">
                    <button type="submit" class="dropdown-item">Cable Cross Attachments</button>
                  </form>
                </div>
                <div class="col">
                  <h6 class="dropdown-header">GYM ESSENTIAL</h6>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="1">
                    <button type="submit" class="dropdown-item">Benches</button>
                  </form>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="8">
                    <button type="submit" class="dropdown-item">Boxes</button>
                  </form>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="4">
                    <button type="submit" class="dropdown-item">Sleds</button>
                  </form>
                </div>

                <div class="col">
                  <h6 class="dropdown-header">FREE WEIGHTS</h6>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="15">
                    <button type="submit" class="dropdown-item">Kettlebells</button>
                  </form>
                  <form method="post" action="../views/collections">
                    <input type="hidden" name="category" value="12">
                    <button type="submit" class="dropdown-item">Dumbbells</button>
                  </form>

                </div>
              </div>
            </div>
          </li>

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
          <li class="nav-item dropdown">
            <a class="nav-link" href="collections" id="navbarDropdownShop" aria-haspopup="true" aria-expanded="false">
              HOME GYM </a>
          </li>
        </ul>
      </div>
    </div>
  </nav> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../public/JS/header.js"></script>

</body>

</html>