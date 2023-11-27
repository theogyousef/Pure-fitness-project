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
    public static function adminsearch($input)
    {
        include "../controller/config.php";

$input = mysqli_real_escape_string($conn, $input);

$query1 = "SELECT * FROM products WHERE name LIKE ? OR type LIKE ?";
$query2 = "SELECT * FROM users WHERE username LIKE ? OR email LIKE ? OR firstname LIKE ?";

// Prepare and execute the first query
$stmt = mysqli_prepare($conn, $query1);
mysqli_stmt_bind_param($stmt, "ss", $param1, $param2);
$param1 = "%" . $input . "%";
$param2 = "%" . $input . "%";
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// If the first query doesn't return any rows, execute the second query
if (mysqli_num_rows($result) == 0) {
    mysqli_stmt_close($stmt); // Close the previous statement

    $stmt = mysqli_prepare($conn, $query2);
    mysqli_stmt_bind_param($stmt, "sss", $param1, $param2, $param3);
    $param1 = "%" . $input . "%";
    $param2 = "%" . $input . "%";
    $param3 = "%" . $input . "%";
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);
}

// Close the final statement
mysqli_stmt_close($stmt);

return $result;

    }
}
