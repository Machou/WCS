<?php

namespace App\DataFixtures;

use DateTime;
use Faker;
use App\Entity\Actor;
use App\DataFixtures\ProgramFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTORS = [
        'Andrew-Lincoln',   // 0
        'Norman-Reedus',    // 1
        'Lauren-Cohan',     // 2
        'Danai-Gurira',     // 3
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::ACTORS as $key => $actorName) {
            $actor = new Actor();

            $actor->setName($actorName);
            $actor->addProgram($this->getReference('program_' . rand(0, 12), $actor));
			$actor->setPoster('https://picsum.photos/1050/1500');
			$actor->setDateAdded(new \DateTime('now - ' . $key . ' day'));
			$actor->setUpdatedAt(new \DateTime('now'));

            $this->setReference('actor_' . $key, $actor);

            $manager->persist($actor);
        }

        $faker = Faker\Factory::create('fr_FR');
        for($i = 4; $i <= 100; $i++) {
            $actor = new Actor();

            $actor->setName($faker->name());
            $actor->addProgram($this->getReference('program_' . rand(0, 12), $actor));
			$actor->setPoster('https://picsum.photos/1050/1500');
			$actor->setDateAdded(new \DateTime('now - ' . $i . ' day'));
			$actor->setUpdatedAt(new \DateTime('now'));

            $manager->persist($actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}