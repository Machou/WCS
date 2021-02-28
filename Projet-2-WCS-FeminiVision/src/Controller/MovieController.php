<?php

namespace App\Controller;

use App\Model\MoviesManager;
use App\Model\DirectorsManager;
use App\Model\GenresManager;
use App\Model\MoviesGenresManager;
use App\Model\MoviesDirectorsManager;

class MovieController extends AbstractController
{
  
    public function listByTitle(string $title = '%')
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAllByTitle($title);

        return $this->twig->render('Movie/index.html.twig', ['movies' => $movies]);
    }


    public function listByGenre(string $id)
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAllByGenre($id);

        return $this->twig->render('Movie/index.html.twig', ['movies' => $movies]);
    }


    public function listByYear(int $year)
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAllByYear($year);

        return $this->twig->render('Movie/index.html.twig', ['movies' => $movies]);
    }


    public function listByNationality(string $nationality)
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAllByNationality($nationality);

        return $this->twig->render('Movie/index.html.twig', ['movies' => $movies]);
    }


    public function read(int $id)
    {
        $directorsManager = new DirectorsManager();
        $moviesManager = new MoviesManager();
        $genresManager = new GenresManager();

        $movie = $moviesManager->selectOneById($id);
        $directors = $directorsManager->selectAllByMovieId($id);
        $genres = $genresManager->selectAllByMovieId($id);

        return $this->twig->render('Movie/movie_sheet.html.twig', [
            'movie' => $movie,
            'directors' => $directors,
            'genres' => $genres
        ]);
    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $extensionFile = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $temporaryFile = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];

            $movieManager = new MoviesManager();
            $directorsManager = new DirectorsManager();
            $genresManager = new GenresManager();
            $moviesGenresManager = new MoviesGenresManager();
            $moviesDirectorsManager = new MoviesDirectorsManager();

            $movie = [
                'title' => $_POST['title'],
                'year' => $_POST['release_date'],
                'nationality' => $_POST['pays'],
                'duration' => $_POST['duration'],
                'synopsis' => $_POST['synopsis'],
                'about' => $_POST['a_propos']
            ];
            $directors = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
            ];
            $genres = [
                'name' => $_POST['genre']
            ];

            $movieId = $movieManager->insert($movie);
            $genreId = $genresManager->insert($genres);
            $directorId = $directorsManager->insert($directors);

            $fileName = $movieId . '.' . $extensionFile;
            $uploadFile = __DIR__ . '/../../public/assets/images/movies/' . $fileName;
            move_uploaded_file($temporaryFile, $uploadFile);

            $moviesGenresManager->insert($movieId, $genreId);
            $moviesDirectorsManager->insert($movieId, $directorId);

            header('Location:/');
        }

        return $this->twig->render('Movie/add.html.twig');
    }

    public function notFound()
    {
        return $this->twig->render('Movie/notFound.html.twig');
    }
}
