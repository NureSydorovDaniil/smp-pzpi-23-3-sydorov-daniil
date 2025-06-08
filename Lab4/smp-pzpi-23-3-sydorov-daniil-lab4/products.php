<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Товари</title>
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
    <h1>Список товарів</h1>
    <?php
    $products = [
        1 => ["name" => "Ігровий Ноутбук Acer", "price" => 40000],
        2 => ["name" => "Смартфон Samsung", "price" => 22000],
        3 => ["name" => "Смарт годинник Apple Watch", "price" => 15000],
    ];

    foreach ($products as $id => $product) {
        echo "<div>
            <h3>{$product['name']}</h3>
            <p>Ціна: {$product['price']} грн</p>
            <form method='POST' action='add_to_cart.php'>
                <input type='hidden' name='product_id' value='$id'>
                <input type='number' name='quantity' value='1' min='1' required>
                <button type='submit' class='center-button'>Додати до кошика</button>
            </form>
        </div><hr>";
    }
    ?>
</main>
</body>
</html>
