<?php

namespace Bot;

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;
use Raines\Serverless\Context;
use Raines\Serverless\Handler;

/**
 * Class ReplyHandler
 * @package Bot
 */
class HookHandler extends AbstractHandler
{
    /**
     * {@inheritdoc}
     */
    public function handle(array $event, Context $context)
    {
        $logger = $context->getLogger();
        $logger->notice('Got event', $event);

        try {
            // Create Telegram API object
            $telegram = new Telegram(
                $this->getContainer()->getParameter('api_key'),
                $this->getContainer()->getParameter('bot_name')
            );
            $telegram->setCustomInput($event['body']);
            $telegram->addCommandsPath(__DIR__ . '/Commands');
            
            // Handle telegram webhook request
            $telegram->handle();

            return [
                'statusCode' => 200,
                'body' => $telegram->getLastCommandResponse()->__toString(),
            ];
        } catch (TelegramException $e) {

            return [
                'statusCode' => 500,
                'body' => $e->getMessage(),
            ];
        }
    }
}
