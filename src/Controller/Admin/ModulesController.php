<?php

namespace App\Controller\Admin;

use App\Entity\Modules;
use App\Entity\PageModule;
use App\Form\ModulesType;
use App\Form\PageModuleType;
use App\Repository\ModulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/admin/modules", name="admin_modules_")
 * @package App\Controller\Admin
 */
class ModulesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ModulesRepository $modsRepo): Response
    {
        return $this->render('admin/modules/index.html.twig', [
            'modules' => $modsRepo->findAll()
        ]);
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajoutModule(Request $request): Response
    {
        $module = new Modules;

        $form = $this->createForm(ModulesType::class, $module);

        //traitement des infos passées
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($module);
            $em->flush();


            return $this->redirectToRoute('admin_modules_home');
        }
        // fin traitement

        return $this->render('admin/modules/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modifModule(Modules $module, Request $request): Response
    {
        $form = $this->createForm(ModulesType::class, $module);

        //traitement des infos passées
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($module);
            $em->flush();


            return $this->redirectToRoute('admin_modules_home');
        }
        // fin traitement

        return $this->render('admin/modules/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
