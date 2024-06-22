<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Entity\User;
use App\Form\ContactDTOType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route("/", name: "home")]
    function index(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response {
/*        $user = new User();
        $user->setEmail('jonathan.lucea@gmail.com')
            ->setUsername('JLucea')
            ->setPassword($hasher->hashPassword($user, 'Nathan2018!'))
        ->setRoles([]);
        $em->persist($user);
        $em->flush();*/
        return $this->render('home/index.html.twig');
    }
}
