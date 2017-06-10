<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;

/**
 * Class ScheduleCommand
 * @package Longman\TelegramBot\Commands\SystemCommands
 */
class SpeakersCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'speakers';

    /**
     * @var string
     */
    protected $description = 'Докладчики';

    /**
     * @var string
     */
    protected $usage = '/speakers';

    /**
     * @var string
     */
    protected $version = '0.0.1';

    /**
     * @return \Longman\TelegramBot\Entities\ServerResponse
     */
    public function execute()
    {
        $keyboard = new Keyboard(
            ['Zeev Suraski', 'Алексей Петров'],
            ['Николай Паламарчук', 'Marco "Ocramius" Pivetta'],
            ['Дмитрий Науменко', 'Сергей Протько'],
            ['Mariusz Gil', 'Łukasz Szymański'],
            ['Дмитрий Немеш', 'Андрей Завадский'],
            ['Дмитрий Семенов', 'Андрей Ткаченко'],
            ['Кирилл Латыш']
        );

        //Return a random keyboard.
        $keyboard->setResizeKeyboard(true)
            ->setOneTimeKeyboard(true)
            ->setSelective(false);

        $chat_id = $this->getMessage()->getChat()->getId();
        $data    = [
            'chat_id'      => $chat_id,
            'text'         => 'Докладчики:',
            'reply_markup' => $keyboard,
        ];

        return Request::sendMessage($data);
    }
}
