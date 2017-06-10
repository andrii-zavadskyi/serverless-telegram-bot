<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class SpeakersCornerCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'speakersCorner';

    /**
     * @var string
     */
    protected $description = 'Speakers\' Corner';

    /**
     * @var string
     */
    protected $usage = '/speakersCorner';

    /**
     * @var string
     */
    protected $version = '0.0.1';

    /**
     * @return \Longman\TelegramBot\Entities\ServerResponse
     */
    public function execute()
    {
        $text =  '<b>09:00–10:30</b> Registration & morning tea/coffee' .
            PHP_EOL . '<b>10:30–10:40</b> Opening ceremony' .
            PHP_EOL . '<b>10:40–11:20</b> Дмитрий Немеш, Андрей Ткаченко' .
            PHP_EOL . '<b>11:20–11:50</b> Coffee-break #1' .
            PHP_EOL . '<b>11:50–12:30</b> Zeev Suraski, Łukasz Szymański' .
            PHP_EOL . '<b>12:30–12:40</b> Break' .
            PHP_EOL . '<b>12:40–13:20</b> Marco Pivetta, Mariusz Gil' .
            PHP_EOL . '<b>13:20–14:30</b> Lunch' .
            PHP_EOL . '<b>14:30–15:10</b> Николай Паламарчук, Андрей Завадский, Дмитрий Семенов' .
            PHP_EOL . '<b>15:10–15:20</b> Break' .
            PHP_EOL . '<b>15:20–16:00</b> Дмитрий Науменко, Михаил Боднарчук' .
            PHP_EOL . '<b>16:00–16:10</b> Break' .
            PHP_EOL . '<b>16:10–16:50</b> Алексей Петров, Сергей Протько, Кирилл Латыш' .
            PHP_EOL . '<b>16:50–17:20</b> Coffee-break #2' .
            PHP_EOL . '<b>17:20–18:00</b> <a href="https://frameworksdays.com/event/php-fwdays-17/review/the-php-story-and-beyond">The PHP 7 Story, and beyond</a> Zeev Suraski [eng] (Zend Technologies)' .
            PHP_EOL . '<b>18:00–18:20</b> Prize drawing from partners' .
            PHP_EOL . '<b>18:20–18:30</b> Closing ceremony & family photo' .
            PHP_EOL . '<b>18:30–21:00</b> AfterParty';

        $data = [
            'chat_id'    => $this->getMessage()->getChat()->getId(),
            'text'       => $text,
            'parse_mode' => 'HTML',
        ];

        return Request::sendMessage($data);
    }
}
