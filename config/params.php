<?php

/**
 * You define you parameters here.
 *
 * Note: I defined sensitive data here just to make this simple.
 * But those informations shouldn't be commited, an easy alternative is use env vars
 **/
return [
  'database.type' => 'mysql',
  'database.host' => 'db',
  'database.dbname' => 'easy-php-setup',
  'database.username' => 'root',
  'database.password' => '123456',

  'twig.template_path' => dirname(__DIR__) . '/resources/view',
  'twig.cache_path' => dirname(__DIR__) . '/var/cache/twig',
  'twig.debug' => true,

];
