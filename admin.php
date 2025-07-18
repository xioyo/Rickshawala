<?php

include("connection.php");
// Database connection parameters

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['delete_user'])) {
    $userIdToDelete = $_GET['delete_user'];

    // Delete the user from the 'signup' table
    $deleteSql = "DELETE FROM signup WHERE auto_id = ?";
    $stmt = $connect->prepare($deleteSql);
    $stmt->bind_param("i", $userIdToDelete);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
}
// Fetch user details from the 'signup' table
$sql = "SELECT * FROM signup";
$result = $connect->query($sql);

// Close the database connection
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <div class="admin-panel">
        <h1>Admin Panel</h1>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['auto_id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td><a href='?delete_user={$row['auto_id']}' class='remove-btn'>Remove</a></td>
                                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function removeUser(userId) {
            // Add logic to remove user with the given ID
            alert('User removed with ID: ' + userId);
        }
    </script>
</body>
</html>
