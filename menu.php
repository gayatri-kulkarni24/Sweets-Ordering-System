<?php include "includes/header.php"; ?>
<?php include "db.php"; ?>

<div class="container mt-5">
<h2 class="text-center" style="font-family:Arial; font-weight:bold;">Our Sweets</h2>

<div class="row">
<?php
$q = mysqli_query($conn,"SELECT * FROM sweets");
while($row=mysqli_fetch_assoc($q)){
?>

<div class="col-md-3">
<div class="card m-3 p-3 text-center">
<img src="images/<?php echo $row['image']; ?>"
     height="150">

<h5 class="mt-2">
<?php echo $row['sweet_name']; ?>
</h5>

<p>₹<?php echo $row['price']; ?> / kg</p>

<form action="place_order.php" method="POST">

<input type="hidden" name="sweet_id"
value="<?php echo $row['sweet_id']; ?>">

<input type="hidden" name="price"
value="<?php echo $row['price']; ?>">

<!-- BUY NOW -->
<button
class="btn btn-warning m-1">
Buy Now
</button>
</form>

<form action="add_to_cart.php" method="POST">
  <input type="hidden" name="sweet_id"
         value="<?php echo $row['sweet_id']; ?>">

  <button class="btn btn-outline-success">
    Add to Cart
  </button>
</form>

</div>
</div>

<?php } ?>

</div>
</div>

<?php include "includes/footer.php"; ?>
