<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SendApplicationController extends AbstractController
{

    const INI = [
        "url" => 'https://gate.whapi.cloud/messages/text',
        'jwt' => 'm62Htr4lupgSBgWW8qvtWGk7UJy5j6hj',
    ];

    #[Route('/send/application', name: 'app_send_application')]
    public function index(): Response
    {
        parse_str($_REQUEST['form'], $formData);

        if (empty($formData['name']) || empty($formData['phone']) || empty($formData['category'])) {
            return new Response(json_encode([
                'result' => false,
                'message' => 'Не все поля указаны.',
            ]));
        }

        $to = $formData['group_name'] == 'washing' ? 'Телефон мойки' : 'Телефон детейлинга';

        $client = new Client();
        $response = $client->request('POST', static::INI['url'], [
            'body' => json_encode([
                'to' => $to,
                'body' => sprintf("Заявка\nИмя:%s\nТелефон:%s\nУслуга:%s.%s", $formData['name'], $formData['phone'], $formData['group_label'], $formData['category']),
                'typing_time' => 0,
            ]),
            'headers' => [
                'accept' => 'application/json',
                'authorization' => sprintf('Bearer %s', static::INI['jwt']),
                'content-type' => 'application/json',
            ],
        ]);

        return new Response(json_encode([
            'result' => $response->getReasonPhrase() == 'OK',
            'message' => $response->getReasonPhrase() == 'OK' ? 'Заявка отправлена' : 'Произошла ошибка. Попробуйте позже, либо свяжитесь с нами в соц. сетях',
        ]));
    }

}
