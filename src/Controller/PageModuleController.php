<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\PageModuleRepository;
use App\Repository\ModulesRepository;
use App\Entity\Modules;
use App\Entity\PageModule;
use Symfony\Component\HttpFoundation\Response;

class PageModuleController extends AbstractController
{
    /**
     *  @Route("modules/{titre}", name="page")
     */
    public function page(Modules $module): Response
    
    {
        //$repoM = $this->getDoctrine()->getRepository(Modules::class);
        $repoP = $this->getDoctrine()->getRepository(PageModule::class);

        //$module = $repoM->find($titre);
        //findOneBy car on veut afficher 1 page
        $pageModule = $repoP->findAll();

        //dd();
            return $this->render('modules/page.html.twig', [
                'module' => $module,
                'pages' => $pageModule
        ]);
        }


}