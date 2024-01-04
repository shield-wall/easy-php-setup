<?php

/**
 * It is the front controller of easy-php-setup.
 * the webserver (in this case nginx) will pass the request for this index.php file
 *
 * and here I am loading routes and dependency injection
 * that will be responsible to load others files.
 *
 * NOTE: I really recommend you check what every single thing is doing,
 * for you have some idea how others freameworks handle your application.
 **/
require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/route.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

/*
 * This projet is using PHP-DI (https://php-di.org/) to handle dependency injection.
 * But You can switch to other lib if you wish.
 **/
$builder = new DI\ContainerBuilder();

/**
 * on files bellow I am definning the class and their dependencies
 *
 * Note 1: I could make this all in one file, But I preffer to split in multiple files,
 * Then you could see something similar what others frameworks do.
 **/
$builder->addDefinitions(dirname(__DIR__) . '/config/container.php');
$builder->addDefinitions(dirname(__DIR__) . '/config/container_app.php');
$builder->addDefinitions(dirname(__DIR__) . '/config/params.php');

/**
 * Autowiring is a common way to have your dependencies injected,
 * But I preffer to keep it deactivated just for you have the full control how it works.
 * you can see on files above how it is injected, no magic :).
 **/
$builder->useAutowiring(false);

$container = $builder->build();

/**
 * I am using symfony router, because I didn't find other lib that is doing this well.
 * But you can also change this if you want.
 *
 * Note: Shold be good define those things in PHP-DI, But I got some issues :D,
 *    I will give a new try later ;)
 *
 * https://github.com/symfony/routing
 **/
$request = Request::createFromGlobals();
$requestUri = $request->getPathInfo();
$context = new RequestContext();

/**
 * This $routes commes from the includ on top of file.
 *
 * Note: It is not the best approach for this, But for now it is accepble :D
 **/
$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match($requestUri);

/**
 * If you check into the controllers, I am using one class per action.
 * But it is really common you see projects using many actions in one class.
 *
 * as I am using the __invoke method, when I call the controller, it will hit the __invoke method.
 **/
$response = $container->call($parameters['_controller']);
$response->send();
