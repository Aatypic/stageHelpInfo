<?php

namespace App\Controller\Admin;

use App\Entity\Modules;
use App\Entity\PageModule;
use App\Form\ModulesType;
use App\Form\PageModuleType;
use App\Repository\ModulesRepository;
use App\Repository\PageModuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/admin", name="admin_")
 * @package App\Controller\Admin
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    
    /**
     * @Route ("/modules", name="modules")
     */
    public function indexModules(ModulesRepository $modsRepo)
    {
        return $this->render('admin/modules/index.html.twig', [
            'modules' => $modsRepo->findAll()
        ]);
    }

    /**
     * @Route ("/page-module", name="page-module")
     */
    public function indexPageModule(PageModuleRepository $pageModuleRepo)
    {
        return $this->render('admin/page-module/index.html.twig', [
            'pageModule' => $pageModuleRepo->findAll()
        ]);
    }
}
