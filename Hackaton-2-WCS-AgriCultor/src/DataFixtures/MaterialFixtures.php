<?php

namespace App\DataFixtures;

use App\Entity\Materials;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MaterialFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tractor = new Materials();
        $tractor->setType('tracteur');
        $tractor->setTrademark('Lamborghini');
        $tractor->setModel('Mach 230 VRT');
        $tractor->setYear(2018);
        $tractor->setKilometer(0);

        $manager->persist($tractor);

        $combineHarvester = new Materials();
        $combineHarvester->setType('moissonneuse batteuse');
        $combineHarvester->setTrademark('John Deere');
        $combineHarvester->setModel('1470');
        $combineHarvester->setYear(2010);
        $combineHarvester->setKilometer(0);

        $manager->persist($combineHarvester);

        $forageHarvester = new Materials();
        $forageHarvester->setType('ensileuse');
        $forageHarvester->setTrademark('New Holland');
        $forageHarvester->setModel('FR500');
        $forageHarvester->setYear(2013);
        $forageHarvester->setKilometer(0);

        $manager->persist($forageHarvester);

        $manager->flush();
    }
}
