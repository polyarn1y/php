<?php
  $name = 'Владимир';
  $age = 19;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные и вывод</title>
</head>
<body>
	<h1>Переменные и вывод</h1>
</body>
</html>
<?php
    echo "Меня зовут: $name<br>";
    echo "Мне $age лет<br>";
    echo gettype($name) ."<br>";
    echo gettype($age) ."<br>";
    unset($name, $age);
?> 