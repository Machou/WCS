<?php

namespace App\Model;

class MoviesDirectorsManager extends AbstractManager
{
    const TABLE = 'movies_directors';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insert($movieId, $directorId): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (`movie_id`, `director_id`) VALUES (:movieId, :directorId)");
        $statement->bindValue('movieId', $movieId, \PDO::PARAM_INT);
        $statement->bindValue('directorId', $directorId, \PDO::PARAM_INT);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
