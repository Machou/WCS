<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/creation", name="creation")
     */
    public function index(): Response
    {
        return $this->render('creation/index.html.twig', [
            'controller_name' => 'CreationController',
        ]);
    }

    /**
     * @Route("/creation/step2", name="creation_step_2")
     */
    public function makerOrFabManager(): Response
    {
        return $this->render('creation/step2.html.twig', [
            'controller_name' => 'CreationController',
        ]);
    }
}
