<?php
// http://php.net/manual/pt_BR/class.closure.php
$myname = 'Andre';

$fn = function($name) use ($myname) {
	return '[' . $myname . '] Hello ' . $name . "<br />";
};

echo $fn('Nicholas');