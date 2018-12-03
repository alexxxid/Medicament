<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        //Compte Admin
        $user = new User();
        $user->setUsername("admin")
            ->setRoles(['ROLE_ADMIN']);
        $password = $this->encoder->encodePassword($user, 'admin');


        $user->setPassword($password);
        $manager->persist($user);

        //Compte Practicien
        $user = new User();
        $user->setUsername("practicien")
            ->setRoles(['ROLE_USER']);
        $password = $this->encoder->encodePassword($user, 'practicien');

        $user->setPassword($password);
        $manager->persist($user);

        //Compte Visiteur
        $user = new User();
        $user->setUsername("visiteur")
            ->setRoles(['ROLE_USER']);
        $password = $this->encoder->encodePassword($user, 'visiteur');

        $user->setPassword($password);
        $manager->persist($user);



        $manager->flush();
    }
}
