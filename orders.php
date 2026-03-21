<?php
session_start();
include "db.php";

if($_SESSION['role']!="admin")
{
    header("Location: login.php");
}

$sql="SELECT * FROM orders";
$result=mysqli_query($conn,$sql);

include "header.php";
?>

<table border="1">

<tr>
<th>ID</th>
<th>Customer</th>
<th>Total</th>
<th>Status</th>
<th>Update</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['order_id']; ?></td>
<td><?php echo $row['customer_id']; ?></td>
<td><?php echo $row['total_amount']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>

<form method="post" action="update_status.php">

<input type="hidden" name="id"
value="<?php echo $row['order_id']; ?>">

<select name="status">
<option>Pending</option>
<option>Preparing</option>
<option>Delivered</option>
<option>Cancelled</option>
</select>

<button name="update">Update</button>

</form>

</td>

</tr>

<?php } ?>

</table>