
<?php

/**
 * This file is included into the index.php, But we should use composer autoload insteadof.
 **/
use App\Controller\User;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

/**
 * In case you want to add a new action, like add user, you just need to define a new Route with your new action class ;)
 **/
$route = new Route('/', ['_controller' => User\IndexAction::class]);
$routes->add('user_all', $route);
