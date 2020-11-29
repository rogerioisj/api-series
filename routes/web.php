<?php

/** @var \Laravel\Lumen\Routing\Router $router */



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/series', 'SeriesController@index');

$router->group(['prefix' => '/api'], function () use ($router) {
    $router->group(['prefix' => '/series'], function () use ($router) {
        $router->get('', 'SeriesController@index');
        $router->post('', 'SeriesController@store');
        $router->get('/{id}', 'SeriesController@show');
        $router->put('/{id}', 'SeriesController@update');
        $router->delete('/{id}', 'SeriesController@destroy');
    });

    $router->group(['prefix' => '/episodes'], function () use ($router) {
        $router->get('', 'EpisodesController@index');
        $router->post('', 'EpisodesController@store');
        $router->get('/{id}', 'EpisodesController@show');
        $router->put('/{id}', 'EpisodesController@update');
        $router->delete('/{id}', 'EpisodesController@destroy');
    });
});
