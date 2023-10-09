<?php
include'footer.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
   <nav>
      <div class="logo">Website name</div>
      <ul>
        <li><a href="#">Home
        <span class="fa fa-home"></span>
        </a></li>
        <li>
          <a href="#">Features
          <span class="fa fa-gift"></span>
          </a>
          <ul>
            <li><a href="#">Pages</a></li>
            <li><a href="#">Elements</a></li>
            <li><a href="#">Icons</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Services
          <span class="fa fa-gear"></span>
          </a>
          <ul>
            <li><a href="#">Service 1</a></li>
            <li><a href="#">Service 2</a></li>
            <li>
              <a href="#">More
                <span class="fa fa-plus"></span>
              </a>
              <ul>
                <li><a href="#">Submenu-1</a></li>
                <li><a href="#">Submenu-2</a></li>
                <li><a href="#">Submenu-3</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#">Profile
        <span class="fa fa-user"></span>
        </a></li>
        <li><a href="#">Contact
        <span class="fa fa-handshake-o"></span>
        </a></li>
        <li>
          <div class="search-box" action="#" method="get">
            <input class = "input-search"type="text" placeholder="Search...">
            <button class ="btn-search"><i class="fa fa-search"></i></button>
          </div>
        </li>
      </ul>
   </nav>
</body>
</html>