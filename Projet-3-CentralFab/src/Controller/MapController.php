<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\FablabRepository;
use App\Entity\Fablab;
use maxh\Nominatim\Nominatim;

/**
 * @Route("/map")
*/
class MapController extends AbstractController
{
    /**
     * @Route("/", name="map")
     */
    public function index(): Response
    {
        if ($this->isGranted('ROLE_USER') == false) {
            return $this->redirectToRoute('home');
        }

        $fablabs = $this->getDoctrine()
             ->getRepository(Fablab::class)
             ->findAll();

        if (!$fablabs) {
            throw $this->createNotFoundException(
                'No Fablab found in Falab\'s table.'
            );
        }

        $url = 'http://nominatim.openstreetmap.org/';
        $nominatim = new Nominatim($url);

        $data = [];
        $count = 0;
        foreach ($fablabs as $address) {
            $search = $nominatim->newSearch();
            $mapAddress = $search->query('' . $address->getAddress() . '');
            $result = $nominatim->find($mapAddress);
            if (count($result) > 0) {
                $data[] = [$result[0]];
            }
            $data[$count][1] = $fablabs[$count];
            $count++;
        }
        return $this->render('map/index.html.twig', [
            'cities' => $fablabs,
            'maps' => $data,
        ]);
    }
}
