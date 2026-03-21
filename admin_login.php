<?php
session_start();
include "db.php";
?>
<head>
<style>

body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    font-family:Segoe UI, sans-serif;
    background: linear-gradient(135deg,#141e30,#243b55);
}


/* same width */
h2, form{
    width:360px;
}


/* heading */
h2{
    text-align:center;
    /* color:#1a73e8; */
    margin-bottom:20px;
}


/* form box */
form{

    background:#1c1c1c;
    padding:25px;
    border-radius:0 0 8px 8px;
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
    color:white;
    font-size:14px;
}


/* inputs */

input[type="text"],
input[type="password"]{

    display:block;
    width:100%;

    background:transparent;

    border:none;
    border-bottom:2px solid #00c6ff;

    color:white;

    padding:8px;
    margin-bottom:20px;
}


input:focus{

    outline:none;
    border-bottom:2px solid #0072ff;

}


/* button */

input[type="submit"]{

    width:100%;
    padding:12px;

    border:none;

    background: linear-gradient(90deg,#00c6ff,#0072ff);

    color:white;

    font-size:15px;
    font-weight:bold;

    cursor:pointer;
}


input[type="submit"]:hover{

    opacity:0.9;

}

</style>
</head>

<form method="post">
<h2>Admin Login</h2>


Email:
<input type="text" name="email" required><br><br>

Password:
<input type="password" name="password" required><br><br>

<input type="submit" name="login" value="Login">

</form>

<?php

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['admin_id'] = $row['adminId'];
        $_SESSION['admin_name'] = $row['name'];

        header("Location: admin_panel.php");
        exit();
    }
    else
    {
        echo "Invalid admin login";
    }
}
?>