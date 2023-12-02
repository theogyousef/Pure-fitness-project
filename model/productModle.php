<?php

// include "../controller/config.php";
class ProductModle
{

    public static function allproducts()
    {
        include "../controller/config.php";
        $query =  "SELECT * FROM products";
        $result= mysqli_query($conn, $query);
         return $result;
    }

    
    public static function getProductById($productId)
    {
        include "../controller/config.php";
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); 
    }
}