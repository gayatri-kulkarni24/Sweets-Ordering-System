
<?php
include "includes/header.php";
include "db.php";

$sweet_id = $_POST['sweet_id'];
$price    = $_POST['price'];

$q = mysqli_query($conn,
"SELECT sweet_name FROM sweets
 WHERE sweet_id=$sweet_id");

$row = mysqli_fetch_assoc($q);
$name = $row['sweet_name'];
?>

<div class="container mt-5">

<h2>Place Order</h2>

<form action="customer_form.php" method="POST">

<p><b>Sweet:</b> <?php echo $name; ?></p>
<p><b>Price:</b> ₹<?php echo $price; ?> / kg</p>

<label>Quantity (kg)</label>

<input type="number"
name="qty"
id="qty"
value="1"
min="1"
class="form-control w-25"
oninput="calc()">

<br>

<p><b>Total: ₹
<span id="total">
<?php echo $price; ?>
</span>
</b></p>

<input type="hidden" name="total" id="total_input">
<input type="hidden" name="sweet_name"
value="<?php echo $name; ?>">

<button class="btn btn-success">
Place Order
</button>

</form>
</div>

<script>
function calc(){

 let price = <?php echo $price; ?>;
 let qty   = document.getElementById("qty").value;

 let total = price * qty;

 document.getElementById("total").innerText = total;
 document.getElementById("total_input").value = total;
}
window.onload = calc;
</script>

<?php include "includes/footer.php"; ?>
