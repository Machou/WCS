<?php

namespace App\Controller;

use App\Entity\Mail;
use App\Form\MailType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailController extends AbstractController
{
    /**
     * @Route("/mail", name="mail")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {   $mail = new Mail();
        $form = $this->createForm(MailType::class, $mail);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $contact = [$form->get('mail')->getData(), $form->get('toMail')->getData(), $form->get('subject')->getData(), $form->get('html')->getData()];
            $email = (new Email())
                ->from($contact[0])
                ->to('centralfab-343af0@inbox.mailtrap.io')
                ->subject($contact[2])
                ->html($contact[3]);

            $mailer->send($email);
            return $this->render('mail/send.html.twig');
        }
        return $this->render('mail/index.html.twig',
        [
            'form' => $form->createView()
        ]);
    }
}