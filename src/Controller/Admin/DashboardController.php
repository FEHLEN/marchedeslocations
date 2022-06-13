<?php

namespace App\Controller\Admin;

use App\Entity\Regions;
use App\Entity\Curiosites;
use App\Entity\Offreslocations;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MarcheDesLocations');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Régions', 'fas fa-list', Regions::class);
        yield MenuItem::linkToCrud('Curiosités', 'fas fa-list', Curiosites::class);
        yield MenuItem::linkToCrud('Annonces', 'fas fa-pager', Offreslocations::class);
    }
}
