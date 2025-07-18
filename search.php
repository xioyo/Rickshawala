<?php
session_start();

include("connection.php");
// Establish a database connection (replace these values with your database credentials)


if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo $_GET["pincode"];

// Fetch user details based on pincode
if (isset($_GET["pincode"])) {
    $pincode = $_GET["pincode"];
    // Use prepared statement to prevent SQL injection
    $stmt = $connect->prepare("SELECT * FROM signup WHERE pincode = ?");
    $stmt->bind_param("s", $pincode);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display user details
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["auto_id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Number: " . $row["number"] . "<br>";
        echo "Pincode: " . $row["pincode"] . "<br>";
        echo "City: " . $row["city"] . "<br>";
        $status = ($row["availability"] == 1) ? 'online' : 'offline';
        echo "Availabilty: " . $status . "<br>";
        echo "--------------------------<br>";
    }

    $stmt->close();
}else{
    echo "No pincode Found";
}

// Close the database connection
$connect->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto list</title>
    <link rel="stylesheet" type="text/css" href="stylesearch.css">
</head>
<body>
    
</body>
</html>