<?php

namespace App\Telegram;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;

class Handler extends WebhookHandler
{
    public function start() : void
    {
        Telegraph::message('Привет')->send();
    }
}
