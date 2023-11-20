<?php
class Routere {
    public static function handle( $path = '/') {
        /*for just testing
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
         echo $currentUri;*/
        

        // Ensure the path starts with a slash
        $path = '/' . ltrim($path, '/');
        $root = '/swe/views/index';

        $pattern = '/\/swe\/views\/(product|editproduct|deleteproduct|edituser|deleteuser|makeuser|makeadmin)\?id=(\d+)/';
        if (preg_match($pattern, $path, $matches)) {
    // Extract the 'id' value from the matched URL
    $action = $matches[1];
    $id = $matches[2];
    echo $id;
        }

       if($path===$root)
       {
        require '../views/index.php';
            exit();
       }
      elseif($path==='/swe/views/product')
        {
        require '../views/product.php';
            exit();

        }
        elseif($path==='/swe/views/collections')
        {
        require '../views/collections.php';
            exit();

        }
        elseif($path==='/swe/views/profilesettings')
        {
        require '../views/profilesettings.php';
            exit();

        }
        elseif($path==='/swe/views/logout')
        {
        require '../views/logout.php';
            exit();

        }
        elseif($path==='/swe/views/registeration')
        {
        require '../views/registeration.php';
            exit();
        }
        elseif($path==='/swe/views/adminDashboard')
        {
        require '../views/adminDashboard.php';
            exit();
        }
        elseif($path==='/swe/views/wishlist')
        {
        require '../views/wishlist.php';
            exit();
        }
        elseif($path==='/swe/views/checkOut')
        {
        require '../views/checkOut.php';
            exit();
        }
        elseif($path==='/swe/views/about')
        {
        require '../views/about.php';
            exit();
        }
        elseif($path==='/swe/views/users')
        {
        require '../views/users.php';
            exit();
        }
        elseif($path==='/swe/views/adduser')
        {
        require '../views/adduser.php';
            exit();
        }
        elseif($path==='/swe/views/products')
        {
        require '../views/products.php';
            exit();
        }
        elseif($path==='/swe/views/addproduct')
        {
        require '../views/addproduct.php';
            exit();
        }
        elseif($path==='/swe/views/editproduct?id='.$id)
        {
        require '../views/editproduct.php';
            exit();

        }
        elseif($path==='/swe/views/product?id='.$id)
        {
        require '../views/product.php';
            exit();

        }
        elseif($path==='/swe/views/deleteproduct?id='.$id)
        {
        require '../views/deleteproduct.php';
            exit();

        }
        elseif($path==='/swe/views/edituser?id='.$id)
        {
        require '../views/edituser.php';
            exit();

        }
        elseif($path==='/swe/views/deleteuser?id='.$id)
        {
        require '../views/deleteuser.php';
            exit();

        }
        elseif($path==='/swe/views/makeuser?id='.$id)
        {
        require '../views/makeuser.php';
            exit();

        }
        elseif($path==='/swe/views/makeadmin?id='.$id)
        {
        require '../views/makeadmin.php';
            exit();

        }else{

        require '../views/404.php';
        exit();
        }
    }
}