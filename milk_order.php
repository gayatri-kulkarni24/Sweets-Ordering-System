<!-- milk_order.php -->
<?php include "includes/header.php"; ?>
<?php
date_default_timezone_set("Asia/Kolkata");

$current_time = date("H:i");
$start = "16:00";
$end   = "23:30";

$is_available = ($current_time >= $start && $current_time <= $end);
?>

<style>

.milk-container{
  max-width:600px;
  margin:50px auto;
  padding:30px;
  background:white;
  text-align:center;
  border-radius:12px;
  box-shadow:0 5px 15px rgba(0,0,0,0.2);
}
.milk-container img{
  width:250px;
  border-radius:10px;
  margin-bottom:20px;
}
.price{
  font-size:20px;
  color:#ff6f61;
  font-weight:bold;
}

select, input{
  padding:8px;
  margin:10px;
  width:120px;
}

.btn{
  padding:10px 20px;
  background:#ff6f61;
  color:white;
  border:none;
  border-radius:6px;
  cursor:pointer;
}

.btn:hover{
  background:#e85b50;
}

.not-available{
  color:red;
  font-weight:bold;
  font-size:18px;
}

</style>


<div class="milk-container">

<h2 style="color:brown;">Masala Milk 🥛</h2>
<h5>“Evenings Made Better with Masala Milk.”</h5><br>
<img src="images/masala_milk.jpg" alt="Masala Milk">

<p class="price">
Full Glass ₹40 | Half Glass ₹20
</p>

<?php if($is_available){ ?>

<form action="customer_form.php" method="POST">

  <input type="hidden" name="sweet_name" value="Masala Milk">

  <!-- Size Selection -->
  Size:<br>

  <select name="size" id="size" onchange="updatePrice()">
    <option value="Full" data-price="40">Full Glass</option>
    <option value="Half" data-price="20">Half Glass</option>
  </select>

  <br>

  Quantity:<br>
  <input type="number" name="qty" id="qty"
         value="1" min="1"
         onchange="updatePrice()">

  <br>

  <!-- Total Display -->
  <h3>Total: ₹ <span id="total">40</span></h3>

  <input type="hidden" name="total" id="total_input" value="40">

  <button class="btn" type="submit">
    Order Now
  </button>

</form>

<?php } else { ?>

<p class="not-available">
Masala Milk Available Only <br>
🕓 4:00 PM – 11:30 PM
</p>

<?php } ?>

</div>


<script>
function updatePrice(){

  var size = document.getElementById("size");
  var price = size.options[size.selectedIndex]
                  .getAttribute("data-price");

  var qty = document.getElementById("qty").value;

  var total = price * qty;

  document.getElementById("total").innerText = total;
  document.getElementById("total_input").value = total;
}
</script>

<?php include "includes/footer.php"; ?>
