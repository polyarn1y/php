<?php
require_once 'config.php';

$db = mysqli_connect(HOST, USER, PASS, DB_NAME);
if (!$db) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
mysqli_set_charset($db, 'utf8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $email = trim(htmlspecialchars(mysqli_real_escape_string($db, $_POST['email'])));
    $msg = trim(htmlspecialchars(mysqli_real_escape_string($db, $_POST['msg'])));
    
    if ($name && $email && $msg) {
        $query = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
        mysqli_query($db, $query);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}

if (isset($_GET['del'])) {
    $id = (int)$_GET['del'];
    $delete_query = "DELETE FROM msgs WHERE id = $id";
    mysqli_query($db, $delete_query);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
$query = "SELECT * FROM msgs ORDER BY id DESC";
$result = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Ваше имя:<br>
    <input type="text" name="name" required><br>
    Ваш E-mail:<br>
    <input type="email" name="email" required><br>
    Сообщение:<br>
    <textarea name="msg" cols="50" rows="5"></textarea><br>
    <br>
    <input type="submit" value="Добавить!" required>
</form>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<h2>Сообщения:</h2>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>Имя:</strong> {$row['name']}<br>";
        echo "<strong>E-mail:</strong> {$row['email']}<br>";
        echo "<strong>Сообщение:</strong> {$row['msg']}<br>";
        echo "<a href='{$_SERVER['PHP_SELF']}?del={$row['id']}'>Удалить</a></p>";
    }
} else {
    echo "Сообщений пока нет.";
}

mysqli_close($db);
?>

</body>
</html>
