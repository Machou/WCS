<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Form\UserType;
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
        $contributor = new User();
        $contributor->setEmail('contributor@monsite.com');
        $contributor->setRoles(['ROLE_USER']);
        $contributor->setPseudo('user');
        $contributor->setPassword($this->passwordEncoder->encodePassword(
            $contributor,
            'testpwd'
        ));

        $manager->persist($contributor);

        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPseudo('admin');
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'testpwd'
        ));

        $manager->persist($admin);

        $manager->flush();
    }
}
