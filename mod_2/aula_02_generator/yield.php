<?php

function getBooks() {
	yield 'PHP Para quem conhece PHP';
	yield 'PHP Moderno';
	yield 'PHP Pro';
}

echo '<pre>';
foreach( getBooks() as $book ) {
	echo $book . PHP_EOL;
}
echo '</pre>';