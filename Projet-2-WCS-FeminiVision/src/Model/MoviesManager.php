<?php

namespace App\Model;

class MoviesManager extends AbstractManager
{
    protected const TABLE = 'movies';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    /**
     *
     * @param string $title
     *
     * @return array
     */
    public function selectAllByTitle(string $title)
    {
        $statement = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE title LIKE CONCAT(:title, "%")');
        $statement->bindValue(':title', $title, \PDO::PARAM_STR);
        $statement->execute();

        $fetchAll = $statement->fetchAll();

        if (count($fetchAll) == 1) {
            header('Location: movie/show?id=' . $fetchAll['0']['id']);
        } elseif (count($fetchAll) == 0) {
            header('Location: movie/404');
        } else {
            return $fetchAll;
        }
    }

    /**
     *
     * @param string $id
     *
     * @return array
     */
    public function selectAllByGenre(string $id)
    {
        $statement = $this->pdo->prepare('SELECT m.* FROM ' . $this->table . ' m 
        INNER JOIN movies_genres
        ON m.id = movies_genres.movie_id 
        WHERE genre_id = ' . $id);
        $statement->bindValue(':id', $id, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     *
     * @param int $year
     *
     * @return array
     */
    public function selectAllByYear(int $year)
    {
        if (empty($year)) {
            $year1 = 1895;
            $year2 = 2021;
        } elseif ($year == 1950) {
            $year1 = 1895;
            $year2 = 1950;
        } elseif ($year == 2021) {
            $year1 = 2010;
            $year2 = 2021;
        } else {
            $year1 = ($year - 10);
            $year2 = $year;
        }

        $statement = $this->pdo->prepare('SELECT * FROM ' . $this->table . '  
        WHERE year BETWEEN :year1 AND :year2');
        $statement->bindValue(':year1', $year1, \PDO::PARAM_STR);
        $statement->bindValue(':year2', $year2, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     *
     * @param string $nationality
     *
     * @return array
     */
    public function selectAllByNationality(string $nationality)
    {
        $statement = $this->pdo->prepare('SELECT * FROM ' . $this->table . '  
        WHERE nationality = :nationality');
        $statement->bindValue(':nationality', $nationality, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * @param array $movie
     * @return int
     */
    public function insert(array $movie): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (
            title, year, nationality, duration, synopsis, about, date_add) 
            VALUES (:title, :year, :nationality, :duration, :synopsis, :about, NOW())");
        $statement->bindValue('title', $movie['title'], \PDO::PARAM_STR);
        $statement->bindValue('year', $movie['year'], \PDO::PARAM_STR);
        $statement->bindValue('nationality', $movie['nationality'], \PDO::PARAM_STR);
        $statement->bindValue('duration', $movie['duration'], \PDO::PARAM_STR);
        $statement->bindValue('synopsis', $movie['synopsis'], \PDO::PARAM_STR);
        $statement->bindValue('about', $movie['about'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }


    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);

        return $statement->execute();
    }


    /**
     * @param array $movie
     * @return bool
     */
    public function update(array $movie): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $movie['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $movie['title'], \PDO::PARAM_STR);

        return $statement->execute();
    }
    public function selectOneByIdWithDirectorsAndGenres(int $id)
    {
        $statement = $this->pdo->prepare("SELECT DISTINCT * FROM " . $this->table . " 
            JOIN movies_directors ON movies.id=movies_directors.movie_id 
            JOIN directors ON directors.id=movies_directors.director_id
            JOIN movies_genres ON movies.id=movies_genres.movie_id 
            JOIN genres ON genres.id=movies_genres.genre_id
            WHERE movies.id = :id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
