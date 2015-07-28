<?php

use Illuminate\Support\Facades\Route;

function setActiveByController($controller, $class = 'active')
{
    $currentRoute = Route::current()->getName();
    $firstRouteName = explode('.', $currentRoute);

    if ( is_array( $firstRouteName ) ) {
        $firstRouteName = $firstRouteName[0];
    }

    echo $controller == $firstRouteName ?  $class : '';
}