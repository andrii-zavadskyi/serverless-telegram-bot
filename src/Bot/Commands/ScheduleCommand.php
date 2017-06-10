<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;

/**
 * Class ScheduleCommand
 * @package Longman\TelegramBot\Commands\SystemCommands
 */
class ScheduleCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'schedule';

    /**
     * @var string
     */
    protected $description = 'Расписание';

    /**
     * @var string
     */
    protected $usage = '/schedule';

    /**
     * @var string
     */
    protected $version = '0.0.1';

    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        $keyboard = new Keyboard(
            ['Track A', 'Track B'],
            ['Speakers\' Corner']
        );

        //Return a random keyboard.
        $keyboard->setResizeKeyboard(true)
            ->setOneTimeKeyboard(true)
            ->setSelective(false);

        $chat_id = $this->getMessage()->getChat()->getId();
        $data    = [
            'chat_id'      => $chat_id,
            'text'         => 'Расписание:',
            'reply_markup' => $keyboard,
        ];

        return Request::sendMessage($data);
    }
}
