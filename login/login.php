<?php

session_start();
include "connect.php";
if(isset($_POST["login"])) {
    if($_POST["username"] == "" or $_POST["email"] =="" or $_POST["password"] == "") {  
    echo "<center>
        <h1>
            Username,Email and Password cannot be empty...!
        </h1>
    </center>
    ";

    }else {
$email=trim($_POST["email"]);
$username=strip_tags(trim($_POST["username"]));
$password=strip_tags(trim($_POST["password"]));
$query=$db->prepare("SELECT * FROM Login WHERE email=? AND password=?");
$query->execute(array($email, $password));
$control=$query->fetch(PDO::FETCH_OBJ);
if ($control > 0) {
    $_SESSION["username"]=$username;
    header("Location:member.php");
}
echo "<center>
    <h1>
        incorrect Password or Email..!
    </h1>
</center>
";
    }
}
?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Viewport" content="width=device=width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Login Page</title>
</head>
<body>
    <div class="wrapper">
        <form method="POST">
        <a href="index1.html">HomePage</a>

            <p>
                <label for="Username">Username</label>
                <input name="username" type="text">
            <p>
            <p>
                <label for="Email">Email</label>
                <input name="email" type="text">
            <p>
            <p>
                <label for="Password">Password</label>
                <input name="password" type="text">
            <p>
            <button type="submit" name="login">Login</button>
        </form>  
</div>  


</body>
</html>