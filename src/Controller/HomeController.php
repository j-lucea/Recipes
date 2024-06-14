<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactDTOType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route("/", name: "home")]
    function index(Request $request): Response {
        return $this->render('home/index.html.twig');
    }
}
