<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index()
    {
        return $this->render('site/accueil.html.twig');
    }

    /**
     * @Route("/actualites", name="actualites")
     */
    public function actualites()
    {
        /* RSS ANAP*/
        $rssFeedUrlAnap = "https://www.anap.fr/liens-utiles/flux-rss/flux-rss-general/";
        $rssFeedStringAnap = file_get_contents($rssFeedUrlAnap);
        $rssFeedAnap = simplexml_load_string($rssFeedStringAnap);


        $postsAnap = [];
        foreach ($rssFeedAnap->xpath("channel/item[position()<=3]") as $item) 
		{

            $postsAnap[] = array(
                "id" => $item->guid,
                "title" => $item->title,
                "description" => $item->description,
                "link" => $item->link,
            );
        }

		$stream_opts = [
    "ssl" => [
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ]
];

        /* RSS Solidrité santé 1 (Activités humaines)*/
        $rssFeedUrlSs1 = "https://solidarites-sante.gouv.fr/spip.php?page=backend";
        $rssFeedStringSs1 = file_get_contents($rssFeedUrlSs1,false, stream_context_create($stream_opts));
        $rssFeedSs1 = simplexml_load_string($rssFeedStringSs1);


        $postsSs1 = [];
        foreach ($rssFeedSs1->xpath("channel/item[position()<=3]") as $item) {

            $postsSs1[] = array(
                "id" => $item->guid,
                "title" => $item->title,
                "description" => $item->description,
                "link" => $item->link,
            );
        }

        /* RSS Solidrité santé 2 (Qualité dans les établissements de santé, sociaux et médico-sociaux)*/
        $rssFeedUrlSs2 = "https://solidarites-sante.gouv.fr/spip.php?page=backend&id_rubrique=621";
        $rssFeedStringSs2 = file_get_contents($rssFeedUrlSs2,false, stream_context_create($stream_opts));
        $rssFeedSs2 = simplexml_load_string($rssFeedStringSs2);


        $postsSs2 = [];
        foreach ($rssFeedSs2->xpath("channel/item[position()<=3]") as $item) {

            $postsSs2[] = array(
                "id" => $item->guid,
                "title" => $item->title,
                "description" => $item->description,
                "link" => $item->link,
            );
        }

        return $this->render('site/actualites.html.twig', [
            'controller_name' => 'SiteController',
            'postsAnap' => $postsAnap,
            'postsSs1' => $postsSs1,
            'postsSs2' => $postsSs2,
            'rssFeedAnap' => $rssFeedStringAnap,
            'rssFeedSs1' => $rssFeedStringSs1,
            'rssFeedSs2' => $rssFeedStringSs2,
        ]);
 

    }

    /**
     * @Route("/solutions", name="solutions")
     */
    public function solutions()
    {
        return $this->render('site/solutions.html.twig');
    }

    /**
     * @Route("/assistance", name="assistance")
     */
    public function assistance()
    {
        return $this->render('site/assistance.html.twig');
    }

    /**
     * @Route("/prestations", name="prestations")
     */
    public function prestations()
    {
        return $this->render('site/prestations.html.twig');
    }

    /**
     * @Route("/references", name="references")
     */
    public function references()
    {
        return $this->render('site/references.html.twig');
    }
    /**
     * @Route("/media", name="media")
     */
    public function media()
    {
        return $this->render('site/media.html.twig');
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
