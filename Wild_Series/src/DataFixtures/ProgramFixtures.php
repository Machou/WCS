<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Program;
use App\Service\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
	const PROGRAMS = [
		'Walking Dead' => [ // 0
			'summary' => 'Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le monde, ravagé par une épidémie, est envahi par les morts-vivants.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/reKs8y4mPwPkZG99ZpbKRhBPKsX.jpg',
			'category' => 'category_5',
			'year' => 2010,
			'tmdb' => 'https://www.themoviedb.org/tv/1402-the-walking-dead',
		],

		'The Haunting Of Hill House' => [ // 1
			'summary' => 'Plusieurs frères et sœurs qui, enfants, ont grandi dans la demeure qui allait devenir la maison hantée la plus célèbre des États-Unis, sont contraints de se réunir pour finalement affronter les fantômes de leur passé.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/fxXsZG4p0hjlMuF1q674dLuJdxV.jpg',
			'category' => 'category_5',
			'year' => 2018,
			'tmdb' => 'https://www.themoviedb.org/tv/1402-the-walking-dead',
		],

		'American Horror Story' => [ // 2
			'summary' => 'A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/uR2K0Ui9UsOqnzb5IrV6tLUcUHl.jpg',
			'category' => 'category_5',
			'year' => 2011,
			'tmdb' => 'https://www.themoviedb.org/tv/1413-american-horror-story',
		],

		'Love Death And Robots' => [ // 3
			'summary' => 'Un yaourt susceptible, des soldats lycanthropes, des robots déchaînés, des monstres-poubelles, des chasseurs de primes cyborgs, des araignées extraterrestres et des démons assoiffés de sang : tout ce beau monde est réuni dans 18 courts métrages animés déconseillés aux âmes sensibles.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/dEJCQRvzSV1wDtdsnCyvqFOr1d.jpg',
			'category' => 'category_4',
			'year' => 2019,
			'tmdb' => 'https://www.themoviedb.org/tv/86831-love-death-robots',
		],

		'Penny Dreadful' => [ // 4
			'summary' => 'Dans le Londres ancien, Vanessa Ives, une jeune femme puissante aux pouvoirs hypnotiques, allie ses forces à celles de Ethan, un garçon rebelle et violent aux allures de cowboy, et de Sir Malcolm, un vieil homme riche aux ressources inépuisables. Ensemble, ils combattent un ennemi inconnu, presque invisible, qui ne semble pas humain et qui massacre la population.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/uNcmVroHdW835vGD0XdKr25ZNyY.jpg',
			'category' => 'category_6',
			'year' => 2014,
			'tmdb' => 'https://www.themoviedb.org/tv/54671-penny-dreadful',
		],

		'Fear The Walking Dead' => [ // 5
			'summary' => 'La série se déroule au tout début de l épidémie relatée dans la série mère The Walking Dead et se passe dans la ville de Los Angeles, et non à Atlanta. Madison est conseillère dans un lycée de Los Angeles. Depuis la mort de son mari, elle élève seule ses deux enfants : Alicia, excellente élève qui découvre les premiers émois amoureux, et son grand frère Nick qui a quitté la fac et a sombré dans la drogue.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/6qTakVrfU4AHTEEYQsUmIn66NNg.jpg',
			'category' => 'category_4',
			'year' => 2015,
			'tmdb' => 'https://www.themoviedb.org/tv/62286-fear-the-walking-dead',
		],

		'Dexter' => [ // 6
			'summary' => 'De jour, Dexter est analyste de traces de sang pour la police de Miami. De nuit, il est tueur en série de meurtriers.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/p4rx3FW14Ayx1dLHJQBqDGw9YiX.jpg',
			'category' => 'category_6',
			'year' => 2006,
			'tmdb' => 'https://www.themoviedb.org/tv/1405-dexter',
		],

		'Frères d\'armes' => [ // 7
			'summary' => 'L\'histoire de la Easy Company de la 101e division aéroportée de l\'armée américaine, et de sa mission en Europe pendant la Seconde Guerre mondiale, de l\'opération Overlord au jour de la Victoire sur le Japon.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/7w2zhfN03Ff1pOgnUo9tFu0qELt.jpg',
			'category' => 'category_0',
			'year' => 2001,
			'tmdb' => 'https://www.themoviedb.org/tv/4613-band-of-brothers',
		],

		'Breaking Bad' => [ // 8
			'summary' => 'Un professeur de chimie de lycée chez qui on a diagnostiqué un cancer du poumon inopérable se tourne vers la fabrication et la vente de méthamphétamine pour assurer l\'avenir de sa famille.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ggFHVNu6YYI5L9pCfOacjizRGt.jpg',
			'category' => 'category_3',
			'year' => 2008,
			'tmdb' => 'https://www.themoviedb.org/tv/1396-breaking-bad',
		],

		'Sur écoute' => [ // 9
			'summary' => 'Le monde de la drogue à Baltimore à travers les yeux des trafiquants comme des forces de l\'ordre.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/efV8dprxpU1JXNGqepVY68ZaHKZ.jpg',
			'category' => 'category_6',
			'year' => 2002,
			'tmdb' => 'https://www.themoviedb.org/tv/1438-the-wire',
		],

		'Les Simpson' => [ // 10
			'summary' => 'Les aventures satiriques d\'une famille de classe moyenne dans la ville de Springfield.',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/reKFmynUd2VpFToo3rLTGk8zVSN.jpg',
			'category' => 'category_2',
			'year' => 1989,
			'tmdb' => 'https://www.themoviedb.org/tv/456-the-simpsons',
		],

		'Desperate Housewives' => [ // 11
			'summary' => 'Wisteria Lane est un lieu paisible où les habitants semblent mener une vie heureuse... en apparence seulement ! Car en y regardant de plus près, on découvre bien vite, dans l\'intimité de chacun, que le bonheur n\'est pas toujours au rendez-vous. Et peu à peu, les secrets remontent inévitablement à la surface, risquant de faire voler en éclat le vernis lisse de leur tranquille existence...',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/bqPo6t7YF38QYwuuy3zJwmFWaYz.jpg',
			'category' => 'category_3',
			'year' => 2004,
			'tmdb' => 'https://www.themoviedb.org/tv/693-desperate-housewives',
		],

		'Xena, la guerrière' => [ // 12
			'summary' => 'Après avoir renoncé à son passé de destruction, Xena, une redoutable guerrière, ancienne ennemie d\'Hercule, décide de mettre désormais ses formidables compétences de combattante en faveur du bien et de la paix dans l\'espoir de se racheter. Elle chemine en compagnie de la douce Gabrielle, son amie, une jeune et belle barde, férue d\'admiration pour ses exploits. Les deux femmes affrontent bien des épreuves...',
			'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/9mGNpJ6U9j0yv6Mc8fbqR1qlewq.jpg',
			'category' => 'category_1',
			'year' => 1995,
			'tmdb' => 'https://www.themoviedb.org/tv/4616-xena-warrior-princess',
		],
	];

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
	}

    public function load(ObjectManager $manager)
    {
		$slug = new Slugify;

		$i = 0;
        foreach(self::PROGRAMS as $title => $data) {
			$program = new Program();

			$program->setTitle($title);
			$program->setSummary($data['summary']);
			$program->setPoster('https://picsum.photos/1050/1500');
			$program->setCategory($this->getReference($data['category']));
			$program->setSlug($slug->generate($title));
			$program->setOwner($this->getReference('admin'));
			$program->setYear($data['year']);
			$program->setTmdb($data['tmdb']);
			$program->setDateAdded(new \DateTime('now - ' . $i . ' day'));
			$program->setUpdatedAt(new \DateTime('now'));

			$this->addReference('program_' . $i, $program);
			$this->addReference($title, $program);

			$manager->persist($program);
			$i++;
        }

        $manager->flush();
	}

	public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}