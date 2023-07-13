<?php
include_once("config.php"); 
//masalahnya ada di product id, di bawah ini. product id bermasalah, jd product lain juga ga kedetect
if(isset($_POST['update'])) {
    $locator_id = $_POST['locator_id'];
    $product_id = $_POST['product_id'];
    $l_date = $_POST['l_date'];
    $current_loc = $_POST['current_loc'];

    $result = mysqli_query($db, "UPDATE locator SET locator_id='$locator_id', product_id='$product_id', l_date='$l_date', current_loc='$current_loc' WHERE locator_id='$locator_id'");
    $result = true;

    if ($result) {
        echo '<script>alert("Data edited successfully!"); window.location.href = "locator.php";</script>';
    }
}

if (isset($_GET['locator_id'])) {
    while($locator = mysqli_fetch_array($result)) {
        $product_id = $locator['product_id'];
        $l_date = $locator['l_date'];
        $current_loc = $locator['current_loc'];
    }
}
    $id = $_GET['id'];//diubah dr sini, getnya diubah jadi id

    $result = mysqli_query($db, "SELECT * FROM locator WHERE locator_id='$id'");//biar product id 
    $locator = mysqli_fetch_array($result);

    // $product_name = $product['product_name'];
    // $product_desc = $product['product_desc'];
    // $quantity = $product['quantity']; -->
// } else {
//     $product_id = '';
//     $product_name = '';
//     $product_desc = '';
//     $quantity = '';
// }
// echo $product_id;//untuk ngecheck apakah product id bekerja. kalau product id dibuatinnya "1", bukan hidden, muncul.
?>
<html>
<head>
    <title>Edit Locator Data &#124 Warehouse Application</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>

<br><br>

<div class="header">
  	<h2>Edit Location</h2>
</div>

<form name="update_student" method="post" action="editlocator.php">
        <div class="col">
            <label>Product ID</label>
            <input type="text" name="product_id" value="<?php echo $locator['product_id']; ?>"> <!--tambah square bracket-->
        </div>

        <div class="col">
            <label>Date</label>
            <input type="date" name="l_date" value="<?php echo $locator['l_date']; ?>">
        </div>
        
        <div class="col">
            <label>Location</label>
            <input type="text" name="current_loc" value="<?php echo $locator['current_loc']; ?>">
        </div>
        
            <input type="hidden" name="locator_id" value="<?php echo $locator['locator_id']; ?>">
            <input type="submit" class="btn" name="update" value="   Update   ">
            <a href="locator.php">Go to Locator</a>
</form>
</body>
</html>
