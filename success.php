<!-- success.php -->
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

.success-icon{
  font-size:70px;
  color:#28a745;
  margin-bottom:20px;
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


<div class="success-container">

  <div class="success-card">

    <!-- Success Icon -->
    <div class="success-icon">✔</div>

    <h2>🎉Order Placed Successfully!🎉</h2>

    <p>
      Thank you for ordering from <b>Dhananjay's Sweets</b> 🍬<br>
      Your sweets will be prepared fresh.
    </p>

    <a href="menu.php" class="btn-order">
      Order More Sweets
    </a>

  </div>

</div>

<?php include "includes/footer.php"; ?>

<?php
session_start();
include "db.php";

/* CUSTOMER INSERT */

$name    = $_POST['name'];
$mobile  = $_POST['mobile'];
$address = $_POST['address'];
$total   = $_POST['total'];

mysqli_query($conn,
"INSERT INTO customers
(name,phone,address)
VALUES
('$name','$mobile','$address')");

$customer_id = mysqli_insert_id($conn);

/* ORDER INSERT */

mysqli_query($conn,
"INSERT INTO orders
(customer_id,total_amount)
VALUES
($customer_id,$total)");

$order_id = mysqli_insert_id($conn);

/* CHECK FLOW */

if(isset($_POST['cart_checkout']) &&
   $_POST['cart_checkout']==1){

  /* CART ITEMS INSERT */

  foreach($_SESSION['cart'] as $id=>$qty){

    $q=mysqli_query($conn,
    "SELECT price FROM sweets
     WHERE sweet_id=$id");

    $row=mysqli_fetch_assoc($q);
    $price=$row['price'];

    mysqli_query($conn,
    "INSERT INTO order_items
    (order_id,product_id,
     quantity,price)
     VALUES
    ($order_id,$id,$qty,$price)");
  }

  unset($_SESSION['cart']);

}else{

  /* BUY NOW SINGLE ITEM */

  $sweet_name = $_POST['sweet_name'];
  $qty        = $_POST['qty'];
  $price      = $total/$qty;

  $q=mysqli_query($conn,
  "SELECT sweet_id FROM sweets
   WHERE sweet_name='$sweet_name'");

  $row=mysqli_fetch_assoc($q);
  $pid=$row['sweet_id'];

  mysqli_query($conn,
  "INSERT INTO order_items
  (order_id,product_id,
   quantity,price)
   VALUES
  ($order_id,$pid,$qty,$price)");
}
?>
