<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Season;
use App\DataFixtures\ProgramFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i <= 12; $i++) {
            for($iSeason = 1; $iSeason <= 10; $iSeason++) {
                $season = new Season();

                $season->setProgram($this->getReference('program_' . $i));
                $season->setNumber($iSeason);
                $season->setYear($faker->year());
                $season->setDescription($faker->text());

                $this->addReference('season_' . $i . '_' . $iSeason, $season);

                $manager->persist($season);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}