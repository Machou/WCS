<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('mail@gmail.com')
                ->subject('Vous avez un courriel !')
                ->text('<p>De : '.$contactFormData['email'].'</p><p>'.$contactFormData['message'].'</p>', 'text/html');
            $mailer->send($message);

            $this->addFlash('success', 'Votre message a été envoyé.');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
}