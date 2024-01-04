<?php

// I am using this file to keep injections for dependencies.
use DI\Container;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

return [
    /**
     * I am using a built in php class to connect on database
     * But most of the projects gonna use some lib to handle this for you like DoctrineORM or Eloquent.
     *
     * Note: It is possible to use doctrine in vanilla php, then if you want, you can replace it ;)
     * **/
    PDO::class => function (Container $container) {
        return new PDO(
            sprintf(
                "%s:host=%s;dbname=%s",
                $container->get('database.type'),
                $container->get('database.host'),
                $container->get('database.dbname'),
            ),
            $container->get('database.username'),
            $container->get('database.password'),
        );
    },

    /**
     * Defining injections for twig template.
     *
     * The most famus are twig and blade
     * **/
    FilesystemLoader::class => fn (Container $container) => new FilesystemLoader($container->get('twig.template_path')),
    Environment::class => function (FilesystemLoader $fileSystem, Container $container) {
        return new Environment(
            $fileSystem,
            [$container->get('twig.cache_path'), $container->get('twig.debug')]
        );
    },
];
