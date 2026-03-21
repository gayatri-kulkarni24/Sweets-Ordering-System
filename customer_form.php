<?php include "includes/header.php"; ?>

<div class="container mt-5">

<h2>Customer Details</h2>

<form action="success.php" method="POST">

<input type="hidden" name="total"
value="<?php echo $_POST['total']; ?>">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name"
class="form-control" required>
</div>

<div class="mb-3">
<label>Mobile</label>
<input type="text" name="mobile"
class="form-control" required>
</div>

<div class="mb-3">
<label>Address</label>
<textarea name="address"
class="form-control" required></textarea>
</div>

<div class="mb-3">
<label>Payment Method</label>
<select name="payment"
class="form-control">

<option>Cash on Delivery</option>
<option>UPI</option>
<option>Credit Card</option>

</select>
</div>

<button class="btn btn-primary">
Confirm Order
</button>

</form>
</div>

<?php include "includes/footer.php"; ?>
