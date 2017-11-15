<?php

namespace Riczescaran\LaravelLineBot;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class Line
{
    private $bot;
    private $client;

    public function __construct()
    {
        $this->client = new CurlHTTPClient(config('line-bot.line_token'));
        $this->bot = new LINEBot($this->client, ['channelSecret' => config('line-bot.line_secret')]);
    }

    public function replyText($replyToken, $message)
    {
        return $this->bot->replyText($replyToken, $message);
    }

    public function pushMessage($userId, $message)
    {
        return $this->bot->pushMessage($userId, new TextMessageBuilder($message));
    }

    public function getProfile($userId)
    {
        if ($this->bot->getProfile($userId)->isSucceeded()) {
            return $this->bot->getProfile($userId);
        }
    }
}
