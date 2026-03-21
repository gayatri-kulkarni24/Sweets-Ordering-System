<?php
//include "db.php";

/* BLOCK DIRECT ACCESS 
if(!isset($_POST['buy'])){
  echo "<h3>Invalid Access</h3>";
  exit;
}
*/
/* GET DATA
$sweet_id = intval($_POST['sweet_id']);
$price    = floatval($_POST['price']);
$qty      = intval($_POST['qty']);

if($qty <= 0){
  $qty = 1;
}
 */
/* FETCH SWEET NAME 
$q = mysqli_query($conn,
     "SELECT sweet_name FROM sweets
      WHERE sweet_id=$sweet_id");

$row = mysqli_fetch_assoc($q);

$name = $row['sweet_name'];
*/
/* CALCULATE TOTAL 
$total = $price * $qty;
?>

<h2>Checkout</h2>

<p><b>Sweet:</b> <?php echo $name; ?></p>
<p><b>Price:</b> ₹<?php echo $price; ?></p>
<p><b>Quantity:</b> <?php echo $qty; ?></p>
<p><b>Total:</b> ₹<?php echo $total; ?></p>

<form action="place_order.php" method="POST">

<input type="hidden" name="total"
value="<?php echo $total; ?>">

<button type="submit" name="place">
Confirm Order
</button>

</form>
*/