<?php include "includes/header.php"; ?>
<link href="https://fonts.googleapis.com" rel="stylesheet">

<style>
.banner{
  height:300px;
  display:flex;
  align-items:center;
  justify-content:center;
  color:white;
  font-size:40px;
  font-weight:bold;
  text-shadow:2px 2px 5px rgba(0,0,0,0.7);
}

.container-box{
  background:#fff;
  padding:40px;
  border-radius:15px;
  box-shadow:0 0 15px rgba(0,0,0,0.1);
}

.btn-custom{
  background:#e67e22;
  color:white;
  padding:12px 25px;
  border-radius:25px;
  text-decoration:none;
  font-weight:bold;
}

.btn-custom:hover{
  background:#d35400;
}
</style>

<!-- <div class="banner">
  Fresh Sweets Delivered 🍬<br>
</div> -->
<div class="container mt-5">
<div class="container-box text-center">
<div class="shop-title-row">
<h1 class="shop-name">
    🥮Welcome to Dhananjay Sweets & Milk Center🥛  
</h1>
</div>
<div class="shop-title-row">
  
<div class="col-md-3">
  <div class="card m-3 text-center">
      <img src="images/pedha.jpg"
     height="150">
</div>
</div>

<div class="col-md-3">
  <div class="card m-3text-center">
      <img src="images/masala_milk.jpg"
     height="150">
</div>
</div>

<div class="col-md-3">
  <div class="card m-3 text-center">
      <img src="images/chocolate.jpg"
     height="150">
</div>
</div>
</div>

<br>
  <div>
    <h5 style="font-family:cursive">
       &#11088;Order delicious traditional sweets
      freshly prepared every day &#11088;
</h5>
  </div>
<br>
    <div>
    <a href="menu.php" class="btn-custom">
      Order Now
    </a>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>
