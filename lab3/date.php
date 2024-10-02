<?php
declare(strict_types=1);
$now = time();
$birthday = mktime(0, 0, 0, 10, 16, 2004);
$currentDate = getdate();
$hour = $currentDate['hours'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	setlocale(LC_TIME, 'ru_RU.UTF-8');

    if ($hour >= 0 && $hour < 6) {
        $welcome = 'Доброй ночи';
    } elseif ($hour >= 6 && $hour < 12) {
        $welcome = 'Доброе утро';
    } elseif ($hour >= 12 && $hour < 18) {
        $welcome = 'Добрый день';
    } elseif ($hour >= 18 && $hour < 24) {
        $welcome = 'Добрый вечер';
    } else {
        $welcome = 'Доброй ночи';
    }
    echo $welcome . '<br>';
    
    $fmt = new IntlDateFormatter(
    'ru_RU', 
    IntlDateFormatter::LONG, 
    IntlDateFormatter::NONE, 
    'Europe/Moscow'
    );
    $fmt->setPattern("Сегодня d MMMM yyyy года, EEEE HH:mm:ss");
    echo $fmt->format($now) . '<br>';

    echo 'До моего дня рождения осталось: ';
    $currentYear = $currentDate['year'];
    if ($now > mktime(0, 0, 0, 10, 16, $currentYear)) {
        $birthday = mktime(0, 0, 0, 10, 16, $currentYear + 1);
    } else {
        $birthday = mktime(0, 0, 0, 10, 16, $currentYear);
    }
    $timeDiff = $birthday - $now; // Разница в секундах
    
    $days = floor($timeDiff / (60 * 60 * 24));
    $hours = floor(($timeDiff % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($timeDiff % (60 * 60)) / 60);
    $seconds = $timeDiff % 60;
    echo "{$days} дней, {$hours} часов, {$minutes} минут, и {$seconds} секунд.";
	?>
</body>
</html>