<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\PageModuleRepository;
use App\Repository\ModulesRepository;
use App\Entity\Modules;
use App\Entity\PageModule;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/page", name="page-module_")
 * @package App\Controller
 */
class PageModuleController extends AbstractController
{
    /**
     *  @Route("/{slug}", name="page")
     */
    public function index(PageModuleRepository $pageModuleRepo, Request $request){
        //On définit le nombre d'éléments par page
        $limit = 1;
        
        //On récupère le numéro de page
        $page = (int)$request->query->get("page", 1);
        
        //On récupère la pagemodule de la page
        $pageModule = $pageModuleRepo->getPaginatedPageModule($page, $limit);

        // On récupère le nombre total de pagemodule
        $total = $pageModuleRepo->getTotalPageModule();

        return $this->render('modules/page.html.twig', compact('pageModule', 'total', 'limit', 'page'));
        }


    public function page(Modules $modules, PageModuleRepository $pageModuleRepo)
    
    {
        return $this->render('modules/page.html.twig', [
            'module' => $modules,
            'pageModule' => $pageModuleRepo->findAll()
        ]);
    }


}