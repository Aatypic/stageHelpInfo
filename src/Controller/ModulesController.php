<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Modules;
use App\Repository\ModulesRepository;

class ModulesController extends AbstractController
{
    /**
     * @Route("/modules", name="modules")
     */
    public function modules(): Response
    {
        $repoM = $this->getDoctrine()->getRepository(Modules::class);

        $modules = $repoM->findAll();

        return $this->render('modules/modules.html.twig', [
            'modules' => $modules
        ]);
    }



    ///**
    // *  @Route("/contenu/{id}", name="contenu")
    // */
   // public function contenu($id): Response
    ////public function contenu(Modules $module, PageModule $pageModule)
   // {
      //  $repo1 = $this->getDoctrine()->getRepository(Modules::class);
     //  $repo = $this->getDoctrine()->getRepository(PageModule::class);

     //   $module = $repo1->find($id);
     //   $pageModule = $repo->find($id);

     //   return $this->render('modules/contenu.html.twig', [
     //       'module' => $module,
      //      'contenu' => $pageModule
      //  ]);
    //}
}
