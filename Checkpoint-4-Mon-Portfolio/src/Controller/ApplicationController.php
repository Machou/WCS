<?php

namespace App\Controller;

use App\Entity\Projets;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApplicationController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index():  Response
    {
        $projets = $this->getDoctrine()
        ->getRepository(Projets::class)
        ->findBy(
            [],                 // $where
            ['id' => 'desc'],   // $orderBy
            3,                  // $limit
            0                   // $offset
          );


        return $this->render('_index.html.twig', [
            'website' => 'Portfolio de Charlie',
            'projets' => $projets,
        ]);
    }

    /**
     * @Route("/services", name="services")
     */
    public function services():  Response
    {
        return $this->render('_services.html.twig');
    }
}