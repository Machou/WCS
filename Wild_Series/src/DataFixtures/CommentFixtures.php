<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Comment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i <= 12; $i++) {
            for($iSeason = 1; $iSeason <= 10; $iSeason++) {
                for($iEpisode = 1; $iEpisode <= 10; $iEpisode++) {
					$comment = new Comment();

					$rolesArray = ['admin', 'contributor', 'user'];
					$comment->setAuthor($this->getReference($rolesArray[array_rand($rolesArray)]));
					$comment->setEpisode($this->getReference('episode_' . $i  . '_' .  $iSeason  . '_' .  $iEpisode));
					$comment->setComment($faker->name.' pense que cet épisode est super bien. ' . $faker->realText());
					$comment->setRate(rand(1, 5));

					$manager->persist($comment);
				}
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [EpisodeFixtures::class];
    }
}
