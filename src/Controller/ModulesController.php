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
        $repo = $this->getDoctrine()->getRepository(Modules::class);

        $modules = $repo->findAll();

        return $this->render('modules/modules.html.twig', [
            'controller_name' => 'ModulesController',
            'modules' => $modules
        ]);
    }



    /**
     * @Route("/", name="login")
     */
    public function login(): Response
    {
        return $this->render('modules/login.html.twig');
    }

    /**
     *  @Route("/intro", name="intro")
     */
    public function module(): Response
    {
        return $this->render('modules/intro.html.twig');
    }


    /**
     * @Route("/quizz", name="quizz")
     */
    public function quizz(): Response
    {
        return $this->render('modules/quizz.html.twig');
    }
}
