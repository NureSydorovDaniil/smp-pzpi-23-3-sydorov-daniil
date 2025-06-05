<?php
session_start();
unset($_SESSION["cart"]);
unlink("cart.json");
header("Location: productsbin.php");
exit;
