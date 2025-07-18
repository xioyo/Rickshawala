<?php
include("connection.php");
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$number = $_POST['number'];
$pincode = $_POST['pincode'];
$city = $_POST['city'];


$sql = "SELECT * FROM signup WHERE email = '$email'";
$sql1 = "SELECT max(auto_id)  from signup ";
$result=mysqli_query($connect,$sql);
$result1=mysqli_query($connect,$sql1);
$auto_id = mysqli_num_rows($result1);
$num = mysqli_num_rows($result);
if($num > 0){
    echo'<script>alert("Email already exist")</script>';
}
else{
    $auto_id += 1;
    $insert= "INSERT INTO signup(name,email,number,pincode,city,password)VALUES('$name','$email','$number','$pincode','$city','$password')";
    mysqli_query($connect,$insert);
    header("location:login.php");
}
}
?>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="styleindex.css">
    </head>
    <body>
        <div class="main">
            <form method="POST">
                <h1>SIGNUP</h1><br><br>
                <input type="text" name="name" placeholder="Name"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="text" name="number" placeholder="Number"><br>
                <input type="text" name="pincode" placeholder="Pincode"><br>
                <input type="text" name="city" placeholder="City"><br>
         
                <input type="password" name="password" placeholder="Password"><br>
                <button type="submit" name="submit">SIGNUP</button><br><br>
                Have an account?&nbsp;<a href="login.php">Login Here</a>
            </form>
        </div>
    </body>
</html>
