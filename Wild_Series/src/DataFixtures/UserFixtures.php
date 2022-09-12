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
		$admin = new User();

		$admin->setEmail('admin@monsite.com');
		$admin->setRoles(['ROLE_ADMIN']);
		$admin->setPassword($this->passwordEncoder->encodePassword(
			$admin,
			'pwd'
		));
		$admin->setUsername('admin');
		$admin->setBio('Un admin !');
		$admin->setIsVerified(1);

		$this->addReference('admin', $admin);

		$manager->persist($admin);


		// Création d’un utilisateur de type “contributeur”
		$contributor = new User();

		$contributor->setEmail('contributor@monsite.com');
		$contributor->setRoles(['ROLE_CONTRIBUTOR']);
		$contributor->setPassword($this->passwordEncoder->encodePassword(
			$contributor,
			'pwd'
		));
		$contributor->setUsername('Moderateur');
		$contributor->setBio('Un super modérateur qui modére bien le site !');
		$contributor->setIsVerified(1);

		$this->addReference('contributor', $contributor);

		$manager->persist($contributor);


		// Création d’un utilisateur de type “utilisateur”
		$user = new User();

		$user->setEmail('user@monsite.com');
		$user->setRoles(['ROLE_USER']);
		$user->setPassword($this->passwordEncoder->encodePassword(
			$contributor,
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