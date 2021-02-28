<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tile;
use App\Repository\BoatRepository;
use App\Repository\TileRepository;
use App\Service\MapManager;
use Doctrine\ORM\EntityManagerInterface;

class MapController extends AbstractController
{
    /**
     * @Route("/map", name="map")
     */
    public function displayMap(BoatRepository $boatRepository, MapManager $mapManager): Response
    {
        $em = $this->getDoctrine()->getManager();
        $tiles = $em->getRepository(Tile::class)->findAll();

        foreach ($tiles as $tile) {
            $map[$tile->getCoordX()][$tile->getCoordY()] = $tile;
        }

        $boat = $boatRepository->findOneBy([]);

        if ($mapManager->checkTreasure($boat)) {
            $this->addFlash(
                'success',
                'you found the treasure !!!',
            );
        }

        return $this->render('map/index.html.twig', [
            'map'  => $map ?? [],
            'boat' => $boat,
        ]);
    }

    /**
     * @Route("/start", name="start")
     */
    public function start(BoatRepository $boatRepository, EntityManagerInterface $em, MapManager $mapManager, TileRepository $tileRepository): Response
    {
        $boat = $boatRepository->findOneBy([]);
        $boat->setCoordX(0);
        $boat->setCoordY(0);

        $previousTreasureIsland = $tileRepository->findOneBy([
            'hasTreasure' => true
        ]);

        if ($previousTreasureIsland != null) {
            $previousTreasureIsland->setHasTreasure(false);
        }

        $treasureIsland = $mapManager->getRandomIsland();
        $treasureIsland->setHasTreasure(true);

        $em->flush();

        return $this->redirectToRoute('map');
    }
}
