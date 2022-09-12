<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        if ($this->isGranted('ROLE_USER') == true) {
            return $this->redirectToRoute('map');
        }

        return $this->render('home/index.html.twig');
    }
    /**
     * @Route("/legals", name="legals")
     */
    public function legals(): Response
    {
        return $this->render('home/legals.html.twig');
    }
}
