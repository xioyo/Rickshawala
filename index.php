<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["auto_id"])) {
    // The user is logged in, and you can access the auto_id
    $auto_id = $_SESSION["auto_id"];
    // echo "User is logged in with auto_id: $auto_id";
} else {
    // The user is not logged in
    // echo "User is not logged in";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the logout form is submitted
    if (isset($_POST["logout"])) {
        // Unset and destroy the session
        session_unset();
        session_destroy();
        // Redirect to the login page
        header("Location: index.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();
    
    // Redirect to the same page to refresh content
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="stylehome.css">
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <title>rikshawala</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="#">rickshawalah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   
                </ul>
                <form class="d-flex" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <?php
                // Check if the user is logged in and display the logout button
                if (isset($_SESSION["auto_id"])) {
                    echo ' <form  method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <button class="btn btn-outline-light" type="submit" name="logout">Logout</button>
                    </form>
                    
                    <div class="d-flex p-2">
                    <button class="btn btn-outline-light" type="submit"><a href="profile.php" class="switch">My Account</a></button>
                </div>';
                } else {
                    // If not logged in, display the login button
                    echo '<div class="d-flex p-2">
                    <button class="btn btn-outline-light" type="submit"><a href="login.php" class="switch">Login</a></button>
                </div>
                <div class="d-flex p-2">
                    <button class="btn btn-outline-light" type="submit"><a href="signup.php" class="switch">Signup</a></button>
                </div>';
                }
                ?>
            </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="fw-bold mt-6">RikshaWala</h1>
                <p class="mt-3">
                    "Empowering your journey with just a tap! Welcome to seamless rides, where convenience meets
                    technology. With our online auto rickshaw booking app, we're not just changing how you travel; we're
                    transforming your commuting experience, one click at a time."</p>
                    <form action="search.php" method="get">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="pincode" class="w-100 form-control search" placeholder="Enter Pin Code">
                            </div>
                            <div class="col-md-4">
                                <input class="btn btn-dark" type="submit" value="Search">
                            </div>
                        </div>
                    </form>

            </div>
            <div class="col-md-6">
                <div class="col-md-6 mt-5">
                    <img id="imageAuto" src="images/Uber_Auto_558x372_pixels_Desktop.webp" alt="img">
                </div>
            </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </body>


</html>