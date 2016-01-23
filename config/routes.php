<?php
use Cake\Routing\Router;

Router::plugin(
    'Openweathermap',
    ['path' => '/openweathermap'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
