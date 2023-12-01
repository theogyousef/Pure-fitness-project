<?php
require "config.php";
//check if it exists, and assigning value or an empty string to the variable 
$searchTerm = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : '';

$query = $searchTerm !== '' ? "SELECT * FROM users WHERE firstname LIKE '%{$searchTerm}%' OR lastname LIKE '%{$searchTerm}%'" : "SELECT * FROM users";

$result = mysqli_query($conn, $query);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

//<<<< returning again the html after searching >>>>
if (isset($_GET['html']) && $_GET['html'] == 'true') {
    foreach ($users as $user) {
        if ($user["guest"] != '1') {
            echo "<tr>
                    <td>{$user['id']}</td>
                    <td>{$user['firstname']} {$user['lastname']}</td>
                    <td>{$user['email']}</td>
                    <td>" . ($user['admin'] ? 'Admin' : '') . "</td>
                    <td>" . ($user['deactivated'] ? 'Deactivated' : '') . "</td>
                    <td><a href='edituser?id={$user['id']}' style='color: orange;'><span class='fas fa-edit'></span></a></td>
                    <td><a href='deleteuser?id={$user['id']}' style='color: red;'><span class='fas fa-trash-alt'></span></a></td>
                    <td><a href='makeuser?id={$user['id']}' style='color: green;'><span class='fas fa-user'></span></a></td>
                    <td><a href='makeadmin?id={$user['id']}' style='color: black;'><span class='fas fa-user-shield'></span></a></td>
                  </tr>";
        }
    }
} else {
    echo json_encode($users);
}
