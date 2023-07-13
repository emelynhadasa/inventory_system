<?php
    include_once("config.php");

    $id = $_GET['id'];

    $result = mysqli_query($db, "DELETE FROM locator WHERE locator_id = $id"); //diubah jadi id
    $result = true;

    if ($result) {
        echo '<script>alert("Data deleted successfully!"); window.location.href = "locator.php";</script>';
    }
?>