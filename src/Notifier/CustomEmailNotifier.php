<?php

declare(strict_types=1);

namespace App\Notifier;

use App\Provider\MailerProviderInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class CustomEmailNotifier extends EmailNotifier
{
    public function __construct(private Session $session, MailerProviderInterface $mailerProvider)
    {
        parent::__construct($mailerProvider);
    }

    public function send(string $message): void
    {
        $email = $this->session->get('user.email');
        $this->to($email);
        parent::send($message);
    }
}
