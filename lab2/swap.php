<?php
	declare(strict_types=1);

	$a = 5;
	$b = 8;
	
	/**
	 * Меняет местами значения переменных
	 *
	 * @param  int $arg_1
	 * @param  int $arg_2
	 * @return void
	 */
	function swap(&$arg_1, &$arg_2) {
		$temp = $arg_1;
    $arg_1 = $arg_2;
    $arg_2 = $temp;
	}

	swap($a, $b);
	
	echo "a = $a, b = $b";
?>
