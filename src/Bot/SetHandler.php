<?php

namespace Bot;

use Raines\Serverless\Context;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

/**
 * Class ReplyHandler
 * @package Bot
 */
class SetHandler extends AbstractHandler
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

            // Set webhook
            $result = $telegram->setWebhook(
                $this->getContainer()->getParameter('hook_url')
            );
            if ($result->isOk()) {

                return [
                    'statusCode' => 200,
                    'body' => $result->getDescription(),
                ];
            }
        } catch (TelegramException $e) {

            return [
                'statusCode' => 500,
                'body' => $e->getMessage(),
            ];
        }

        return [
            'statusCode' => 404,
            'body' => 'Not found',
        ];
    }
}
