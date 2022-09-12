<?php

use App\Controller\HomeController;
use App\Controller\MovieController;

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $urlPath) {
    echo (new HomeController())->index();
} elseif ('/movies' === $urlPath) {
    if (isset($_GET['title'])) {
        if (!empty($_GET['title'])) {
            $title = $_GET['title'];
            echo (new MovieController())->listByTitle($title);
        } else {
            echo (new MovieController())->notFound();
        }
    } elseif (isset($_GET['genre_id']) && !empty($_GET['genre_id'])) {
        $genreId = $_GET['genre_id'];
        echo (new MovieController())->listByGenre($genreId);
    } elseif (isset($_GET['year']) && !empty($_GET['year'])) {
        $year = $_GET['year'];
        echo (new MovieController())->listByYear($year);
    } elseif (isset($_GET['nationality']) && !empty($_GET['nationality'])) {
        $nationality = $_GET['nationality'];
        $nationalitys = ['europe', 'afrique', 'asie', 'amerique', 'oceanie'];

        if (in_array($nationality, $nationalitys)) {
            $nationality = $_GET['nationality'];
            echo (new MovieController())->listByNationality($nationality);
        } else {
            header('HTTP/1.1 404 Not Found');
        }
    } else {
        $title = '%';
    }
} elseif ('/movie/show' === $urlPath && isset($_GET['id'])) {
    echo (new MovieController())->read($_GET['id']);
} elseif ('/movie/add' === $urlPath) {
    echo (new MovieController())->add();
} elseif ('/movie/404' === $urlPath) {
    echo (new MovieController())->notFound();
} else {
    header('HTTP/1.1 404 Not Found');
}
