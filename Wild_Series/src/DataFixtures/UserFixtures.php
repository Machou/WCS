<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
	private $passwordEncoder;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;
	}

	public function load(ObjectManager $manager)
    {
		// Création d’un utilisateur de type “administrateur”
		$user = new User();
		$user->setEmail('admin@monsite.com');
		$user->setRoles(['ROLE_ADMIN']);
		$user->setPassword($this->passwordEncoder->encodePassword(
			$user,
			'pwd'
		));
		$user->setUsername('admin');
		$user->setBio('Un admin !');
		$user->setIsVerified(1);

		$this->addReference('admin', $user);

		$manager->persist($user);


		// Création d’un utilisateur de type “contributeur” (= auteur)
		$user = new User();
		$user->setEmail('contributor@monsite.com');
		$user->setRoles(['ROLE_CONTRIBUTOR']);
		$user->setPassword($this->passwordEncoder->encodePassword(
			$user,
			'pwd'
		));
		$user->setUsername('Moderateur');
		$user->setBio('Un super modérateur qui modére bien le site !');
		$user->setIsVerified(1);

		$this->addReference('contributor', $user);

		$manager->persist($user);


		// Création d’un utilisateur de type “utilisateur”
		$user = new User();
		$user->setEmail('user@monsite.com');
		$user->setRoles(['ROLE_USER']);
		$user->setPassword($this->passwordEncoder->encodePassword(
			$user,
			'pwd'
		));
		$user->setUsername('Utilisateur');
		$user->setBio('Un utilisateur !');
		$user->setIsVerified(1);

		$this->addReference('user', $user);

		$manager->persist($user);


		$manager->flush();
	}
}