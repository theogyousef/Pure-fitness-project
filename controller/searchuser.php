<?php
require "config.php";
//check if it exists, and assigning value or an empty string to the variable 
$searchTerm = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : '';

$query = $searchTerm !== '' ? "SELECT * FROM users WHERE firstname LIKE '%{$searchTerm}%' OR lastname LIKE '%{$searchTerm}%'" : "SELECT * FROM users";

$result = mysqli_query($conn, $query);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

//<<<< returning again the html after searching >>>>
if (isset($_GET['html']) && $_GET['html'] == 'true') {
  // ... (previous code)

foreach ($users as $user) {
    $id = $user['id'];
    $query2 = "SELECT * from permissions where user_id = '$id'";
    $result2 = mysqli_query($conn, $query2);
    $permissions = mysqli_fetch_assoc($result2); // Use mysqli_fetch_assoc instead of mysqli_fetch_all

    if ($permissions && isset($permissions["guest"])) {
        echo "<tr>
                <td>{$user['id']}</td>
                <td>{$user['firstname']} {$user['lastname']}</td>
                <td>{$user['email']}</td>
                <td>" . ($permissions['admin'] ? 'Admin' : '') . "</td>
                <td>" . ($permissions['deactivated'] ? 'Deactivated' : '') . "</td>
                <td><a href='edituser?id={$user['id']}' style='color: orange;'><span class='fas fa-edit'></span></a></td>
                <td><a href='deleteuser?id={$user['id']}' style='color: red;'><span class='fas fa-trash-alt'></span></a></td>
                <td><a href='makeuser?id={$user['id']}' style='color: green;'><span class='fas fa-user'></span></a></td>
                <td><a href='makeadmin?id={$user['id']}' style='color: black;'><span class='fas fa-user-shield'></span></a></td>
              </tr>";
    }
}

// ... (remaining code)

} else {
    echo json_encode($users);
}
?>