<?php

namespace App\Controller;

use App\Entity\Modules;
use App\Form\ModulesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/admin", name="admin_")
 * @package App\Controller
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
     * @Route("/modules/ajout", name="modules_ajout")
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


            return $this->redirectToRoute('admin_home');
        }
        // fin traitement

        return $this->render('admin/modules/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
