<?php

$email = 'nicholas@iotecnologia.com.br';
if ( filter_var($email, FILTER_VALIDATE_EMAIL) !== false ) {
	echo 'Email válido';
} else {
	echo "Erro! Não continue";
}
/**
 * http://php.net/manual/pt_BR/function.filter-var.php
 * Existe também ótimos componentes para validação um exemplo é o aura/filter
 */