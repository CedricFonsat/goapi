<?php

namespace App\DataFixtures;

// src/DataFixtures/UserFixtures.php
use App\Entity\Category;
use App\Entity\CollectionCard;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CollectionCardFixtures extends Fixture
{
    public function __construct( private UserPasswordHasherInterface $hasher){}

    public function load(EntityManagerInterface|\Doctrine\Persistence\ObjectManager $em)
    {

        $category = new Category();
        $category->setName('Auto');
        $em->persist($category);

        $collection = new CollectionCard();
        $collection->setName('Nord Auto');
        $collection->setCover('cover');
        $collection->setCategory($category);
        $collection->setAuthor('collect7');
        $collection->setImage('image');
        $collection->setLogo('logo');
        $collection->setDescription('description');

        $em->persist($collection);
        $em->flush();
    }
}