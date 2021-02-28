<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Episode;
use App\Service\Slugify;
use App\DataFixtures\SeasonFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $slug = new Slugify;

        for($i = 1; $i <= 100; $i++) {
            $season = $this->getReference('season_' . rand(1, 100));

            $episode = new Episode();

            $episode->setSeason($season);
            $episode->setTitle($title = $faker->name());
            // $episode->setTitle($title = $faker->sentence());
            $episode->setSlug($slug->generate($title));
            $episode->setNumber($number = rand(1, 10));
            // $episode->setNumber($number = $faker->numberBetween($min = 1, $max = 10););
            $episode->setSynopsis('Épisode n°' . $number . ' de la Série');
            // $episode->setSynopsis($season->getNumber());
            // $episode->setSynopsis($faker->text());

            $this->addReference('episode_' . $i, $episode);

            $manager->persist($episode);
		}

        $manager->flush();
    }

    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }
}