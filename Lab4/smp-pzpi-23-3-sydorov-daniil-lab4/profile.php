<?php
include 'auth_check.php'; 
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Профіль</title>
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
    <h1>Ваш профіль</h1>
    <p>Логін: <strong><?php echo htmlspecialchars($_SESSION["user"]); ?></strong></p>

    <h2>Фото профілю</h2>
    <?php
    $filename = "uploads/" . $_SESSION["user"] . ".jpg";
    if (file_exists($filename)) {
        echo "<img src='$filename' style='max-width:200px;'><br>";
    } else {
        echo "<p>Фото ще не завантажено.</p>";
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="profile_photo" accept="image/*" required>
        <button type="submit" class='center-button'>Завантажити</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["profile_photo"])) {
        if (!is_dir("uploads")) mkdir("uploads");
        move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $filename);
        echo "<p>Фото завантажено!</p><meta http-equiv='refresh' content='1'>";
    }
    ?>
</main>
</body>
</html>
