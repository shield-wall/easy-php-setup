<?php

declare(strict_types=1);

namespace App\Notifier;

use App\Provider\MailerProviderInterface;

final class EmailNotifier implements NotifierInterface
{
    private ?string $email = null;

    public function __construct(private MailerProviderInterface $mailerProvider)
    {
    }

    public function to(string $email): void
    {
        $this->email = $email;
    }

    public function send(string $message): void
    {
        $message = sprintf('You are notifing the user: %s, with the message: %s', $this->email, $message);
        $this->mailerProvider->body($message);
    }
}
