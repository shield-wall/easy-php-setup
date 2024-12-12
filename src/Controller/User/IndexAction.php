<?php

declare(strict_types=1);

namespace App\Controller\User;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class IndexAction
{
    public function __construct(
        private Environment $twig,
        private UserRepository $repository
    ) {
    }

    public function __invoke(): Response
    {
        $users = $this->repository->findAll();

        $template = $this->twig->render(
            'user/index.twig',
            [
                'param1' => 'Php is easy!',
                'users' => $users,
            ]
        );

        return new Response($template);
    }
}
