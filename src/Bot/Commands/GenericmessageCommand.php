<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Request;

class GenericmessageCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'Generic';

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
        $message = $this->getMessage();
        $answer = 'Извените, я не понимаю Вас';

        $catalog = [
            'Zeev Suraski' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/zeev_120.jpg',
                'message' => 'CTO & Co-founder of Zend' . PHP_EOL . 'Co-Architect of PHP',
            ],
            'Алексей Петров' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/petrov.png',
                'message' => 'Co-organizer of Kiev PHP User Group' .
                    PHP_EOL .'Systems Architect at Skelia Ukraine / ETWater Systems' .
                    PHP_EOL . 'Active PHP community member',
            ],
            'Николай Паламарчук' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/Palamarchuk_120.jpg',
                'message' => 'Разработчик в Upwork (PHP infrastructure team)' .
                    PHP_EOL . 'Более 10 лет опыта в web development',
            ],
            'Marco "Ocramius" Pivetta' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/pivetta.png',
                'message' => 'A software consultant at Roave.' .
                    PHP_EOL . 'With over a decade of experience with PHP, he is part of the Zend Framework CR team, Doctrine core team, and is also active in the community as a mentor and supporter.' .
                    PHP_EOL . 'When not coding for work, he usually hacks together new concepts and open source libraries, or simply provides Q&A on IRC',
            ],
            'Дмитрий Науменко' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/Naumenko_120.jpg',
                'message' => 'Веб-разработчик из Киева' .
                    PHP_EOL .'Core разработчик PHP-фреймворка Yii' .
                    PHP_EOL . 'Активный член Open Source сообщества',
            ],
            'Сергей Протько' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/protko.png',
                'message' => 'PHP Tech Lead в IntellectSoft' .
                    PHP_EOL . 'Full-stack разработчик с 8-ми летним опытом' .
                    PHP_EOL . 'В свободное время занимаюсь самообразованием, стараюсь помогать в этом другим' .
                    PHP_EOL . 'Люблю сложные задачи и тяжелую музыку',
            ],
            'Mariusz Gil' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/Mariusz_120_PHP.png',
                'message' => 'Software architect, trainer' .
                    PHP_EOL . 'Owner of Source Ministry, PHP focused development, training and consultancy firm' .
                    PHP_EOL . 'Event and conference organizer' .
                    PHP_EOL . 'Core member of PHPers community',
            ],
            'Łukasz Szymański' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/szymansky_120.jpg',
                'message' => 'Development Team Lead at OLX' .
                    PHP_EOL . 'Aware of the dynamic character of the business' .
                    PHP_EOL . 'Not afraid to put updates and new solutions to a test and make use of them when needed',
            ],
            'Дмитрий Немеш' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/nemesh_site.png',
                'message' => 'CTO в компании Lalafo' .
                    PHP_EOL . 'Более 7 лет опыта с PHP\Java\Node.js' .
                    PHP_EOL . 'Волонтер в GeekHub',
            ],
            'Андрей Завадский' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/Zavadskii_120.jpg',
                'message' => 'Менеджер отдела PHP разработки в Levi9' .
                    PHP_EOL . 'Web разработчик с 10-летним опытом',
            ],
            'Дмитрий Семенов' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/Semenov_120.jpg',
                'message' => 'Software Engineer в Upwork Enterprise' .
                    PHP_EOL . 'Symfony lover' .
                    PHP_EOL . 'Десять лет работаю с PHP' .
                    PHP_EOL . 'За это время работал над разными приложениями - онлайн мморпг, системы анализа трафик, е-комерц платформы.',
            ],
            'Андрей Ткаченко' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/Tkachenko_140.jpg',
                'message' => 'Founder of appstor.io' .
                    PHP_EOL . '12 лет веб разработки в продуктовых компаниях' .
                    PHP_EOL . 'Laravel lover' .
                    PHP_EOL . 'Последователь getting real подхода' . PHP_EOL . 'Серийный предприниматель',
            ],
            'Кирилл Латыш' => [
                'photo_url' => 'https://frameworksdays.com/uploads/speakers/Kirill_Latysh_120.jpg',
                'message' => 'Founder and CEO Livezone' .
                    PHP_EOL . 'ex. CTO Genesis Media' .
                    PHP_EOL . 'Laravel lover' .
                    PHP_EOL . '10 years with PHP' .
                    PHP_EOL . 'high load expert',
            ],
            'докладчики' => [
                'command' => 'speakers'
            ],
            'speakers' => [
                'command' => 'speakers'
            ],
            'расписание' => [
                'command' => 'schedule'
            ],
            'schedule' => [
                'command' => 'schedule'
            ],
            'трек а' => [
                'command' => 'trackA'
            ],
            'track a' => [
                'command' => 'trackA'
            ],
            'трек б' => [
                'command' => 'trackB'
            ],
            'track b' => [
                'command' => 'trackB'
            ],
            'speakers\' corner' => [
                'command' => 'speakersCorner'
            ],
            'speakers corner' => [
                'command' => 'speakersCorner'
            ],
            'help' => [
                'command' => 'help'
            ],
        ];

        foreach ($catalog as $term => $reply) {
            if (mb_stripos($term, $message->getText()) !== false) {
                if (array_key_exists('command', $reply)) {

                    return $this->getTelegram()->executeCommand($reply['command']);
                } else {
                    $answer = '*' . $term . '*:' . PHP_EOL . $reply['message'];

                    Request::sendPhoto([
                        'chat_id' => $message->getChat()->getId(),
                        'photo' => $reply['photo_url']
                    ]);
                }
            }
        }

        $data = [
            'chat_id'    => $message->getChat()->getId(),
            'text'       => $answer,
            'parse_mode' => 'Markdown'
        ];

        return Request::sendMessage($data);
    }
}
