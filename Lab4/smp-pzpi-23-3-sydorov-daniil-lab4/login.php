<?php
session_start();

$users = [
    "admin" => "1234", // логин пароль, не забыть
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"] ?? '';
    $password = $_POST["password"] ?? '';

    if (isset($users[$login]) && $users[$login] === $password) {
        $_SESSION["user"] = $login;
        header("Location: shophome.php");
        exit;
    } else {
        $error = "Невірний логін або пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <h1>Вхід</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="login" placeholder="Логін" required><br><br>
        <input type="password" name="password" placeholder="Пароль" required><br><br>
        <button type="submit">Увійти</button>
    </form>
</main>
</body>
</html>
