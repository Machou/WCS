<?php

namespace App\Service;

use App\Entity\Boat;
use App\Entity\Tile;
use App\Repository\TileRepository;

class MapManager
{
    private TileRepository $tileRepository;

    public function __construct(TileRepository $tileRepository)
    {
        $this->tileRepository = $tileRepository;
    }

    public function tileExists(int $coordX, int $coordY): bool
    {
        $tile = $this->tileRepository->findOneBy([
            'coordX' => $coordX,
            'coordY' => $coordY,
        ]);

        return $tile != null;
    }

    public function getRandomIsland(): Tile
    {
        $islands = $this->tileRepository->findBy([
            'type' => 'island'
        ]);

        $islandKey = array_rand($islands, 1);

        return $islands[$islandKey];
    }

    public function checkTreasure(Boat $boat): bool
    {
        $currentTile = $this->tileRepository->findOneBy([
            'coordX' => $boat->getCoordX(),
            'coordY' => $boat->getCoordY(),
        ]);

        return $currentTile->getHasTreasure();
    }
}
