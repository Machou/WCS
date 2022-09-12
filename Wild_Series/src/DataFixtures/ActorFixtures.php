<?php

namespace App\DataFixtures;

use Faker;
use DateTime;
use App\Entity\Actor;
use App\Service\Slugify;
use App\DataFixtures\ProgramFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
	public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
	}

    const ACTORS = [
        'Andrew-Lincoln',   // 0
        'Norman-Reedus',    // 1
        'Lauren-Cohan',     // 2
        'Danai-Gurira',     // 3
    ];

    public function load(ObjectManager $manager)
    {
		$slug = new Slugify;

        foreach (self::ACTORS as $name => $actorName) {
            $actor = new Actor();

            $actor->setName($actorName);
            $actor->addProgram($this->getReference('program_' . rand(0, 12), $actor));
			$actor->setPoster('https://picsum.photos/1050/1500');
			$actor->setDateAdded(new \DateTime('now - ' . $name . ' day'));
			$actor->setUpdatedAt(new \DateTime('now'));
			$actor->setSlug($slug->generate($actorName));

            $this->setReference('actor_' . $name, $actor);

            $manager->persist($actor);
        }

        $faker = Faker\Factory::create('fr_FR');

        for($i = 4; $i <= 100; $i++) {
            $actor = new Actor();

			$name = $faker->name();

            $actor->setName($name);
            $actor->addProgram($this->getReference('program_' . rand(0, 12), $actor));
			$actor->setPoster('https://picsum.photos/1050/1500');
			$actor->setDateAdded(new \DateTime('now - ' . $i . ' day'));
			$actor->setUpdatedAt(new \DateTime('now'));
			$actor->setSlug($slug->generate($name));

            $manager->persist($actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}