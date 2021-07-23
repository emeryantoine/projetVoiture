<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\CarFleet;
use App\Entity\Engine;
use App\Entity\Gear;
use App\Entity\Rental;
use App\Entity\Seat;
use App\Entity\User;
use Doctrine\Migrations\Tools\Console\Command\StatusCommand;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // return parent::index();
        return $this->render('admin/dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('FlashMcQueen');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Liste', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-plus', User::class)->setAction('new');
        yield MenuItem::section('Locations');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Rental::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-plus', Rental::class)->setAction('new');
        yield MenuItem::section('Voitures');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Car::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-plus', Car::class)->setAction('new');
        yield MenuItem::section('Status');
        yield MenuItem::linkToCrud('Liste', 'fas fa-thermometer', CarFleet::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-plus', CarFleet::class)->setAction('new');
        
        yield MenuItem::section('Moteurs');
        yield MenuItem::linkToCrud('Liste', 'fas fa-cogs', Engine::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-plus', Engine::class)->setAction('new');
        yield MenuItem::section('Boite de vitesse');
        yield MenuItem::linkToCrud('Liste', 'fas fa-random', Gear::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-plus', Gear::class)->setAction('new');
        yield MenuItem::section('Places');
        yield MenuItem::linkToCrud('Liste', 'fas fa-chair', Seat::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-plus', Seat::class)->setAction('new');      
        yield MenuItem::section();
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out-alt');

        //yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
        ->setName($user->getFullname());
    }
}
