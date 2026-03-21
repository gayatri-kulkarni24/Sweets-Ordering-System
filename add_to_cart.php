<?php
session_start();
include "db.php";

$id = intval($_POST['sweet_id']);

/* INIT CART */
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

/* ADD ITEM */
if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id] += 1;
}else{
    $_SESSION['cart'][$id] = 1;
}

/* REDIRECT */
header("Location: cart.php");
exit;
?>
