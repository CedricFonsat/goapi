<?php

namespace App\DataFixtures;

// src/DataFixtures/UserFixtures.php
use App\Entity\Card;
use App\Entity\Category;
use App\Entity\CollectionCard;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CardFixtures extends Fixture
{
    public function __construct( private UserPasswordHasherInterface $hasher){}

    public function load(EntityManagerInterface|\Doctrine\Persistence\ObjectManager $em)
    {

        $category = new Category();
        $category->setName('Sport');
        $em->persist($category);

        $collection = new CollectionCard();
        $collection->setName('UEFA Champion League');
        $collection->setCover('cover');
        $collection->setCategory($category);
        $collection->setAuthor('collect7');
        $collection->setImage('image');
        $collection->setLogo('logo');
        $collection->setDescription('description');

        $em->persist($collection);
        $em->flush();

        $user = new User();
        $user->setEmail('test@test.fr');
        $user->setUsername('test');
        $user->setRoles(['ROLE_USER']);
        $user->setCover('cover');
        $user->setAvatar('avatar');
        $user->setWallet(1000);

        $password = $this->hasher->hashPassword($user, 'test');
        $user->setPassword($password);

        $em->persist($user);
        $em->flush();

        for ($i = 1; $i <= 10; $i++) {

            $card = new Card();
            $card->setName('Leo Messi 10');
            $card->setImage('image');
            $card->setCollection($collection);
            $card->setPrice(200);
            $card->setUser($user);
            $card->setIfAvailable(false);
            $em->persist($card);
         }

        $em->flush();
    }
}