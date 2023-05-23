<?php

namespace App\DataFixtures;

// src/DataFixtures/UserFixtures.php
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct( private UserPasswordHasherInterface $hasher){}

    public function load(EntityManagerInterface|\Doctrine\Persistence\ObjectManager $em)
    {
       // return 'BONSOIR';
  /*      $user = new User();
        $user->setEmail('admin@collect7.fr');
        $user->setUsername('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setCover('cover');
        $user->setAvatar('avatar');
        $user->setWallet(3000);

        $password = $this->hasher->hashPassword($user, 'admin');
        $user->setPassword($password);

        $em->persist($user);
        $em->flush();*/
    }
}