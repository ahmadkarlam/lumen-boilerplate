<?php

/** @var $router \Laravel\Lumen\Routing\Router */

$router->group(['prefix' => '/faq'], function () use ($router) {
    $router->get('/', 'FaqController@index');
    $router->post('/', 'FaqController@store');
});
