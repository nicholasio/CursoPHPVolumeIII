<?php
/**
 * Esta é uma classe que implementa um leitor CSV usando Generator
 * e consumindo menos memória
 */
class CSVReaderGenerator {

	protected $file;

	public function __construct($file) {
		$this->file = fopen($file, 'r');

		if ( $this->file === false ) {
			throw new Exception();
		}
	}

	public function read() {
		while( feof($this->file) == false ) {
			yield fgetcsv($this->file);
		}

		fclose($this->file);
	}
}

$csvreader = new CSVReaderGenerator( 'sample.csv' );

echo '<pre>';
foreach( $csvreader->read() as $line ) {
	/*print_r($line);
	echo PHP_EOL;*/
}
echo '</pre>';

echo "<br /> Mem: " . memory_get_usage() / pow(2,20). "MB <br/>";