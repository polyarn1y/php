<?php
    define('CONSTANT', 'Hello world');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы</title>
</head>
<body>
	<h1>Константы</h1>
	<?php
        if (defined('CONSTANT')) {
            echo 'Значение константы: ' . CONSTANT . '<br>';
        } else {
            echo 'Константа не определена.<br>';
        }
    
        // Задание 3
        echo 'Текущая версия PHP: ' . PHP_VERSION . '<br>';
        echo 'Директория скрипта: ' . __DIR__ . '<br>';
	?>
</body>
</html>