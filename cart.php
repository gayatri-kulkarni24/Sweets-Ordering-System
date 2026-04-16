<?php
include "includes/header.php";
include "db.php";

if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
  echo "<h3 class='text-center mt-5'>
        Cart is Empty 🛒
        </h3>";
  exit;
}
?>
<div class="container mt-5 h-50">
  
<h2>Your Cart</h2>

<table class="table table-bordered">

<tr>
<th>Sweet</th>
<th>Price</th>
<th>Qty</th>
<th>Total</th>
<th>Action</th>
</tr>

<?php
$grand_total = 0;

foreach($_SESSION['cart'] as $id=>$qty){

$q = mysqli_query($conn,
"SELECT * FROM sweets
 WHERE sweet_id=$id");

$row = mysqli_fetch_assoc($q);

$total = $row['price'] * $qty;
$grand_total += $total;
?>

<tr>
<td><?php echo $row['sweet_name']; ?></td>
<td>₹<?php echo $row['price']; ?></td>
<td><?php echo $qty; ?></td>
<td>₹<?php echo $total; ?></td>

<td>
<a href="remove_cart.php?id=<?php echo $id; ?>"
class="btn btn-danger btn-sm">
Remove
</a>
</td>
</tr>

<?php } ?>

</table>

<h4>Grand Total: ₹<?php echo $grand_total; ?></h4>

<form action="customer_form.php" method="POST">
<input type="hidden"
name="cart_checkout" value="1">

<input type="hidden"
name="total"
value="<?php echo $grand_total; ?>">

<button class="btn btn-success">
Place Order
</button>
</form>

</div>

<?php include "includes/footer.php"; ?>
