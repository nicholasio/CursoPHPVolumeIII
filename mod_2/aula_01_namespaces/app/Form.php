<?php
namespace app;

use Validator\Form as FormValidator;

class Form {
	protected $validator;

	public function __construct() {
		$this->validator = new FormValidator();
		echo "[DEFAULT] Form";
	}
}