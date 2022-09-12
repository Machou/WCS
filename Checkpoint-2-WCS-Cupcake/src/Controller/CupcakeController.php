<?php

namespace App\Controller;

use App\Model\AccessoryManager;
use App\Model\CupcakeManager;

/**
 * Class CupcakeController
 *
 */
class CupcakeController extends AbstractController
{
    /**
     * Display cupcake creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //TODO Add your code here to create a new cupcake
            $cupcake = [
                'name' => $_POST['name'],
                'color1' => $_POST['color1'],
                'color2' => $_POST['color2'],
                'color3' => $_POST['color3'],
                'accessory_id' => $_POST['accessory']
            ];

            $cupcakeManager = new CupcakeManager();
            $cupcakeManager->insert($cupcake);

            header('Location:/cupcake/list');
        }
        //TODO retrieve all accessories for the select options
        $accessoryManager = new AccessoryManager();
        $accessories = $accessoryManager->selectAll();

        return $this->twig->render('Cupcake/add.html.twig', ['accessories' => $accessories]);
    }

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function list()
    {
        //TODO Retrieve all cupcakes
        $cupcakeManager = new CupcakeManager();
        $cupcakes = $cupcakeManager->selectAllWithAccessory();

        return $this->twig->render('Cupcake/list.html.twig', ['cupcakes' => $cupcakes]);
    }

    public function show(int $id)
    {
        $cupcakeManager = new CupcakeManager();
        $cupcake = $cupcakeManager->selectOneByIdWithAccessory($id);

        return $this->twig->render('Cupcake/show.html.twig', ['cupcake' => $cupcake]);
    }
}
