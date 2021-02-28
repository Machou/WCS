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
        $faker->seed(75098);

        for($i = 1; $i <= 100; $i++) {
            $commentText = $faker->name.' pense que cet épisode est super bien. ' . $faker->realText();

            $comment = new Comment();

            $a = ['admin', 'contributor', 'user'];
            $comment->setAuthor($this->getReference($a[array_rand($a)]));
            $comment->setEpisode($this->getReference('episode_' . $i));
            $comment->setComment($commentText);
            $comment->setRate(rand(1, 5));

            $manager->persist($comment);
		}

        $manager->flush();
    }

    public function getDependencies()
    {
        return [EpisodeFixtures::class];
    }
}
