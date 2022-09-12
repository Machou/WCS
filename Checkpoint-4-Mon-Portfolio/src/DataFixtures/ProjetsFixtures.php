<?php

namespace App\DataFixtures;

use App\Entity\Projets;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjetsFixtures extends Fixture
{
    const PROJETS = [
        'Le Bon Deal' => [
            'nom' => 'Le Bon Deal',
            'description' => 'Site de vente en ligne entre particulier.',
            'screen' => 'no',
            'date' => '2020-12-06',
            'lien' => 'http://www.lebondeal.net/',
        ],
        'FakeBook' => [
            'nom' => 'FakeBook',
            'description' => 'Retrouvez vos amis !',
            'screen' => 'no',
            'date' => '2010-07-11',
            'lien' => 'http://www.fakebook.io/',
        ],
        'Meetix' => [
            'nom' => 'Meetix',
            'description' => 'Rencontrez votre âme soeur !',
            'screen' => 'no',
            'date' => '2004-06-12',
            'lien' => 'http://www.meetix.ac/',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach(self::PROJETS as $title => $data) {
			$projet = new Projets();

			$projet->setNom($title);
			$projet->setDescription($data['description']);
            $projet->setScreen($data['screen']);
            $projet->setDate(new \DateTime(rand(2005, 20201).'-'.rand(10, 12).'-'.rand(10, 31)));
            $projet->setLien($data['lien']);

			$manager->persist($projet);
        }

        $manager->flush();
    }
}