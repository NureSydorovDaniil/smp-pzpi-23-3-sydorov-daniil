<?php
session_start();

$products = [
    1 => ["name" => "Ігровий Ноутбук Acer", "price" => 40000],
    2 => ["name" => "Смартфон Samsung", "price" => 22000],
    3 => ["name" => "Смарт годинник Apple Watch", "price" => 15000],
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = (int) $_POST["product_id"];
    $quantity = (int) $_POST["quantity"];

    if (isset($products[$product_id])) {
        $product = $products[$product_id];

        if (isset($_SESSION["cart"][$product_id])) {
            $_SESSION["cart"][$product_id]["quantity"] += $quantity;
        } else {
            $_SESSION["cart"][$product_id] = [
                "id" => $product_id,
                "name" => $product["name"],
                "price" => $product["price"],
                "quantity" => $quantity
            ];
        }
    }
}

header("Location: productsbin.php");
exit;
