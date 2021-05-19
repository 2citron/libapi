<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    $app->post('/users', \App\Action\UserCreateAction::class);

	$app->get('/alcohols', \App\Action\ShowBooksAction::class);

	$app->get('/books/{id}', \App\Action\ShowBooksIDAction::class);

	$app->get('/books/titles/{titre}', \App\Action\ShowBooksTitreAction::class);

	$app->post('/add/book', \App\Action\AddBookAction::class);

	$app->get('/docs/v1', \App\Action\Docs\SwaggerUiAction::class);


};

