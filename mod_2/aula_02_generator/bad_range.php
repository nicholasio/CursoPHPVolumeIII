<?php

function my_range( $len ) {
	$numbers = [];

	for($i = 0; $i < $len; $i++ ) {
		$numbers[] = $i;
	}

	return $numbers;
}

$my_range = my_range(10000);

foreach($my_range as $iter) {
	echo $iter . PHP_EOL;
}

echo "<br /> Mem: " . memory_get_usage() / pow(2,20). "MB <br/>";