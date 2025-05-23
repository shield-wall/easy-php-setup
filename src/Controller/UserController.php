<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UserController
{
    /**
     * If you gonna create more actions, inject twig into the constructor.
     * and call inside of each action.
     *
     * Note: getAll is an action.
     * */
    public function getAll(Environment $twig): Response
    {
        $repository = new UserRepository();
        $users = $repository->findAll();

        $template = $twig->render(
            'user/index.twig',
            [
                'param1' => 'Php is easy!',
                'users' => $users,
            ]
        );

        return new Response($template);
    }
}
