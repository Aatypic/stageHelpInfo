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
            'modules' => $modules
        ]);
    }

}
