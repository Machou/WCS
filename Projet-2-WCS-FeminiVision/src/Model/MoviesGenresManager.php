<?php

namespace App\Model;

class MoviesGenresManager extends AbstractManager
{
    const TABLE = 'movies_genres';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insert($movieId, $genreId): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (`movie_id`, `genre_id`) VALUES (:movieId, :genreId)");
        $statement->bindValue('movieId', $movieId, \PDO::PARAM_INT);
        $statement->bindValue('genreId', $genreId, \PDO::PARAM_INT);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
