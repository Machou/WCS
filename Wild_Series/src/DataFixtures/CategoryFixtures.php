<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'Action',       // O
        'Aventure',     // 1
        'Animation',    // 2
        'Drame',        // 3
        'Fantastique',  // 4
        'Horreur',      // 5
        'Thriller',     // 6
        'Famille',      // 7
    ];

    public function load(ObjectManager $manager)
    {
        foreach(self::CATEGORIES as $key => $categoryName) {
            $category = new Category();

            $category->setName($categoryName);

            $this->addReference('category_' . $key, $category);

            $manager->persist($category);
        }

        $manager->flush();
    }
}