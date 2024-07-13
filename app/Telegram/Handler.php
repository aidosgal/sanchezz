<?php

namespace App\Telegram;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    public function start() : void
    {
        Telegraph::message('Привет')->send();
    }

    protected function handleUnkownCommand(Stringable $text): void
    {
        $this->reply('Неизвестная команда');
    }
}
