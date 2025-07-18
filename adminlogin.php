<?php
session_start();

include("connection.php");
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];

if($email === 'admin@abc.com' && $password === '123'){

//  $_SESSION["auto_id"] = $row["auto_id"];
 header("location:admin.php");
}
else{
  echo'<script>alert("Email id and password is not matching")</script>';
}
}
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="styleindex.css">
    </head>
    <body>
        <div class="main">
            <form method="POST">
                <h1>LOGIN</h1><br><br>
                <input type="email" name="email" placeholder="Username"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <button type="submit" name="submit">LOGIN</button><br><br>

                Are you a driver?&nbsp;<a href="login.php">Login Here</a>
            </form>
        </div>
    </body>
</html>
