<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SendApplicationController extends AbstractController
{
    #[Route('/send/application', name: 'app_send_application')]
    public function index(): Response
    {
        //тут логика по отправке смс в тг

        return new Response(json_encode([
            'result' => true,
            'message' => 'Заявка отправлена',
        ]));
    }
}
