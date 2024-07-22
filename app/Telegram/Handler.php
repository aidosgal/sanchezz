<?php

namespace App\Telegram;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Stringable;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Handler extends WebhookHandler
{
    public function start() : void
    {
        $chat = $this->chat;

        if ($chat instanceof TelegraphChat) {
            Telegraph::chat($chat)
                ->message('Добро пожаловать!')
                ->keyboard(Keyboard::make()->buttons([
                    Button::make('Открыть приложение')->webApp('https://srv451534.hstgr.cloud')->requestWriteAccess(true),
                ]))
                ->send();
        } else {
            $this->reply('Чат не найден');
        }
    }

    protected function handleUnknownCommand(Stringable $text): void
    {
        $this->reply('Неизвестная команда');
    }
}
