<?php
declare(strict_types=1);
    /**
     * Отрисовывает меню на основе переданного массива и режима отображения.
     *
     * @param array $menu Массив, описывающий структуру меню.
     * @param bool $vertical Режим отображения меню (true - вертикально, false - горизонтально).
     * @return void
     */
function getMenu(array $menu, bool $vertical = true) {
    if(!is_array($menu)) {
        throw new Exception("Неправильно передан массив меню");        
    }
    echo ($vertical) ? "<ul class='menu vertical'>" : "<ul class='menu'>";
    foreach ($menu as $item) {
        echo "<li><a href='" . $item['href'] . "'>" . $item['link'] . "</a></li>";
    }
    echo "</ul>";

}
	
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
			margin: 15px 0 15px 0;	
			padding: 0;
		}

		.vertical li {
			display: inline;
			padding: 5px
		}
	</style>
</head>
<body>
	<h1>Меню</h1>
	<?php
	getMenu($leftMenu);
	getMenu($leftMenu, false);
	?> 
</body>
</html>