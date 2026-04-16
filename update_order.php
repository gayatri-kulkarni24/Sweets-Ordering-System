<?php
session_start();
include "db.php";

$id = $_GET['id'];

if(isset($_POST['update']))
{
    $status = $_POST['status'];

    $sql = "UPDATE orders
            SET status='$status'
            WHERE order_id='$id'";

    mysqli_query($conn,$sql);

    header("Location: admin_panel.php");
}

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
    color:white;
}

h2, form{

    width:360px;
}

h2{
text-align:center;
}

form{
    background:#1c1c1c;
    padding:25px;
    border-radius:0 0 8px 8px;
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
    font-size:14px;
}

select{
    width:100%;
    padding:8px;
    margin-top:10px;
    margin-bottom:20px;
    background:#111;
    color:white;
    border:1px solid #00c6ff;
}

input[type="submit"]{
    width:100%;
    padding:12px;
    border:none;
    background: linear-gradient(90deg,#00c6ff,#0072ff);
    color:white;
    font-weight:bold;
    cursor:pointer;
}


input[type="submit"]:hover{
    opacity:0.9;
}

</style>
</head>


<form method="post">
<h2>Update Order</h2>

Status:

<select name="status">

<option>Pending</option>
<option>Preparing</option>
<option>Delivered</option>

</select>

<br><br>

<input type="submit" name="update" value="Update">

</form>