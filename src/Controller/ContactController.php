<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactDTOType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route("/contact", name: "contact")]
    function contact(
        Request $request,
        MailerInterface $mailer
    ): Response
    {
        $data = new ContactDTO();
        $form = $this->createForm(ContactDTOType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $mail = (new TemplatedEmail())
                    ->from($data->email)
                    ->to($data->service)
                    ->subject('Demande de contact')
                    ->htmlTemplate('mail/contact.html.twig')
                    ->context(['data' => $data]);
                $mailer->send($mail);
                $this->addFlash('success', 'Votre email a bien été envoyé');
                return $this->redirectToRoute('contact');
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('danger', 'Impossible d\'envoyer votre email');
            }
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form
        ]);
    }
}
