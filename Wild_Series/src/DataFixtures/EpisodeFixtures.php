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

        for($i = 0; $i <= 12; $i++) {
            for($iSeason = 1; $iSeason <= 10; $iSeason++) {
                for($iEpisode = 1; $iEpisode <= 10; $iEpisode++) {
                    $episode = new Episode();
                    $episode->setSeason($this->getReference('season_' . $i  . '_' .  $iSeason));
                    $episode->setTitle($title = $faker->name());
                    $episode->setSlug($slug->generate($title));
                    $episode->setNumber($iEpisode);
                    $episode->setSynopsis('Épisode n°' . $iEpisode . ' de la Série');

                    $this->addReference('episode_' . $i  . '_' .  $iSeason  . '_' .  $iEpisode, $episode);

                    $manager->persist($episode);
                }
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }
}