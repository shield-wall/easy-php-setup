
<?php

use App\Controller\UserController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$route = new Route(
    '/',
    ['_controller' => UserController::class, '_method' => 'getAll']
);
$routes->add('user_all', $route);
