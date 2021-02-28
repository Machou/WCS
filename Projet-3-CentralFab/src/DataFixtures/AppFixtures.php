<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\fablab;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        // Création d’un utilisateur de type “contributor”
        // $product = new Product();
        // $manager->persist($product);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'the_new_password'
        ));

        // Création d’un utilisateur de type “contributor”
        $contributor = new User();
        $contributor->setEmail('contributor@monsite.com');
        $contributor->setRoles(['ROLE_CONTRIBUTOR']);
        $contributor->setFirstName('Christophe');
        $contributor->setLastName('Mae');
        $contributor->setPassword($this->passwordEncoder->encodePassword(
            $contributor,
            'contributorpassword'
        ));

        $manager->persist($contributor);

        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setFirstName('Christopher');
        $admin->setLastName('Persinet');
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'adminpassword'
        ));
        $manager->persist($admin);

        // Création d’un utilisateur de type “user”
        $user = new User();
        $user->setEmail('user@monsite.com');
        $user->setRoles(['ROLE_USER']);
        $user->setFirstName('Charlie');
        $user->setLastName('Mandarine');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'userpwd'
        ));
        $manager->persist($user);


        $fablab = new Fablab();
        $fablab->setSiret(77568562100796);
        $fablab->setAddress('21 Rue Dieu-Lumière, 51100 Reims');
        $fablab->setCity('Reims');
        $fablab->setPhone('03 26 35 80 60');
        $fablab->setMail('contact@ufcv.fr');
        $fablab->setName('UFCV');
        $fablab->setSchedule('Lundi au vendredi: 9h-12h / 14h-17h');
        $fablab->setCategory('C.A.O');
        $manager->persist($fablab);


        $fablab2 = new Fablab();
        $fablab2->setSiret(34270750200502);
        $fablab2->setAddress('7 bis Avenue Robert Schuman, 51100 Reims');
        $fablab2->setCity('Reims');
        $fablab2->setPhone('03 26 79 35 70');
        $fablab2->setMail('contact-reims@cesi.fr');
        $fablab2->setName('Campus CESI');
        $fablab2->setSchedule('Lundi au vendredi: 8h-17h');
        $fablab2->setCategory('C.A.O');
        $manager->persist($fablab2);


        $fablab3 = new Fablab();
        $fablab3->setSiret(78042936100014);
        $fablab3->setAddress('Esplanade André Malraux, 51100 Reims');
        $fablab3->setCity('Reims');
        $fablab3->setPhone('03 26 77 41 41');
        $fablab3->setMail('b.grisonnet@saintex-reims.com');
        $fablab3->setName('St Exupéry');
        $fablab3->setSchedule('Tous les mardis soirs: 17h30-21h30\nTous les jeudis soirs: 18h-22h');
        $fablab3->setCategory('C.A.O');
        $manager->persist($fablab3);


        $fablab4 = new Fablab();
        $fablab4->setSiret(18004301001485);
        $fablab4->setAddress('17 Boulevard de la Paix, 51100 Reims');
        $fablab4->setCity('Reims');
        $fablab4->setPhone('03 26 61 20 20');
        $fablab4->setMail('contact.atelier51@reseau-canope.fr');
        $fablab4->setName('Atelier Canopé 51');
        $fablab4->setSchedule('Mardi: 12h00-18h00\nMercredi: 9h00-18h00\nJeudi: 12h00-18h00\nVendredi: 10h00-13h00');
        $fablab4->setCategory('C.A.O');
        $manager->persist($fablab4);


        $fablab5 = new Fablab();
        $fablab5->setSiret(79231155700013);
        $fablab5->setAddress('1 Place Paul Claudel, 51100 Reims');
        $fablab5->setCity('Reims');
        $fablab5->setPhone('03 26 02 90 90');
        $fablab5->setMail('contact@recyclab.fr');
        $fablab5->setName('Recyc\'lab');
        $fablab5->setSchedule('Permanences les mercredis: 9h à 17h\nTemporairement fermé durant la période COVID');
        $fablab5->setCategory('C.A.O');
        $manager->persist($fablab5);


        $fablab6 = new Fablab();
        $fablab6->setSiret(49395413500031);
        $fablab6->setAddress('23 Rue Clément Ader, 51100 Reims');
        $fablab6->setCity('Reims');
        $fablab6->setPhone('03 26 50 61 26');
        $fablab6->setMail('contact@accustica.org');
        $fablab6->setName('Accustica');
        $fablab6->setSchedule('Pas d\'horaires durant le COVID');
        $fablab6->setCategory('C.A.O');
        $manager->persist($fablab6);


        $manager->flush();
    }
}
