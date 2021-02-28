<?php

/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;

/**
 *
 */
class CupcakeManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'cupcake';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param array $cupcake
     * @return int
     */
    public function insert(array $cupcake): int
    {
        // prepared request
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE .
                " (`name`, `color1`, `color2`, `color3`, `accessory_id`, `created_at`) VALUES" .
                " (:name, :color1, :color2, :color3, :accessory_id, NOW())"
        );
        $statement->bindValue('name', $cupcake['name'], \PDO::PARAM_STR);
        $statement->bindValue('color1', $cupcake['color1'], \PDO::PARAM_STR);
        $statement->bindValue('color2', $cupcake['color2'], \PDO::PARAM_STR);
        $statement->bindValue('color3', $cupcake['color3'], \PDO::PARAM_STR);
        $statement->bindValue('accessory_id', $cupcake['accessory_id'], \PDO::PARAM_INT);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function selectAllWithAccessory(): array
    {
        return $this->pdo->query(
            'SELECT cupcake.id, cupcake.name, color1, color2, color3, url FROM ' .
                self::TABLE .
                ' JOIN accessory ON accessory.id=cupcake.accessory_id' .
                ' ORDER BY cupcake.id DESC'
        )->fetchAll();
    }

    public function selectOneByIdWithAccessory(int $id): array
    {
        $statement = $this->pdo->prepare(
            'SELECT cupcake.id, cupcake.name, color1, color2, color3, url FROM ' .
                self::TABLE .
                ' JOIN accessory ON accessory.id=cupcake.accessory_id' .
                ' WHERE cupcake.id=:id'
        );
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
