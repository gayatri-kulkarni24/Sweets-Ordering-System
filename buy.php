<!-- buy.php -->
<?php
include "db.php";

if(isset($_POST['buy'])){

  $price = floatval($_POST['price']);
  $qty   = intval($_POST['qty']);

  if($qty <= 0){
    $qty = 1;
  }

  $total = $price * $qty;

  // Dummy customer id (since no login system needed)
  $customer_id = 1;

  $sql = "INSERT INTO orders
          (customer_id, total_amount)
          VALUES
          ($customer_id, $total)";

  $run = mysqli_query($conn,$sql);

  if($run){
    echo "<h2>Order Placed Successfully</h2>";
    echo "<p>Total Paid: ₹$total</p>";
  }
  else{
    echo "Error: ".mysqli_error($conn);
  }
}
?>
