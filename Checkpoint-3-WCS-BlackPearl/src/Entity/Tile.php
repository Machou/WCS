<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TileRepository")
 */
class Tile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordX;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordY;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $hasTreasure = false;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCoordX(): ?int
    {
        return $this->coordX;
    }

    public function setCoordX(int $coordX): self
    {
        $this->coordX = $coordX;

        return $this;
    }

    public function getCoordY(): ?int
    {
        return $this->coordY;
    }

    public function setCoordY(int $coordY): self
    {
        $this->coordY = $coordY;

        return $this;
    }

    public function getHasTreasure(): ?bool
    {
        return $this->hasTreasure;
    }

    public function setHasTreasure(bool $hasTreasure): self
    {
        $this->hasTreasure = $hasTreasure;

        return $this;
    }
}
