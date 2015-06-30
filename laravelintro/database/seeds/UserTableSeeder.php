<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

    public function run() {
        User::create( [
            'id' => 1,
            'name' => 'Nícholas André',
            'email'  => 'nicholas@iotecnologia.com.br',
            'password' => Hash::make('123')
        ]);

        User::create( [
            'id' => 2,
            'name' => 'Rosana Moniky',
            'email'  => 'rosana@iotecnologia.com.br',
            'password' => Hash::make('123')
        ]);
    }

}
