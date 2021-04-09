<?php
/**
 * Author: J.Namazov
 * email:  <jamwid07@mail.ru>
 * date:   09.04.2021
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HealthController extends AbstractController
{
    #[Route('/health/check', name: 'check', methods: ['GET'])]
    public function iAmAlive(): Response
    {
        return new Response("ok");
    }
}
