<?php

namespace App\Controller;

use Faker;
use App\Entity\Program;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index():  Response
    {
        $programs = $this->getDoctrine()
        ->getRepository(Program::class)
        ->findBy(
            [],                 // $where
            ['id' => 'desc'],   // $orderBy
            3,                  // $limit
            0                   // $offset
          );

        $faker = Faker\Factory::create('fr_FR');
        $faker->seed(75098);

        return $this->render('_index.html.twig', [
            'website' => 'Wild Séries',
            'program' => $programs,
            'text' => $faker->realText(),
        ]);
    }

    public function navbarTop(CategoryRepository $categoryRepository): Response
    {
        return $this->render('_navbartop.html.twig', [
            'categories' => $categoryRepository->findBy([], ['name' => 'asc'])
        ]);
    }
}