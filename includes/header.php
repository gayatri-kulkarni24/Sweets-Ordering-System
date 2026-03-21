<!-- header.php -->
 <?php
session_start();
?>
<style>
  .imgLogo{
    height:60px;
    width:120px;
    background: #efe9e8d2;
    padding:10px;
    border-radius:14px;
  }

.dropdown {
position: relative;
display: inline-block;
}

.dropbtn {
background: #ba0a0a;
color: white;
padding: 10px 15px;
border: none;
cursor: pointer;
font-weight: bold;
border-radius: 5px;
}

.dropdown-content {
display: none;
position: absolute;
background: white;
min-width: 160px;
box-shadow: 0 5px 10px rgba(0, 0, 0, 0.74);
border-radius: 5px;
overflow: hidden;
}

.dropdown-content a {
color: black;
padding: 10px;
display: block;
text-decoration: none;
font-weight:600;
}

.dropdown-content a:hover {
background: #e6e1e1;
}

.dropdown:hover .dropdown-content {
display: block;
}

.dropdown:hover .dropbtn {
background: #ffffff;
}


</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="navbar navbar-expand-lg" style="background-color:#ba0a0a;">

<div class="container">
    
    <a class="navbar-brand" href="index.php" style="font-family: 'Shrikhand', cursive;
"> <img src="images\Dhananjay Logo english.png" alt="dhananjay logo" class="imgLogo"></a>

<div style="margin-right: 2px;">
      <a href="index.php" class="btn btn-outline-light" style="margin-left: 400px; font-size:21px;"><b>🏠 </b></a>
      <a href="menu.php" class="btn  btn-outline-light" style="margin-left: 30px; font-size:21px;"><b> 🍬</b></a>
      <a href="cart.php" class="btn btn-outline-light" style="margin-left: 30px; font-size:21px;">🛒 </a>
    

<div class="dropdown">

<button class="dropbtn btn btn-outline-light" style="margin-left: 30px; font-size:21px;">👨‍💼</button>

<div class="dropdown-content">

<?php if(isset($_SESSION['cid'])) { ?>

<a href="logout.php">Logout</a>

<?php } else { ?>

<a href="login.php">Login</a>

<?php } ?>

<a href="admin_login.php">Admin Dashboard</a>

</div>

</div>
  </div>
  </div>
</nav>

