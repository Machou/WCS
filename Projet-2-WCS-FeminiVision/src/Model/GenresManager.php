<?php

namespace App\Model;

class GenresManager extends AbstractManager
{
    const TABLE = 'genres';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectAllByMovieId(int $movieId)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table
        JOIN movies_genres ON  movies_genres.genre_id=genres.id
        WHERE movies_genres.movie_id = :id");
        $statement->bindValue('id', $movieId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function insert(array $genres): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $genres['name'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
