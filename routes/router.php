<?php

use App\Controllers\ServiceController;
use Bramus\Router\Router;

$router = new Router();

// Nơi khai báo các đường dẫn
$router->get('/', function () {
    echo "Base dự thi môn PHP 2";
});

// Nhóm route ta sử dụng mount
$router->mount('/admin', function () use ($router) {
    // Dashboard
    $router->get('/', function () {
        return view('admin.dashboard');
    });

    $router->mount('/services', function () use ($router) {
        $router->get('/', ServiceController::class . '@index');
        $router->get('/create', ServiceController::class . '@create');
        $router->post('/store', ServiceController::class . '@store');
        $router->get('/{id}/edit', ServiceController::class . '@edit');
        $router->get('/{id}/show', ServiceController::class . '@show');
        $router->post('/{id}/update', ServiceController::class . '@update');
        $router->post('/{id}/delete', ServiceController::class . '@destroy');
    });
});


// --------------------------

$router->run();
