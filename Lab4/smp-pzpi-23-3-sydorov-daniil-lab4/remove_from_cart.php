<?php
session_start();
if (isset($_POST["product_id"])) {
    $id = (int) $_POST["product_id"];
    unset($_SESSION["cart"][$id]);
    file_put_contents("cart.json", json_encode($_SESSION["cart"], JSON_PRETTY_PRINT));
}
header("Location: productsbin.php");
exit;
