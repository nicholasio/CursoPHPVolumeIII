<?php

const ONE = 1;
const TWO = ONE * 2; //As constantes podem ser inicializadas com expressões

class C {
    const THREE = TWO + 1;
    const ONE_THIRD = ONE / self::THREE;
    const SENTENCE = 'The value of THREE is '. self::THREE;

    //Os argumentos default das funções/métodos também
    public function f($a = ONE + self::THREE) {
        return $a;
    }
}

// Essa sintaxe foi introduzida no PHP 5.5
echo (new C)->f()."\n";
echo C::SENTENCE;

echo '<br />';
//Também podemos definir um array constante
const ARR = ['a', 'b'];

echo ARR[0];


