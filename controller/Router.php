<?php
class Routere
{
    public static function handle($path = '/')
    {
        /*for just testing
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
         echo $currentUri;*/

        $path = '/' . ltrim($path, '/');
        $root = '/SWE/views/index';
        $id = null; // Initialize $id here

        if (strpos($path, '/SWE/views/cart_display?remove=') !== false) {
            $pattern = '/\/SWE\/views\/(cart_display(?:\?remove=)?)(\d*)/';
        } else {

            $pattern = '/\/SWE\/views\/(product|editproduct|deleteproduct|edituser|deleteuser|makeuser|makeadmin|editorder|vieworder|cancelorder|changepictures)\?id=(\d+)/';
        }
        if (preg_match($pattern, $path, $matches)) {
            // Extract the 'id' value from the matched URL
            $action = $matches[1];
            $id = $matches[2];

            // echo "id = " . $id;
        }
        //  echo $path;
        //  echo "id = " .$id;
        require "config.php";
        session_start();


        if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
            $result = mysqli_query($conn, " SELECT p.*, u.* FROM permissions p JOIN users u ON p.user_id = u.id WHERE p.guest = '1' ");
            $row = mysqli_fetch_assoc($result);
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
        }



        if ($path === $root) {
            require '../views/index.php';
            exit();
        } elseif ($path === '/SWE/views/product') {
            require '../views/product.php';
            exit();
        } elseif ($path === '/SWE/views/collections') {
            require '../views/collections.php';
            exit();
        } elseif ($path === '/SWE/views/profilesettings') {
            require '../views/profilesettings.php';
            exit();
        } elseif ($path === '/SWE/views/checkout') {
            require '../views/checkout.php';
            exit();
        } elseif ($path === '/SWE/views/orders') {
            require '../views/orders.php';
            exit();
        }elseif ($path === '/SWE/views/Adminorders') {
            require '../views/Adminorders.php';
            exit();
        } elseif ($path === '/SWE/views/confirmaddress') {

            require '../views/confirmaddress.php';
            exit();

        }  elseif ($path === '/SWE/views/confirmation') {
            require '../views/confirmation.php';
            exit();
        } elseif ($path === '/SWE/views/payment') {
            require '../views/payment.php';
            exit();
        } elseif ($path === '/SWE/views/confirmorder') {
            require '../views/confirmorder.php';
            exit();
        } elseif ($path === '/SWE/views/logout') {
            require '../views/logout.php';
            exit();
        } elseif ($path === '/SWE/views/adminDashboard') {
            require '../views/adminDashboard.php';
            exit();
        } elseif ($path === '/SWE/views/wishlist') {
            require '../views/wishlist.php';
            exit();
        } elseif ($path === '/SWE/views/about') {
            require '../views/about.php';
            exit();
        }elseif ($path === '/SWE/views/signup') {
            require '../views/signup.php';
            exit();
        }   elseif ($path === '/SWE/views/tsales') {
            require '../views/tsales.php';
            exit();
        } elseif ($path === '/SWE/views/msales') {
            require '../views/msales.php';
            exit();
        }elseif ($path === '/SWE/views/qsales') {
            require '../views/qsales.php';
            exit();
        } elseif ($path === '/SWE/views/ysales') {
            require '../views/ysales.php';
            exit();
        }elseif ($path === '/SWE/views/login') {
            require '../views/login.php';
            exit();
        } elseif ($path === '/SWE/views/forgetpassword') {
            require '../views/forgetpassword.php';
            exit();
        } elseif ($path === '/SWE/views/users') {
            require '../views/users.php';
            exit();
        } elseif ($path === '/SWE/views/adduser') {
            require '../views/adduser.php';
            exit();
        } elseif ($path === '/SWE/views/products') {
            require '../views/products.php';
            exit();
        } elseif ($path === '/SWE/views/addproduct') {
            require '../views/addproduct.php';
            exit();
        } elseif ($path === '/SWE/views/forgetpass') {
            require '../views/forgetpass.php';
            exit();
        } elseif ($path === '/SWE/views/otp') {
            require '../views/otp.php';
            exit();
        } elseif ($path === '/SWE/views/newpassword') {
            require '../views/resetpassword.php';
            exit();
        } elseif ($path === '/SWE/views/deactivated') {
            require '../views/deactivated.php';
            exit();
        } elseif ($path === '/SWE/views/cart_display') {

            require '../views/cart_display.php';
            exit();
        } elseif ($path === '/SWE/views/cart_display?remove=' . $id) {
            require '../views/cart_display.php';
            exit();
        }elseif ($path === '/SWE/views/cancelorder?id=' . $id) {
            require '../views/cancelorder.php';
            exit();
        } elseif ($path === '/SWE/views/changepictures?id=' . $id) {
            require '../views/changepictures.php';
            exit();
        }  elseif ($path === '/SWE/views/editorder?id=' . $id) {
            require '../views/editorder.php';
            exit();
        }  elseif ($path === '/SWE/views/vieworder?id=' . $id) {
            require '../views/vieworder.php';
            exit();
        } elseif ($path === '/SWE/views/editproduct?id=' . $id) {
            require '../views/editproduct.php';
            exit();
        } elseif ($path === '/SWE/views/product?id=' . $id) {
            require '../views/product.php';
            exit();
        } elseif ($path === '/SWE/views/deleteproduct?id=' . $id) {
            require '../views/deleteproduct.php';
            exit();
        } elseif ($path === '/SWE/views/edituser?id=' . $id) {
            require '../views/edituser.php';
            exit();
        } elseif ($path === '/SWE/views/deleteuser?id=' . $id) {
            require '../views/deleteuser.php';
            exit();
        } elseif ($path === '/SWE/views/makeuser?id=' . $id) {
            require '../views/makeuser.php';
            exit();
        } elseif ($path === '/SWE/views/makeadmin?id=' . $id) {
            require '../views/makeadmin.php';
            exit();
        } else {

            require '../views/404.php';
            exit();
        }
    }
}
