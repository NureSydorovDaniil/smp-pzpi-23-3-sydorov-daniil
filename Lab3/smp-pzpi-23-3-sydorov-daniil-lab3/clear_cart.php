<?php
session_start();
unset($_SESSION["cart"]);
header("Location: productsbin.php");
exit;
