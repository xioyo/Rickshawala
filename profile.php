<?php
session_start();
include("connection.php");

if (!isset($_SESSION["auto_id"])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}

$auto_id = $_SESSION["auto_id"];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["toggleAvailability"])) {
    // Toggle the availability status in the database
    $sqlToggle = "UPDATE signup SET availability = NOT availability WHERE auto_id = '$auto_id'";
    if ($connect->query($sqlToggle) === TRUE) {
        // Success
        header("Refresh:0"); // Refresh the page to reflect the updated availability
    } else {
        // Error handling
        echo "Error updating availability: " . $connect->error;
    }
}

// Fetch availability status from the database
$sqlSelect = "SELECT availability FROM signup WHERE auto_id = '$auto_id'";
$result = $connect->query($sqlSelect);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $availability = $row["availability"];
} else {
    $availability = 0; // Default to 0 if no availability status is found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <link rel="stylesheet" type="text/css" href="styleprofile.css">
    <style>
        .available {
            background-color: green;
            color: white;
        }

        .not-available {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

    <h1>Database Records</h1>

    <?php
    // Fetch data from the database
    $sqlSelect = "SELECT * FROM signup where auto_id = '$auto_id'";
    $result = $connect->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["auto_id"] . "<br>";
            echo "Name: " . $row["name"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Number: " . $row["number"] . "<br>";
            echo "Pincode: " . $row["pincode"] . "<br>";
            echo "City: " . $row["city"] . "<br>";
        }
      }
            // Dynamically set button class based on availability status
           ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <?php
        // Dynamically set button class and text based on availability status
        $buttonClass = ($availability == 1) ? 'available' : 'not-available';
        $buttonText = ($availability == 1) ? 'Online' : 'Offline';
        ?>
        <button class="<?php echo $buttonClass; ?>" type="submit" name="toggleAvailability"><?php echo $buttonText; ?></button>
    </form>

    <script>
        // Add JavaScript to change button color and text on click
        document.addEventListener("DOMContentLoaded", function () {
            var button = document.querySelector('[name="toggleAvailability"]');
            button.addEventListener("click", function () {
                button.classList.toggle('available');
                button.classList.toggle('not-available');

                // Toggle button text
                var buttonText = (button.textContent.trim() === 'Online') ? 'Offline' : 'Online';
                button.textContent = buttonText;

                // Manually submit the form
                var form = document.querySelector('form');
                form.submit();
            });
        });
    </script>

</body>
</html>