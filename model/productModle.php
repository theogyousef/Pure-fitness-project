<?php

include "../controller/config.php";
class ProductModle
{

    public static function allproducts()
    {
        include "../controller/config.php";
        $query =  "SELECT * FROM products";
         $result= mysqli_query($conn, $query);
         return $result;
    }
}
