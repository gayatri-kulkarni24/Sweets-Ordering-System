<!-- / success.php -->
<?php include "includes/header.php"; ?>
<style>
.success-container{
  display:flex;
  justify-content:center;
  align-items:center;
  height:70vh;
  text-align:center;
}

.success-card{
  background: #fff;
  padding:40px;
  border-radius:15px;
  box-shadow:0 5px 20px rgba(0,0,0,0.2);
  max-width:400px;
  width:90%;
  margin-top:40px;
}


.success-icon {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 4px solid #28a745;
  background-color: white;

  display: flex;
  justify-content: center;
  align-items: center;

  font-size: 50px;
  color: #28a745;

  margin: 0 auto 20px auto; /* THIS is the magic */
}

.success-card h2{
  color:#333;
  margin-bottom:10px;
}

.success-card p{
  color:#666;
  font-size:16px;
}

.btn-order{
  display:inline-block;
  margin-top:20px;
  padding:12px 25px;
  background:#ff6f61;
  color:white;
  text-decoration:none;
  border-radius:8px;
  font-weight:bold;
  transition:0.3s;
}

.btn-order:hover{
  background:#e85b50;
}

</style>


<?php

include "db.php";

$customer_id = $_SESSION['cid'];

$address = mysqli_real_escape_string($conn, $_POST['address']);
$total   = $_POST['total'];
$payment = $_POST['payment'];

// $sweet_name = $_POST['sweet_name'];
// $qty        = $_POST['qty'];
// 

/* VALIDATION */
if(empty($address) || empty($total) || empty($payment)){
  die("Missing required data");
}

/* UPDATE ADDRESS */
if(!mysqli_query($conn,
"UPDATE customers
 SET address='$address'
 WHERE customer_id=$customer_id")){
  die("Address Update Error: " . mysqli_error($conn));
}

/* INSERT ORDER */
if(!mysqli_query($conn,
"INSERT INTO orders
(customer_id, address, total_amount, payment_method, status)
VALUES
($customer_id, '$address', $total, '$payment', 'Pending')")){
  die("Order Insert Error: " . mysqli_error($conn));
}

$order_id = mysqli_insert_id($conn);

// $q = mysqli_query($conn,
// "SELECT sweet_id, price FROM sweets
//  WHERE sweet_name='$sweet_name'");

// if(!$q){
//   die("Query Error: " . mysqli_error($conn));
// }

// $row = mysqli_fetch_assoc($q);

// if(!$row){
//   die("Sweet not found. Check sweet_name.");
// }

// $sweet_id = $row['sweet_id'];
// $price    = $row['price'];

// $subtotal = $price * $qty;

// if(!mysqli_query($conn,
// "INSERT INTO order_items
// (order_id, sweet_id, quantity, subtotal)
// VALUES
// ($order_id, $sweet_id, $qty, $subtotal)")){
//   die("Insert Error: " . mysqli_error($conn));
// }
?>




<div class="success-container">

  <div class="success-card">

    <!-- Success Icon -->
    <div class="success-icon">✔
    </div>

    <h2>🎉Order Placed Successfully!🎉</h2>

    <p>
      Thanks for ordering from <b>Dhananjay's Sweets</b> 🍬<br>
  We’re preparing your sweets with care and freshness.

    </p>
    <h6>Kindly keep <b>₹<?php echo $total; ?></b> ready for payment upon delivery.</h6>
    <a href="menu.php" class="btn-order">
      Browse More Sweets
    </a>

  </div>

</div>

<?php include "includes/footer.php"; ?>




