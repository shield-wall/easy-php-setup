<?php

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/route.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/resources/view');
$twig = new \Twig\Environment($loader, [
    'cache' => dirname(__DIR__) . '/var/cache/twig',
    'debug' => true
]);

//https://github.com/symfony/routing
$request = Request::createFromGlobals();
$requestUri = $request->getPathInfo();

$context = new RequestContext();

$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match($requestUri);
$response = call_user_func_array(
    [ new $parameters['_controller'](), $parameters['_method'] ],
    [$twig],
);
$response->send();
