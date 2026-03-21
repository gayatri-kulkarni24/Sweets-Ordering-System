<?php
 session_start();
include "db.php";

if(!isset($_SESSION['admin_id']))
{
    header("Location: admin_login.php");
    exit();
}

$sql = "SELECT * FROM orders";
$result = mysqli_query($conn,$sql);
?>
<head>
<style>

body{
    background: linear-gradient(135deg,#141e30,#243b55);
    font-family:Segoe UI, sans-serif;
    color:white;
    text-align:center;
}
/* heading */
h2{
    margin-top:30px;
    color:#00c6ff;
}

/* table */
table{

    margin:auto;
    margin-top:20px;
    border-collapse:collapse;
    width:80%;
    background:#1c1c1c;
    box-shadow:0 8px 20px rgba(0,0,0,0.5);
}

/* header */

th{
    background:#111;
    color:#00c6ff;
    padding:12px;
    border:1px solid #333;
}
/* rows */

td{
    padding:10px;
    border:1px solid #333;
    color:white;
    text-align:center;
}

/* hover row */

tr:hover{
    background:#2a2a2a;
}

/* links */

a{
    color:#00c6ff;
    text-decoration:none;
    font-weight:bold;
}

a:hover{
    color:#66e0ff;
}


/* logout button */

a[href="admin_logout.php"]{
    display:inline-block;
    margin-top:20px;
    padding:10px 15px;
    background:#111;
    border-radius:5px;
    color:#00c6ff;
}

a[href="admin_logout.php"]:hover{
    background:#000;
}

</style>

</head>

<h2>All Orders</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Customer</th>
<th>Total</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['order_id']; ?></td>
<td><?php echo $row['customer_id']; ?></td>
<td><?php echo $row['total_amount']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<a href="update_order.php?id=<?php echo $row['order_id']; ?>">
Update
</a>
</td>
</tr>
<?php
}
?>
</table>
<br>
<a href="admin_logout.php">Logout</a>