<?php
include 'auth_check.php'; 
?>
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
        <a href="productsbin.php">Кошик</a> |
        <a href="profile.php">Профіль</a> |
        <a href="logout.php">Вийти</a>
    </nav>
</header>
<main>
    <h1>Ваш кошик</h1>
    <?php
    if (empty($_SESSION["cart"])) {
        echo "<p>Кошик порожній.</p>";
    } else {
        $total = 0;
        echo "<ul class='cart-list'>";
        foreach ($_SESSION["cart"] as $id => $item) {
            $sum = $item["price"] * $item["quantity"];
            $total += $sum;
            echo "<li>
                {$item['name']} — {$item['quantity']} шт. ({$sum} грн)
                <form method='POST' action='remove_from_cart.php' style='display:inline;'>
                    <input type='hidden' name='product_id' value='{$id}'>
                    <button type='submit' class='remove-item'>Видалити</button>
                </form>
            </li>";
        }
        echo "</ul>";
        echo "<p><strong>Загальна сума: {$total} грн</strong></p>";
        echo "<form method='POST' action='clear_cart.php'>
                <button type='submit' class='center-button'>Очистити кошик</button>
              </form>";
    }
    ?>
</main>
</body>
</html>
