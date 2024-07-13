<?php

namespace App\Telegram;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    public function start() : void
    {
        $chat = $this->chat;

        if ($chat instanceof TelegraphChat) {
            Telegraph::chat($chat)
                ->message('Привет')
                ->send();
        } else {
            $this->reply('Chat not found.');
        }
    }

    protected function handleUnknownCommand(Stringable $text): void
    {
        $this->reply('Неизвестная команда');
    }
}
