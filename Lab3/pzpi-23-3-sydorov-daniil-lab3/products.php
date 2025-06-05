<?php session_start(); ?>
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
        <a href="productsbin.php">Кошик</a>
    </nav>
</header>
<main>
    <h1>Товари</h1>
    <section class="product-list">
        <?php
        $products = [
            ["id" => 1, "name" => "Ігровий Ноутбук Acer", "price" => 40000, "img" => "https://bigmag.ua/image/cache/catalog/new/Wind/Acer%20Nitro%20V%2015%20ANV15-51/1-2000x2000.jpg"],
            ["id" => 2, "name" => "Смартфон Samsung", "price" => 22000, "img" => "https://i.ebayimg.com/images/g/hkoAAOSwCBxlOYRh/s-l1200.jpg"],
            ["id" => 3, "name" => "Смарт годинник Apple Watch", "price" => 15000, "img" => "https://g-store.com.ua/image/cache/catalog/productfoto/12533/apple-watch-series-9-45mm-gps-lte-graphite-stainless-steel-with-graphite-milanese-loop-mrmx3-1-1200x1200.jpg"]
        ];

        foreach ($products as $product) {
            echo '<div class="product">';
            echo '<img src="'.$product["img"].'" alt="'.$product["name"].'" class="product-img">';
            echo '<h2>'.$product["name"].'</h2>';
            echo '<p>Ціна: '.$product["price"].' грн</p>';
            echo '<form method="POST" action="add_to_cart.php">';
            echo '<input type="hidden" name="product_id" value="'.$product["id"].'">';
            echo '<input type="number" name="quantity" value="1" min="1" required>';
            echo '<button type="submit">Купити</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </section>
</main>
<footer>
    <p>&copy; 2025 Web-магазин</p>
</footer>
</body>
</html>
