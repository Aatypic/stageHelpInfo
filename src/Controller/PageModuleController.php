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
 * @Route("/modules/{slug}", name="page-module_")
 * @package App\Controller
 */
class PageModuleController extends AbstractController
{
    /**
     *  @Route("/", name="page")
     */
    public function index(PageModuleRepository $pageModuleRepo, ModulesRepository $modulesRepo, Modules $id, Request $request){
        //On définit le nombre d'éléments par page
        $limit = 1;
        
        //On récupère le numéro de page
        $page = (int)$request->query->get("page", 1);
        
        $routeParameters = $request->attributes->get('_route_params');
        
        $modulesId = $modulesRepo->findIdBySlug($routeParameters['slug']);
        
        //On récupère la pagemodule de la page
        $pageModule = $pageModuleRepo->getPaginatedPageModule($modulesId, $page, $limit);

        // On récupère le nombre total de pagemodule
        $total = $pageModuleRepo->getTotalPageModule($modulesId);

        // On récupère les infos des modules 'titre''nbPages''slug'
        $modules = $modulesRepo->find($id);

        return $this->render('modules/page.html.twig', compact('pageModule', 'total', 'limit', 'page', 'routeParameters', 'modules'));
        }


    public function page(Modules $modules /* PageModuleRepository $pageModuleRepo */)
    
    {
        return $this->render('modules/page.html.twig', [
            'module' => $modules,
            //'pageModule' => $pageModuleRepo->findAll()
        ]);
    }


}