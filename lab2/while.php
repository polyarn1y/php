<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Цикл while</title>
</head>
<body>
	<h1>Цикл while</h1>
	<?php
        $var = 'HELLO';
        $length = strlen($var);
        $index = 0; // Инициализируем индекс
    
        
        while ($index < $length) {
            echo $var[$index] . '<br>';
            $index++;
        }
	?> 
</body>
</html>