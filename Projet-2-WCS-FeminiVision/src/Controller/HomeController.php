<?php

namespace App\Controller;

use App\Model\MoviesManager;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();

        return $this->twig->render('Home/index.html.twig', ['movies' => $movies]);
    }
}
