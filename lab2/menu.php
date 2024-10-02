<?php
$leftMenu = [
    ['link' => 'О нас', 'href' => 'about.php'],
    ['link' => 'Контакты', 'href' => 'contact.php'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => 'calc.php']
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню</title>
	<style>
		.menu {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
	</style>
</head>
<body>
	<h1>Меню</h1>
	<nav>
    <ul class="menu">
        <?php 
        foreach ($leftMenu as $item) {
            echo "<li><a href='" . $item['href'] . "'>" . $item['link'] . "</a></li>";
        }
        ?>
    </ul>
	</nav>
</body>
</html>