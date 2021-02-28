<?php

namespace App\Model;

class DirectorsManager extends AbstractManager
{
    const TABLE = 'directors';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectAllByMovieId(int $movieId)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table
        JOIN movies_directors ON  movies_directors.director_id=directors.id
        WHERE movies_directors.movie_id = :id");
        $statement->bindValue('id', $movieId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function insert(array $directors): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`firstname`, `lastname`)
        VALUES (:firstname, :lastname)");
        $statement->bindValue('firstname', $directors['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $directors['lastname'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
