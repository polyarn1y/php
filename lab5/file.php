<?php
define("FILE_NAME", "users.txt");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!empty(trim($_POST['fname'])) && !empty(trim($_POST['lname']))) {
      $fname = htmlspecialchars(trim($_POST['fname']));
      $lname = htmlspecialchars(trim($_POST['lname']));
      $data = "$fname $lname\n";
      file_put_contents(FILE_NAME, $data, FILE_APPEND | LOCK_EX);
      header("Location: " . $_SERVER['PHP_SELF']);
      exit;
  }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">

Имя: <input type="text" name="fname"><br>
Фамилия: <input type="text" name="lname"><br>

<br>

<input type="submit" value="Отправить!">

</form>

<?php
if (file_exists(FILE_NAME)) {
    echo "<hr>";
    $lines = file(FILE_NAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $index => $line) {
        echo "<pre>" . ($index + 1) . ' ' . htmlspecialchars($line) . "</pre>";
    }
    
    echo "<br>Размер файла: " . filesize(FILE_NAME) . " байт.";
}
?>

</body>
</html>
