<?php
// include "includes/header.php";
// include "db.php";

// $sweet_id = $_POST['sweet_id'];
// $price    = $_POST['price'];

// $q = mysqli_query($conn,
// "SELECT sweet_name FROM sweets
//  WHERE sweet_id=$sweet_id");

// $row = mysqli_fetch_assoc($q);
// $name = $row['sweet_name'];
?>

<!-- <div class="container mt-5">

<h2>Place Order</h2>

<form action="customer_form.php" method="POST">

<p><b>Sweet:</b> <?//php echo $name; ?></p>
<p><b>Price:</b> ₹<?//php echo $price; ?> / kg</p>

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
<?//php echo $price; ?>
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

 let price = <?//php echo $price; ?>;
 let qty   = document.getElementById("qty").value;

 let total = price * qty;

 document.getElementById("total").innerText = total;
 document.getElementById("total_input").value = total;
}
window.onload = calc;
</script> -->

<?//php include "includes/footer.php"; ?>






<?php
include "includes/header.php";
include "db.php";

$sweet_id = $_POST['sweet_id'] ?? 0;
$price    = $_POST['price'] ?? 0;

$stmt = $conn->prepare("SELECT sweet_name FROM sweets WHERE sweet_id = ?");
$stmt->bind_param("i", $sweet_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$name = $row['sweet_name'] ?? '';
?>

<div class="container mt-5">
    <h2>Place Order</h2>

    <form action="customer_form.php" method="POST">
        <p><b>Sweet:</b> <?php echo htmlspecialchars($name); ?></p>
        <p><b>Price:</b> ₹<?php echo $price; ?> / kg</p>

        <div class="mb-3 w-25">
            <label for="weight_select">Select Quantity</label>
            <select id="weight_select" class="form-control" onchange="toggleCustom()">
                <option value="0.25">250 grams</option>
                <option value="0.5">500 grams</option>
                <option value="0.75">750 grams</option>
                <option value="1" selected>1 kg</option>
                <option value="2">2 kg</option>
                <option value="custom">Custom (in grams)</option>
            </select>
        </div>

        <!-- Hidden by default; appears if user picks "Custom" -->
        <div class="mb-3 w-25" id="custom_box" style="display: none;">
            <label for="custom_grams">Enter Grams (e.g., 100, 350, 1500)</label>
            <input type="number" id="custom_grams" class="form-control" min="50" step="50" value="250" oninput="calc()">
        </div>

        <p><b>Total: ₹<span id="total"><?php echo $price; ?></span></b></p>

        <!-- Hidden fields sent to customer_form.php -->
        <input type="hidden" name="qty" id="qty_input" value="1">
        <input type="hidden" name="total" id="total_input" value="<?php echo $price; ?>">
        <input type="hidden" name="sweet_name" value="<?php echo htmlspecialchars($name); ?>">

        <button class="btn btn-success">Place Order</button>
    </form>
</div>

<script>
function toggleCustom() {
    let select = document.getElementById("weight_select").value;
    let customBox = document.getElementById("custom_box");

    if (select === "custom") {
        customBox.style.display = "block";
    } else {
        customBox.style.display = "none";
    }
    calc();
}

function calc() {
    let price = <?php echo (float)$price; ?>;
    let select = document.getElementById("weight_select").value;
    let qtyInKg = 0;

    if (select === "custom") {
        let grams = parseFloat(document.getElementById("custom_grams").value) || 0;
        qtyInKg = grams / 1000; // Convert grams to kg (e.g., 250g -> 0.25kg)
    } else {
        qtyInKg = parseFloat(select);
    }

    let total = (price * qtyInKg).toFixed(2);

    document.getElementById("total").innerText = total;
    document.getElementById("total_input").value = total;
    document.getElementById("qty_input").value = qtyInKg; // Sends kg (e.g., 0.25, 0.5) to next page
}

window.onload = calc;
</script>

<?php include "includes/footer.php"; ?>
