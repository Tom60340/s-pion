<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Agent;
use App\Entity\AgentList;
use App\Entity\Contact;
use App\Entity\ContactList;
use App\Entity\Country;
use App\Entity\Mission;
use App\Entity\MissionType;
use App\Entity\Speciality;
use App\Entity\Stash;
use App\Entity\StashList;
use App\Entity\Status;
use App\Entity\Target;
use App\Entity\TargetList;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){        
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(AdminCrudController::class)
        ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('S-Pion');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('SuperAdmin tools');
        yield MenuItem::subMenu('Admins', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Admin', 'fas fa-plus', Admin::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Admins', 'fas fa-eye',Admin::class)
        ]);
        yield MenuItem::subMenu('Specialities', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Speciality', 'fas fa-plus', Speciality::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Specialities', 'fas fa-eye',Speciality::class)
        ]);
        yield MenuItem::subMenu('MissionTypes', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create MissionType', 'fas fa-plus', MissionType::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show MissionTypes', 'fas fa-eye',MissionType::class)
        ]);
        yield MenuItem::subMenu('Status', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Status', 'fas fa-plus', Status::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Status', 'fas fa-eye',Status::class)
        ]);
        yield MenuItem::subMenu('Countries', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Country', 'fas fa-plus', Country::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Countries', 'fas fa-eye',Country::class)
        ]);
        


        yield MenuItem::section('Admin tools');
        yield MenuItem::subMenu('Missions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Mission', 'fas fa-plus', Mission::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Missions', 'fas fa-eye',Mission::class)
        ]);
        yield MenuItem::subMenu('Stashes', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Stash', 'fas fa-plus', Stash::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Stashes', 'fas fa-eye',Stash::class)
        ]);
        yield MenuItem::subMenu('StashList', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create StashList', 'fas fa-eye',StashList::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show StashList', 'fas fa-eye',StashList::class)
        ]);
        yield MenuItem::subMenu('Agents', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Agent', 'fas fa-plus', Agent::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Agent', 'fas fa-eye',Agent::class)
        ]);
        yield MenuItem::subMenu('AgentList', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create AgentList', 'fas fa-eye',AgentList::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show AgentList', 'fas fa-eye',AgentList::class)
        ]);        
        yield MenuItem::subMenu('Contacts', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Contact', 'fas fa-plus', Contact::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Contacts', 'fas fa-eye',Contact::class)
        ]);
        yield MenuItem::subMenu('ContactList', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create ContactList', 'fas fa-eye',ContactList::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show ContactList', 'fas fa-eye',ContactList::class)
        ]);
        yield MenuItem::subMenu('Targets', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Target', 'fas fa-plus', Target::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Targets', 'fas fa-eye',Target::class)
        ]);
        yield MenuItem::subMenu('TargetLists', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Show TargetLists', 'fas fa-eye',TargetList::class)
        ]);

    }
}