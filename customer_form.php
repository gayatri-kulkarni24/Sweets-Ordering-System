<?php
include "includes/header.php"; 
include "db.php";

$customer_id = $_SESSION['cid'];

$total = $_POST['total'];

if(isset($_POST['cart_checkout'])){
    $mode = "cart";
} else {
    $mode = "single";
    $sweet_name = $_POST['sweet_name'];
    $qty        = $_POST['qty'];
}

$q = mysqli_query($conn,
"SELECT address FROM customers
 WHERE customer_id=$customer_id");

$row = mysqli_fetch_assoc($q);
$address = $row['address'];
?>

<div class="container mt-5">

<h2>Confirm Your Order</h2>

<h4>Total Amount: ₹<?php echo $total; ?></h4>

<form action="success.php" method="POST">

 <input type="hidden" name="total" value="<?php echo $total; ?>">

<?php if($mode == "cart"){ ?>
    <input type="hidden" name="cart_checkout" value="1">
<?php } else { ?>
    <input type="hidden" name="sweet_name" value="<?php echo $sweet_name; ?>">
    <input type="hidden" name="qty" value="<?php echo $qty; ?>">
<?php } ?>

<div class="mb-3">
<label>Address</label>
<textarea name="address" class="form-control" required>
<?php echo $address; ?>
</textarea>
</div>

<div class="mb-3">
<label>Payment Method</label>
<select name="payment" class="form-control">
<option>Cash on Delivery</option>
<option>UPI</option>
<option>Credit Card</option>
<option>Debit Card</option>
</select>
</div>

<button class="btn btn-primary">
Confirm Order
</button>

</form>
</div>

<?php include "includes/footer.php"; ?>
