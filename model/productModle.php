<?php

// include "../controller/config.php";
class ProductModle
{

    public static function allproducts()
    {
        include "../controller/config.php";
        $query =  "SELECT * FROM products ";
        $result = mysqli_query($conn, $query);
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
    public static function getProductsByPriceRange($minPrice, $maxPrice)
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE price BETWEEN '$minPrice' AND '$maxPrice'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function highesttolowest ()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products ORDER BY price DESC";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function lowesttohighest ()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products ORDER BY price ASC";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function inStock()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE stock > '0'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function OutOfStock()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE stock < '1'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Benches()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Benches'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Barbell()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Barbell'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Kettlebell ()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Kettlebell '";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Bicycle()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Bicycle'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Cardio()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Cardio'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Sleds()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Sleds'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Plates()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Plates'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Collars()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Collars'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Ropes()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Rope'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Boxs()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Box'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Steps()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Step'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Weightedballs()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Weighted balls'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Racks()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Racks'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  Dumbells()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Dumbell'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }
    public static function  CableExtensions()
    {
        include "../controller/config.php";

        // Modify the query to fetch products within the specified price range
        $query = "SELECT * FROM products WHERE type ='Cable Extensions'";
        $result = mysqli_query($conn, $query);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
       

        return $result;
    }

}
