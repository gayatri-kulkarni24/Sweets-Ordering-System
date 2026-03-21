<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">

<style>

body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Segoe UI, sans-serif;

    background: linear-gradient(135deg,#1a73e8,#1de9b6);
}

/* title */
h1{
    text-align:center;
    color:#1a73e8;
    margin-bottom:20px;
}

/* form box */
form{
    width:600px;
    background:#f2f2f2;
    padding:20px;
    border-radius:6px;
    box-shadow:0 8px 20px rgba(0,0,0,0.3);
}

/* label text */
form{
    color:#333;
    font-size:16px;
}

/* inputs */
input[type="text"],
input[type="email"],
input[type="password"]{

    display:block;
    width:100%;
    border:none;
    border-bottom:2px solid #1de9b6;
    background:transparent;
    padding:4px;
    margin-bottom:3px;
    font-size:15px;
}

/* focus line */
input:focus{
    outline:none;
    border-bottom:2px solid #1a73e8;
}

/* button */
input[type="submit"]{
    width:100%;
    padding:12px;
    background: linear-gradient(90deg,#1a73e8,#1de9b6);
    border:none;
    color:white;
    font-size:20px;
    font-weight:bold;
    cursor:pointer;
}

/* button hover */
input[type="submit"]:hover{
    opacity:0.9;
}

/* link text */
p{
    text-align:center;
    margin-top:15px;
    font-size: 18px;
}

a{
    color:#1a73e8;
    text-decoration:none;
    font-weight:bold;
}

</style>
</head>
<body>



<form method="post">
<h1>Customer Register</h1>

Name:
<input type="text" name="name" required><br><br>

Email:
<input type="email" name="email" required><br><br>

Phone:
<input type="text" name="phone" required><br><br>

Password:
<input type="password" name="password" required><br><br>

Address:
<input type="text" name="address" required><br><br>

<input type="submit" name="register" value="Register">

<p>
Already registered?
<a href="login.php">Login here</a>
</p>

</form>

<?php

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers(name,phone,email,password,address)
            VALUES('$name','$phone','$email','$password','$address')";

    mysqli_query($conn,$sql);

    $id = mysqli_insert_id($conn);

    $_SESSION['cid'] = $id;
    $_SESSION['name'] = $name;

    header("Location: index.php");
}

?>

</body>
</html>