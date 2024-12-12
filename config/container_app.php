<?php

/**
 * All classes here could use autowiring and this file won't be necessary
 *
 * Because PHP-DI knows how to inject it for you
 *
 * But well in this file you add injections related with your app (I mean things from "src")
 **/
use App\Controller\User;
use App\Repository\UserRepository;
use Twig\Environment;

return [
  UserRepository::class => fn (PDO $pdo) => new UserRepository($pdo),
  User\IndexAction::class => fn (Environment $twig, UserRepository $repository) => new User\IndexAction($twig, $repository),
];
