<?php

namespace App\Controller;

use App\Entity\PageModule;
use App\Form\PageModuleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function index(): Response
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    /**
     * @Route("/users/pages-modules/ajout", name="users_pages-modules_ajout")
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

            $em = $this->getDoctrine()->getManager();
            $em->persist($pageModule);
            $em->flush();
        }

        return $this->render('users/pages-modules/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
