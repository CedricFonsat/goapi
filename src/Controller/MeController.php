<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class MeController extends AbstractController
{
    public function __construct(private readonly Security $security){}

    public function __invoke(Request $request): UserInterface
    {
        $user = $this->security->getUser();
        return $user;
    }
}
