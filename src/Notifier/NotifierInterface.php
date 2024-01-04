<?php

declare(strict_types=1);

namespace App\Notifier;

interface NotifierInterface
{
    public function send(string $message): void;
}
