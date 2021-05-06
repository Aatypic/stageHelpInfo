<?php

namespace App\Controller\Admin;

use App\Entity\Modules;
use App\Entity\PageModule;
use App\Form\PageModuleType;
use App\Repository\ModulesRepository;
use App\Repository\PageModuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/admin/page-module", name="admin_page-module_")
 * @package App\Controller\Admin
 */
class PageModuleController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PageModuleRepository $pageModuleRepo, Modules $modulesRepo): Response
    {   
        return $this->render('admin/page-module/index.html.twig', [
            'pageModule' => $pageModuleRepo->findAll(),
            // 'modules' => $modulesRepo->getTitre()
        ]);
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajoutPageModule(Request $request): Response
    {
        $pageModule = new PageModule;

        $form = $this->createForm(PageModuleType::class, $pageModule);

        // début de traitement, on fait passé le paramètre avant aussi $request
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // là il faut au'on récupère le nom d'utilisateur connecté (et le active ?)
            //$pageModule->setUsers($this->getUser());
            //$pageModule->setActive(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($pageModule);
            $em->flush();

            return $this->redirectToRoute('admin_page-module_home');
        }

        return $this->render('admin/page-module/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modifPageModule(PageModule $pageModule, Request $request): Response
    {
        $form = $this->createForm(PageModuleType::class, $pageModule);

        //traitement des infos passées
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($pageModule);
            $em->flush();


            return $this->redirectToRoute('admin_page-module_home');
        }
        // fin traitement

        return $this->render('admin/page-module/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function supprimerPageModule(PageModule $pageModule, Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($pageModule);
        $em->flush();


        $this->addFlash('message', 'Page supprimé avec succès');
        return $this->redirectToRoute('admin_page-module_home');
    }

}
