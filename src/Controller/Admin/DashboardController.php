<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use App\Entity\Category;
use App\Entity\CollectionCard;
use App\Entity\Thumbnail;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin')]
    public function admin(EntityManagerInterface $em): Response
    {
        $collections = $em->getRepository(CollectionCard::class)->findAll();
        $cards = $em->getRepository(Card::class)->findAll();
        return $this->render('admin/my-dashboard.html.twig',[
            'collections' => count($collections),
            'cards' => count($cards)
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Collect7');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Cartes', 'fas fa-list', Card::class);
        yield MenuItem::linkToCrud('Collections', 'fas fa-list', CollectionCard::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-list', Thumbnail::class);
    }
}
