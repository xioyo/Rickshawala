<?php
session_start();

include("connection.php");
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM signup WHERE email = '$email' and password= '$password'";
$result=mysqli_query($connect,$sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if($num > 0){

 $_SESSION["auto_id"] = $row["auto_id"];
 header("location:index.php");
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
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <button type="submit" name="submit">LOGIN</button><br><br>
                Don't have an account?&nbsp;<a href="signup.php">Signup Here</a><br>
                Are you a admin?&nbsp;<a href="adminlogin.php">Login Here</a>
            </form>
        </div>
    </body>
</html>
