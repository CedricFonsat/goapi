<?php

namespace App\Controller\Api\Card;

use App\Entity\Card;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class BuyCardController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $em, private readonly Security $security) {}

    public function __invoke(Request $request): JsonResponse
    {
        $params = json_decode($request->getContent(), true);

        $user = $this->security->getUser();
        $card = $this->em->getRepository(Card::class)->find($params['cardId']);
        $admin = $this->em->getRepository(User::class)->find(1);

        $wallet = $user->getWallet() - $card->getPrice();
        $adminWallet = $user->getWallet() + $card->getPrice();

        dd($user->getCards());

        $isTest = false;
        if ($user)

        if ($user->getWallet() > $card->getPrice()){
            $user->setWallet($wallet);
            $card->setUser($user);
            $admin->setWallet($adminWallet);
            $this->em->persist($user);
            $this->em->persist($card);
            $this->em->persist($admin);
        }else{
            dd("wallet down");
        }

        $this->em->flush();

        return $card;
    }
}