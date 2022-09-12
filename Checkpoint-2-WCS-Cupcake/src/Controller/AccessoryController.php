<?php

namespace App\Controller;

use App\Model\AccessoryManager;

/**
 * Class AccessoryController
 *
 */
class AccessoryController extends AbstractController
{
    /**
     * Display accessory creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //TODO Add your code here to create a new accessory
            $accessory = [
                'name' => $_POST['name'],
                'url' => $_POST['url']
            ];

            $accessoryManager = new AccessoryManager();
            $accessoryManager->insert($accessory);
            header('Location:/accessory/list');
        }
        return $this->twig->render('Accessory/add.html.twig');
    }

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function list()
    {
        //TODO Add your code here to retrieve all accessories
        $accessoryManager = new AccessoryManager();
        $accessories = $accessoryManager->selectAll();

        return $this->twig->render('Accessory/list.html.twig', ['accessories' => $accessories]);
    }
}
