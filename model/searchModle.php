<?php

class searchModle
{
    public static function indexsearch($input)
    {
        include "../controller/config.php";
        $input = mysqli_real_escape_string($conn, $input); // Use mysqli_real_escape_string to prevent SQL injection

        $query = "SELECT * FROM products WHERE name LIKE ? OR type LIKE ?";
        $stmt = mysqli_prepare($conn, $query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $param1, $param2);
        $param1 = "%" . $input . "%";
        $param2 = "%" . $input . "%";

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        return $result;
    }
}
