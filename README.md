# Telegram Bot PHP Library

PHP Library for [Telegram Bot API](core.telegram.org/bots/api).

## Telegram Bot API

First you must have a Telegram Bot. To do so, [just read the documentation on Telegram website](https://core.telegram.org/bots).

### TL;DR

1. Add [@BotFather](https://telegram.me/botfather) to start conversation.
2. Type `/newbot` and **@BotFather** will ask the name for your bot.
3. Choose a cool name, for example `The Cool Bot` and hit enter.
4. Now choose a username for your bot. It must end in *bot*, for example `CoolBot` or `Cool_Bot`.
5. If succeed, **@BotFather** will give you API key to be used in this library.

## Installation

The easiest way to install is using [Composer](https://getcomposer.org).

```bash
composer require matriphe/telegrambot
```

## Usage

For example, you can use the library like this:

```php
<?php
require('../vendor/autoload.php');

$apikey = '<fill_your_api_key_here>';
$chat_id = '<user_or_group_id>';

$telegram = new \Matriphe\Telegrambot\Telegrambot($apikey);

// Get bot info
$getme = $telegram->getMe();
var_dump($getme);

// Get bot messages received by bot. See user_id from here.
$updates = $telegram->getUpdates();
var_dump($updates);

// Send message to user.
$message = $telegram->sendMessage(['chat_id' => $chat_id, 'text' => 'Today is '.date('Y-m-d H:i:s')]);
var_dump($message);

// Upload file. use fopen function.
$filepath = '/home/matriphe/photo.jpg';
$photo = $telegram->sendPhoto(['chat_id' => 1498275, 'photo' => fopen($filepath, 'rb'), 'caption' => 'The caption goes here!']);
var_dump($photo);
```

## Function List

Based on [Telegram Bot API's method](https://core.telegram.org/bots/api#available-methods).

* getMe()
* sendMessage()
* forwardMessage()
* sendPhoto()
* sendAudio()
* sendDocument()
* sendSticker()
* sendVideo()
* sendLocation()
* sendChatAction()
* getUserProfilePhotos()
* getUpdates()
* setWebhook()

Please read Telegram Bot API's method for details. 