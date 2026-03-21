<?php
session_start();
include "db.php";
?>

<style>

body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    font-family:Segoe UI, sans-serif;
    background: linear-gradient(135deg,#1a73e8,#1de9b6);
}


/* same width for heading and form */
h1, form{
    width:500px;
}


/* heading */
h1{
    text-align:center;
    color:#1a73e8;
    margin-bottom:20px;
}

/* form box */
form{
    background:#eeeeee;
    padding:25px;
    border-radius:0 0 6px 6px;
    box-shadow:0 8px 20px rgba(0,0,0,0.25);
    border-radius:6px;
    font-size:16px;
    color:#333;
}


/* inputs */

input[type="email"],
input[type="password"]{
    display:block;
    width:100%;
    border:none;
    border-bottom:2px solid #1de9b6;
    background:transparent;
    padding:8px;
    margin-bottom:6px;
    font-size:15px;
}


input:focus{
    outline:none;
    border-bottom:2px solid #1a73e8;
}


/* button */

input[type="submit"]{
    width:100%;
    padding:12px;

    border:none;

    background: linear-gradient(90deg,#1a73e8,#1de9b6);

    color:white;

    font-size:20px;
    font-weight:bold;

    cursor:pointer;
}


/* hover */

input[type="submit"]:hover{

    opacity:0.9;

}


/* text */

p{
    text-align:center;
    margin-top:15px;
    font-size: 18px;
}


a{
    color:#1a73e8;
    font-weight:bold;
    text-decoration:none;
}

</style>

<form method="post">
<h1>Customer Login</h1>

Email:
<input type="email" name="email" required><br><br>

Password:
<input type="password" name="password" required><br><br>

<input type="submit" name="login" value="Login">

<p>
New user?
<a href="register.php">Register here</a>
</p>

</form>

<?php

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['cid'] = $row['customer_id'];
        $_SESSION['name'] = $row['name'];
        header("Location: index.php");
    }
    else
    {
        echo "Invalid Login";
    }
}

?>