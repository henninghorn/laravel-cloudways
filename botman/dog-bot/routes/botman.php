<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('GET_STARTED', function ($bot) {
    $bot->reply('You are getting started!');
});

$botman->hears('sted', function ($bot) {
    // Create attachment
    $attachment = new Location(61.766130, -6.822510);

    // Build message object
    $message = OutgoingMessage::create('This is my text')->withAttachment($attachment);

    // Reply message object
    $bot->reply($message);
});

$botman->hears('vent', function ($bot) {
    $bot->reply('2 sek..');
    $bot->typesAndWaits(5);
    $bot->reply('Klar :)');
});