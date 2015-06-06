<?php
/**
 * O PHP 5.6 introduziu as Variadic Functions pelo operador ...
 * Antes precisávamos da função func_get_args()
 */
function sum($echo = false, ...$params) {
    $sum = array_sum($params);

    if ( $echo ) echo $sum . "<br />";

    return $sum;
}

sum(true, 10);
sum(true, 10,20);
sum(true, 10,20,30);
sum(true, 10,20,30,40);

//O operador ... também faz o inverso, comum em outras linguagens

function add($a, $b, $c){
	return $a + $b + $c;
}

$values = [2,3];
echo add(1, ...$values);
