<?php
declare(strict_types=1);
/**
 * Возвращает таблицу умножения.
 * @param int $cols Количество колонок в таблице. По умолчанию 2.
 * @param int $rows Количество строк в таблице. По умолчанию 2.
 * @param string $color Цвет фона таблицы. По умолчанию белый.
 * @return int Число вызовов функции.
 */
function getTable(int $cols = 2, int $rows = 2, string $color = 'white') {
  static $count = 0;
  ++$count;
  echo "<table>";
  for ($i = 1; $i <= $rows; $i++) {
      echo "<tr>";
      for ($j = 1; $j <= $cols; $j++) {
          if ($i == 1 || $j == 1) {
              echo "<th style='background-color: {$color};'>" . ($i * $j) . "</th>";
          } else {
              echo "<td>" . ($i * $j) . "</td>";
          }
      }
      echo "</tr>";
  }
  echo "</table>";
  return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table {
			border: 2px solid black;
			border-collapse: collapse;
			margin: 15px 0 15px 0;
		}

		th,
		td {
			padding: 10px;
			border: 1px solid black;
		}

		th {
			background-color: yellow;
		}
	</style>
</head>
<body> 
	<h1>Таблица умножения</h1>
	<?php
    getTable(10, 6, 'lightblue');	
    getTable();
    getTable(3);
    getTable(4, 4);
    echo getTable();
	?> 
</body>
</html>