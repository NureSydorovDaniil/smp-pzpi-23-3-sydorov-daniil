<?php session_start(); ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Кошик</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <a href="shophome.php">Головна</a> |
        <a href="products.php">Товари</a> |
        <a href="productsbin.php">Кошик</a>
    </nav>
</header>
<main>
    <h1>Кошик покупок</h1>
    <?php
    if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
        echo '<p>На данний час вами не було здійснено покупок</p>';
        echo '<p><a href="products.php">Перейти до покупок</a></p>';
    } else {
        echo '<ul>';
        $total = 0;
        foreach ($_SESSION["cart"] as $item) {
            $item_total = $item["price"] * $item["quantity"];
            $total += $item_total;
            echo '<li>'.$item["name"].' — '.$item["quantity"].' шт. ('.$item_total.' грн)</li>';
        }
        echo '</ul>';
        echo '<p><strong>Загальна сума: '.$total.' грн</strong></p>';
        echo '<form method="POST" action="clear_cart.php">';
        echo '<button type="submit">Очистити кошик</button>';
        echo '</form>';
    }
    ?>
</main>
<footer>
    <p>&copy; 2025 Web-магазин</p>
</footer>
</body>
</html>
