<?php

declare(strict_types=1);

$login = ' User ';

$password = 'megaP@ssw0rd';

$name = 'иван';

$email = 'ivan@petrov.ru';

$code = '<?=$login?>';

?>

<!doctype html>

<html>

<head>

	<meta charset="utf-8">

	<title>Использование функций обработки строк</title>

</head>

<body>



<?php

    echo strtolower(trim($login)) . '<br>';

    

     /**

	 * Проверяет пароль на валидность

	 *

	 * @param string $password

	 * @return boolean

	 */

    function isPasswordValid($password) {

        if (strlen($password) < 8) {

            return false;

        } 

        if (preg_match('/[A-Z]/', $password) === 0) {

            return false;

        } 

        if (preg_match('/[0-9]/', $password) === 0) {

        return false;

        }

    return true;

    }

    echo isPasswordValid($password) ? "Пароль соответствует требованиям" : "Пароль не соответствует требованиям";

	echo '<br>';

	

    echo mb_convert_case($name, MB_CASE_TITLE, "UTF-8");

    echo '<br>';

    

    echo filter_var($email, FILTER_VALIDATE_EMAIL) ? "Почта валидная" : "Почта не валидная";

    echo '<br>';

    

    echo htmlspecialchars($code, ENT_QUOTES, 'UTF-8');

?>

</body>

</html>
